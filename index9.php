<?php
session_start();
require 'db_connection.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Proses pembayaran
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['pay'])) {
        $userId = $_SESSION['user_id'];
        $paidAt = date('Y-m-d H:i:s'); // Waktu pembayaran

        // Update status keanggotaan pengguna
        $query = "UPDATE users SET is_member = 1, paid_at = ? WHERE id = ?";
        $stmt = $conn->prepare($query);

        // Validasi jika prepare gagal
        if (!$stmt) {
            die("Error dalam query SQL: " . $conn->error);
        }

        $stmt->bind_param("si", $paidAt, $userId);

        if ($stmt->execute()) {
            // Redirect ke dashboard setelah pembayaran berhasil
            header('Location: index10.php');
            exit();
        } else {
            $error_message = "Terjadi kesalahan dalam proses pembayaran.";
        }
    }
}

// Data pengguna untuk QR Code
$userId = $_SESSION['user_id'];
$paymentLink = "https://example.com/payment?user_id=" . urlencode($userId); // Link pembayaran

// File QR Code lokal
$qrImagePath = "imagesqr_code.png"; // QR Code statis yang sudah diunduh
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffe3ec;
            color: #6d1b3f;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .payment-container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h1 {
            color: #e91e63;
            font-size: 1.8em;
            margin-bottom: 15px;
        }
        p {
            font-size: 1.2em;
            color: #9c0047;
            margin-bottom: 20px;
        }
        .payment-button {
            background-color: #ff4081;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 10px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .payment-button:hover {
            background-color: #d81b60;
        }
        .error-message {
            color: red;
            margin-top: 15px;
            font-size: 0.9em;
        }
        .qr-image {
            margin-top: 20px;
            max-width: 100%;
        }
        .back-button {
            margin-top: 20px;
            background-color: #ff4081;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .back-button:hover {
            background-color: #d81b60;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h1>Pembayaran</h1>
        <p>Langganan hanya Rp5.000/minggu.</p>
        <form method="POST">
            <button type="submit" class="payment-button" name="pay">Bayar Sekarang</button>
        </form>
        <?php if (isset($error_message)): ?>
            <p class="error-message"><?= htmlspecialchars($error_message) ?></p>
        <?php endif; ?>
        <h1>Scan QR untuk Membayar</h1>
        <p>Gunakan aplikasi pembayaran untuk memindai kode QR berikut:</p>
        <!-- Tampilkan gambar QR Code statis -->
        <img src="<?= htmlspecialchars($qrImagePath) ?>" alt="QR Code" class="qr-image">
        <form action="index10.php" method="GET">
            <button class="back-button">Lanjutkan</button>
        </form>
    </div>
</body>
</html>
