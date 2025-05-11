
    <?php
    // Mengaktifkan error reporting untuk debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start(); // Memulai sesi
    require 'db_connection.php'; // Koneksi database

    $error_message = "";

    // Proses login
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
        // Ambil dan filter input
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // Validasi email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message = "Format email tidak valid!";
        } else {
            // Ambil data dari database berdasarkan email
            $query = "SELECT id, username, password FROM users WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Verifikasi password
                if (password_verify($password, $row['password'])) {
                    // Simpan informasi pengguna ke sesi
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];

                    // Redirect ke dashboard atau halaman utama
                    header("Location: dashboard.php");
                    exit();
                } else {
                    $error_message = "Password salah!";
                }
            } else {
                $error_message = "Email tidak ditemukan!";
            }
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Halaman Login</title>
        <style>
            body {
                background-color: #f8b0c5;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                font-family: 'Arial', sans-serif;
            }
            .login-container {
                background-color: rgba(255, 255, 255, 0.9);
                border-radius: 10px;
                padding: 30px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                text-align: center;
                width: 350px;
            }
            .login-container h2 {
                font-size: 2em;
                margin-bottom: 20px;
                color: #e36b6b;
            }
            .input-group {
                margin-bottom: 15px;
                text-align: left;
            }
            .input-group label {
                font-size: 1em;
                color: #333;
            }
            .input-group input {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 1em;
            }
            .login-button {
                background-color: #e36b6b;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                font-size: 1em;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            .login-button:hover {
                background-color: #d45555;
            }
            .register-link {
                margin-top: 20px;
            }
            .register-link p {
                font-size: 1em;
                color: #555;
            }
            .register-link a {
                color: #e36b6b;
                font-weight: bold;
                text-decoration: none;
                transition: color 0.3s ease;
            }
            .register-link a:hover {
                color: #c44545;
            }
            .error-message {
                color: red;
                font-size: 0.9em;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <h2>Form Login</h2>
            <form action="" method="POST">
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-button" name="login">Login</button>
            </form>
            <div class="register-link">
                <p>Belum punya akun? <a href="daftar.php">Daftar di sini</a></p>
            </div>
            <?php if (!empty($error_message)): ?>
                <p class="error-message"><?= htmlspecialchars($error_message) ?></p>
            <?php endif; ?>
        </div>
    </body>
    </html>
