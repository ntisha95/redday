<?php
session_start();

// Fungsi untuk menyimpan pengaturan ke session (simulasi penyimpanan)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['userSettings'] = [
        'dob' => $_POST['dob'] ?? '',
        'weight' => $_POST['weight'] ?? '',
        'height' => $_POST['height'] ?? '',
        'notifMenstruasi' => isset($_POST['notif-menstruasi']),
        'notifOvulasi' => isset($_POST['notif-ovulasi']),
        'dataSecurity' => isset($_POST['data-security']),
        'accountPrivacy' => isset($_POST['account-privacy'])
    ];
    $successMessage = "Pengaturan telah disimpan!";
}
$userSettings = $_SESSION['userSettings'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Aplikasi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffeaf4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #5f5f5f;
        }
        
        .settings-page {
            width: 400px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            overflow-y: auto;
            max-height: 90vh;
        }
        
        .header {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #d63384;
        }
        
        .card {
            background: #ffe1ed;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #f7cce0;
        }
        
        .card-title {
            font-size: 18px;
            color: #c2185b;
            margin-bottom: 10px;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
            color: #6b6b6b;
        }
        
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #f7cce0;
            border-radius: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            font-size: 14px;
        }
        
        input[type="checkbox"] {
            margin-right: 10px;
        }
        
        .option-group label {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .save-btn {
            display: block;
            width: 100%;
            padding: 12px;
            border: none;
            background-color: #d63384;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
        }
        
        .save-btn:hover {
            background-color: #bf306f;
        }
        
        .success-message {
            color: green;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="settings-page">
        <h1 class="header">Pengaturan Aplikasi</h1>

        <?php if (!empty($successMessage)): ?>
            <p class="success-message"><?= htmlspecialchars($successMessage) ?></p>
        <?php endif; ?>

        <form method="POST">
            <!-- Data Pribadi -->
            <div class="card">
                <h2 class="card-title">Data Pribadi</h2>
                <label for="dob">Tanggal Lahir:</label>
                <input type="date" id="dob" name="dob" value="<?= htmlspecialchars($userSettings['dob'] ?? '') ?>">
                
                <label for="weight">Berat Badan (kg):</label>
                <input type="number" id="weight" name="weight" placeholder="Contoh: 55" value="<?= htmlspecialchars($userSettings['weight'] ?? '') ?>">

                <label for="height">Tinggi Badan (cm):</label>
                <input type="number" id="height" name="height" placeholder="Contoh: 160" value="<?= htmlspecialchars($userSettings['height'] ?? '') ?>">
            </div>

            <!-- Pengaturan Notifikasi -->
            <div class="card">
                <h2 class="card-title">Pengaturan Notifikasi</h2>
                <label>
                    <input type="checkbox" id="notif-menstruasi" name="notif-menstruasi" <?= !empty($userSettings['notifMenstruasi']) ? 'checked' : '' ?>>
                    Notifikasi Pengingat Menstruasi
                </label>
                <label>
                    <input type="checkbox" id="notif-ovulasi" name="notif-ovulasi" <?= !empty($userSettings['notifOvulasi']) ? 'checked' : '' ?>>
                    Notifikasi Pengingat Ovulasi
                </label>
            </div>

            <!-- Pengaturan Privasi -->
            <div class="card">
                <h2 class="card-title">Pengaturan Privasi</h2>
                <label>
                    <input type="checkbox" id="data-security" name="data-security" <?= !empty($userSettings['dataSecurity']) ? 'checked' : '' ?>>
                    Keamanan Data
                </label>
                <label>
                    <input type="checkbox" id="account-privacy" name="account-privacy" <?= !empty($userSettings['accountPrivacy']) ? 'checked' : '' ?>>
                    Privasi Akun
                </label>
            </div>

            <!-- Tombol Simpan -->
            <button class="save-btn" type="submit">Simpan Pengaturan</button>
        </form>
    </div>
</body>
</html>
