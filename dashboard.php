    <?php
    session_start(); // Pastikan sesi dimulai

    // KONFIGURASI DATABASE
    $servername = "localhost";
    $username_db = "redn2292";
    $password_db = "Uk3H336T6XBC32"; // Sesuaikan dengan password MySQL Anda
    $dbname = "redn2292user_management"; // Nama database Anda

    // Membuat koneksi ke database
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Cek apakah pengguna sudah login
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    // Ambil username dari sesi
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
    $message = ""; // Untuk menyimpan pesan

    // Tangkap tahun yang dipilih dan simpan ke database
    if (isset($_GET['year'])) {
        $year_selected = intval($_GET['year']); // Pastikan input adalah angka

        // Query untuk menyimpan data ke tabel `year_selections`
        $query = "INSERT INTO year_selections (username, year_selected) VALUES (?, ?)";
        $stmt = $conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param("si", $username, $year_selected);

            if ($stmt->execute()) {
                $message = "Tahun $year_selected berhasil disimpan!";
            } else {
                $message = "Gagal menyimpan tahun: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $message = "Gagal mempersiapkan query: " . $conn->error;
        }
    }

    $conn->close();
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Kapan Tahun Kelahiranmu?</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f8b0c5;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .container {
                background: white;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                width: 400px;
                text-align: center;
            }
            .years {
                margin: 10px 0;
                padding: 0;
                list-style: none;
                max-height: 200px;
                overflow-y: auto;
            }
            .years .year {
                background: #f8b0c5;
                color: white;
                padding: 10px;
                margin: 5px 0;
                cursor: pointer;
                border-radius: 5px;
                transition: background 0.3s;
            }
            .years .year:hover {
                background: #d44a6a;
            }
        </style>
        <script>
            function navigateTo(page) {
                window.location.href = page;
            }
        </script>
    </head>
    <body>
        <div class="container">
            <h2>Selamat datang, <?php echo htmlspecialchars($username); ?>!</h2>
            <p>Silakan pilih tahun kelahiran Anda:</p>
            <div class="years">
                <?php
                // Daftar tahun dari 1985 hingga 2017
                for ($year = 1985; $year <= 2017; $year++) {
                    echo "<div class='year' onclick=\"navigateTo('dashboard.php?year=$year')\">$year</div>";
                }
                ?>
            </div>

            <?php if (!empty($message)) echo "<p style='color: green;'>$message</p>"; ?>

            <p><a href="index3.php">Selanjutnya</a></p>
        </div>
    </body>
    </html>
