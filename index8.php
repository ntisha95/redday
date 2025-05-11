<?php
// Koneksi database
$mysqli = new mysqli("localhost", "redn2292", "Uk3H336T6XBC32", "redn2292user_management");

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

// Tangani form berdasarkan action
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    // Tambahkan pengguna baru
    if ($action === 'add_user') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $is_member = isset($_POST['is_member']) ? 1 : 0;
        $membership_expiration = $is_member ? date('Y-m-d H:i:s', strtotime('+1 month')) : null;

        $sql = "INSERT INTO users (username, email, is_member, membership_expiration) 
                VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ssis", $username, $email, $is_member, $membership_expiration);
        $stmt->execute();
        $stmt->close();

        echo "Pengguna berhasil ditambahkan!";
    }

    // Perpanjang keanggotaan
    elseif ($action === 'extend_membership') {
        $user_id = $_POST['user_id'];
        $new_expiration = date('Y-m-d H:i:s', strtotime('+1 month'));

        $sql = "UPDATE users SET membership_expiration = ?, is_member = 1 WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("si", $new_expiration, $user_id);
        $stmt->execute();
        $stmt->close();

        echo "Keanggotaan berhasil diperpanjang!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kami Siap</title>
    <style>
        /* Mengatur style body */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #FFB5B5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container utama */
        .container {
            text-align: center;
            background-color: #FFB5B5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Judul */
        .title {
            font-size: 36px;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
        }

        /* Ilustrasi */
        .illustration img {
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
            border-radius: 10px;
            animation: bounce 2s infinite ease-in-out; /* Menambahkan animasi */
        }

        /* Teks deskripsi */
        .text h2 {
            font-size: 24px;
            font-weight: bold;
            color: white;
            margin: 10px 0;
        }

        .text p {
            font-size: 16px;
            color: white;
            margin: 5px 0;
        }

        /* Tombol */
        .buttons button {
            width: 200px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            margin: 10px 5px;
            transition: background-color 0.3s ease;
        }

        .buttons .start {
            background-color: #FF6F6F;
        }

        .buttons .start:hover {
            background-color: #FF3E3E;
        }

        .buttons .member {
            background-color: #FF8F8F;
        }

        .buttons .member:hover {
            background-color: #FF6F6F;
        }

        /* Animasi bounce (naik-turun) */
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0); /* Posisi awal */
            }
            50% {
                transform: translateY(-20px); /* Naik */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">KAMI SIAP</h1>
        <div class="illustration">
            <img src="provesi.png" alt="Illustration">
        </div>
        <div class="text">
            <h2>COBA GRATIS 7 HARI</h2>
            <p>Hanya untuk pengguna baru</p>
            <p>Minggu pertama gratis, lalu Rp5.000/minggu</p>
        </div>
        <div class="buttons">
            <!-- Tombol "MULAI" -->
            <form method="POST" action="">
                <button type="submit" name="action" value="start" class="start">MULAI</button>
                <button type="submit" name="action" value="member" class="member">MEMBER</button>
            </form>
            <form method="POST" action="">
    <input type="hidden" name="action" value="add_user">
    <label>Username:</label>
    <input type="text" name="username" required>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Member:</label>
    <input type="checkbox" name="is_member" value="1">
    <button type="submit">Tambah Pengguna</button>
</form>
<form method="POST" action="">
    <input type="hidden" name="action" value="extend_membership">
    <label>ID Pengguna:</label>
    <input type="number" name="user_id" required>
    <button type="submit">Perpanjang Keanggotaan</button>
</form>

        </div>
    </div>

    <?php
        // Tangani logika PHP untuk pengalihan
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action'])) {
                // Arahkan berdasarkan tombol yang dipilih
                switch ($_POST['action']) {
                    case 'start':
                        // Redirect ke halaman coba gratis
                        header('Location: index10.php');
                        exit();
                    case 'member':
                        // Redirect ke halaman member
                        header('Location: index9.php');
                        exit();
                }
            }
        }
    ?>
</body>
</html>
