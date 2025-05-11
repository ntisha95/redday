<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data dari tombol yang ditekan
    $response = isset($_POST['response']) ? $_POST['response'] : '';

    // Lakukan pengalihan halaman berdasarkan respons pengguna
    if ($response === 'yes' || $response === 'no') {
        header("Location: index5.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gejala Sebelum Menstruasi</title>
    <style>
        /* Global Body Styling */
        body {
            background-color: #f8b0c5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        /* Container Styling */
        .container {
            text-align: center;
            color: #b7112d;
            padding: 20px;
        }

        /* Title Styling */
        h1 {
            font-size: 2em;
            margin-bottom: 30px;
            font-weight: bold;
        }

        /* Options Container */
        .options {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 30px;
        }

        /* Button/Option Styling */
        .option {
            background-color: #d2691e;
            color: #fff;
            font-size: 1.5em;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            position: relative;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
            text-decoration: none;
            border: none;
        }

        /* Button Hover Effect */
        .option:hover {
            transform: scale(1.05);
        }

        /* Decorative Lines for Buttons */
        .option::before, .option::after {
            content: '';
            position: absolute;
            width: 2px;
            height: 20px;
            background-color: #d2691e;
            top: -20px;
        }

        .option::before {
            left: 20px;
        }

        .option::after {
            right: 20px;
        }

        /* Images Section */
        .images {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .images img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Apakah kamu merasakan gejala sebelum datangnya menstruasi?</h1>
        <div class="options">
            <!-- Form untuk opsi "Ya" -->
            <form method="POST" style="display:inline;">
                <button class="option" name="response" value="yes">Ya</button>
            </form>

            <!-- Form untuk opsi "Tidak" -->
            <form method="POST" style="display:inline;">
                <button class="option" name="response" value="no">Tidak</button>
            </form>
        </div>
        <div class="images">
            <img src="kopi.png" alt="Person with tea">
            <img src="kit.png" alt="Person feeling unwell">
        </div>
    </div>
</body>
</html>
