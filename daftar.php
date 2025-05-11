<?php
session_start(); // Harus dipanggil di baris pertama sebelum output lainnya
require 'db_connection.php';

// Proses registrasi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Menangkap data dari form
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $whatsapp = $_POST['whatsapp'];
    $email = $_POST['email'];

    // Validasi input
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: red; text-align: center;'>Email tidak valid.</p>";
    } elseif (!preg_match('/^[0-9]+$/', $whatsapp)) {
        echo "<p style='color: red; text-align: center;'>Nomor WhatsApp harus berupa angka.</p>";
    } else {
        // Cek apakah email sudah terdaftar
        $sql_check_email = "SELECT id FROM users WHERE email = ?";
        $stmt_check_email = $conn->prepare($sql_check_email);
        if (!$stmt_check_email) {
            die("Query prepare failed: " . $conn->error); // Tambahkan pesan error jika prepare gagal
        }
        $stmt_check_email->bind_param("s", $email);
        $stmt_check_email->execute();
        $stmt_check_email->store_result();

        if ($stmt_check_email->num_rows > 0) {
            echo "<p style='color: red; text-align: center;'>Email sudah terdaftar.</p>";
        } else {
            // Simpan data ke database
            $sql = "INSERT INTO users (username, password, nomor_whatsapp, email, trial_start_date) VALUES (?, ?, ?, ?, CURDATE())";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                die("Query prepare failed: " . $conn->error); // Tambahkan pesan error jika prepare gagal
            }
            $stmt->bind_param("ssss", $username, $password, $whatsapp, $email);

            if ($stmt->execute()) {
                echo "<p style='color: green; text-align: center;'>Registrasi berhasil! Silakan <a href='login.php'>login</a>.</p>";
            } else {
                echo "<p style='color: red; text-align: center;'>Error: " . $stmt->error . "</p>";
            }
            $stmt->close();
        }
        $stmt_check_email->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        /* --- Reset Umum --- */
        body, html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* --- Latar Belakang --- */
        body {
            background-color: #f8b0c5; /* Pink lembut */
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* --- Wrapper Utama --- */
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }

        /* --- Kontainer Registrasi --- */
        .register-container {
            background-color: #ffffff; /* Warna putih untuk kotak */
            border-radius: 15px; /* Membuat sudut melengkung */
            padding: 40px 30px; /* Ruang dalam */
            width: 400px; /* Lebar kotak */
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2); /* Bayangan */
            text-align: center; /* Konten di dalam rata tengah */
            animation: fadeIn 0.8s ease-in-out; /* Animasi muncul */
        }

        /* --- Keyframes Animasi --- */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* --- Judul --- */
        .register-container h2 {
            font-size: 1.8em;
            color: #e36b6b; /* Warna pink gelap */
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* --- Input Grup --- */
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            font-size: 0.95em;
            color: #555; /* Warna abu gelap */
            margin-bottom: 5px;
            display: inline-block;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1em;
            background-color: #f9f9f9; /* Latar abu muda */
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .input-group input:focus {
            border-color: #e36b6b; /* Warna pink gelap */
            outline: none;
            box-shadow: 0 0 8px rgba(227, 107, 107, 0.4);
        }

        /* --- Tombol Daftar --- */
        .register-button {
            background-color: #f36363; /* Warna pink terang */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
        }

        .register-button:hover {
            background-color: #e03636; /* Pink lebih gelap */
            transform: translateY(-2px); /* Efek naik */
            box-shadow: 0 4px 15px rgba(227, 107, 107, 0.4);
        }

        /* --- Tautan Login --- */
        .login-link {
            margin-top: 20px;
            font-size: 0.9em;
            color: #555;
        }

        .login-link a {
            color: #e36b6b; /* Pink gelap */
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #f36363; /* Pink terang saat hover */
        }

        /* --- Responsif untuk Layar Kecil --- */
        @media (max-width: 480px) {
            .register-container {
                width: 90%; /* Sesuaikan ukuran untuk layar kecil */
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Form Registrasi</h2>
        <form action="" method="POST">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="whatsapp">Nomor WhatsApp:</label>
                <input type="text" id="whatsapp" name="whatsapp" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="register-button" name="register">Daftar</button>
        </form>
        <div class="login-link">
            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </div>
    </div>
</body>
</html>
