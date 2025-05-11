<?php
// Koneksi ke database
$servername = "localhost";
    $username_db = "redn2292";
    $password_db = "Uk3H336T6XBC32"; // Sesuaikan dengan password MySQL Anda
    $dbname = "redn2292user_management"; // Nama database Anda
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data gejala dan suasana hati dari form
    $gejala = isset($_POST['gejala']) ? $_POST['gejala'] : [];
    $suasana = isset($_POST['suasana']) ? $_POST['suasana'] : [];

    // Ambil ID gejala dari database berdasarkan nama gejala yang dipilih
    $gejala_ids = [];
    if (!empty($gejala)) {
        $stmt = $pdo->prepare("SELECT id FROM gejala WHERE nama_gejala IN (" . implode(',', array_fill(0, count($gejala), '?')) . ")");
        $stmt->execute($gejala);
        $gejala_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    // Ambil ID suasana hati dari database berdasarkan nama suasana hati yang dipilih
    $suasana_ids = [];
    if (!empty($suasana)) {
        $stmt = $pdo->prepare("SELECT id FROM suasana_hati WHERE nama_suasana IN (" . implode(',', array_fill(0, count($suasana), '?')) . ")");
        $stmt->execute($suasana);
        $suasana_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    // Simpan pilihan pengguna ke dalam tabel user_selections
    if (!empty($gejala_ids) && !empty($suasana_ids)) {
        foreach ($gejala_ids as $gejala_id) {
            foreach ($suasana_ids as $suasana_id) {
                $stmt = $pdo->prepare("INSERT INTO user_selections (user_id, gejala_id, suasana_hati_id) VALUES (?, ?, ?)");
                $stmt->execute([1, $gejala_id, $suasana_id]); // Ganti '1' dengan ID pengguna yang sesuai
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gejala dan Suasana Hati</title>
    <style>
        /* Reset dan Gaya Dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            fo  nt-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #ffe5ec, #fff);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Kontainer Utama */
        .container {
            max-width: 700px;
            background: #ffffff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        /* Bagian Seksi */
        .section {
            margin-bottom: 40px;
        }

        .section-header {
            margin-bottom: 20px;
        }

        .section-header h2 {
            font-size: 24px;
            font-weight: 700;
            color: #ff5a8f;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-align: center;
            margin-bottom: 10px;
            position: relative;
        }

        .section-header h2::after {
            content: '';
            display: block;
            width: 80px;
            height: 3px;
            background-color: #ff5a8f;
            margin: 10px auto 0;
            border-radius: 2px;
        }

        /* Tata Letak Grid */
        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        /* Item di Grid */
        .item {
            text-align: center;
            position: relative;
        }

        .item input[type="checkbox"] {
            position: absolute;
            top: 8px;
            left: 8px;
            z-index: 2;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .item img {
            width: 60px;
            height: 60px;
            margin-bottom: 8px;
            border: 3px solid #ff5a8f;
            border-radius: 50%;
            padding: 8px;
            background-color: #ffe5ec;
            transition: transform 0.3s ease, background-color 0.3s ease, border-color 0.3s ease;
        }

        .item img:hover {
            transform: scale(1.2);
            background-color: #ff80ab;
            border-color: #ff80ab;
        }

        .item span {
            font-size: 14px;
            color: #555;
            margin-top: 8px;
            display: block;
            font-weight: 500;
        }

        /* Tombol Simpan dan Kembali */
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            background: linear-gradient(to right, #ff5a8f, #ff80ab);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            background: linear-gradient(to right, #ff80ab, #ff5a8f);
        }

        /* Bagian Hasil */
        .result {
            margin-top: 30px;
            background: #ffe5ec;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .result h3 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #ff5a8f;
            font-weight: 700;
        }

        .result p {
            font-size: 16px;
            color: #555;
        }
    </style>
    </head>
<body>
    <div class="container">
        <form method="POST" action="">
            <!-- Bagian Gejala -->
            <section class="section">
                <div class="section-header">
                    <h2>Gejala</h2>
                </div>
                <div class="grid">
                    <div class="item">
                        <input type="checkbox" id="kram" name="gejala[]" value="Kram Perut">
                        <label for="kram">
                            <img src="kramperut.jpg" alt="Kram Perut">
                            <span>Kram Perut</span>
                        </label>
                    </div>
                    <div class="item">
                        <input type="checkbox" id="nyeri_punggung" name="gejala[]" value="Nyeri Punggung">
                        <label for="nyeri_punggung">
                            <img src="nyeripunggung.jpg" alt="Nyeri Punggung">
                            <span>Nyeri Punggung</span>
                        </label>
                    </div>
                    <div class="item">
                        <input type="checkbox" id="sakit_kepala" name="gejala[]" value="Sakit Kepala">
                        <label for="sakit_kepala">
                            <img src="sakitkepala.jpg" alt="Sakit Kepala">
                            <span>Sakit Kepala</span>
                        </label>
                    </div>
                    <div class="item">
                        <input type="checkbox" id="lelah" name="gejala[]" value="Lelah">
                        <label for="lelah">
                            <img src="lelah.jpg" alt="Lelah">
                            <span>Lelah</span>
                        </label>
                    </div>
                </div>
            </section>

            <!-- Bagian Suasana Hati -->
            <section class="section">
                <div class="section-header">
                    <h2>Suasana Hati</h2>
                </div>
                <div class="grid">
                    <div class="item">
                        <input type="checkbox" id="gembira" name="suasana[]" value="Gembira">
                        <label for="gembira">
                            <img src="gembira.jpg" alt="Gembira">
                            <span>Gembira</span>
                        </label>
                    </div>
                    <div class="item">
                        <input type="checkbox" id="senang" name="suasana[]" value="Senang">
                        <label for="senang">
                            <img src="senang.jpg" alt="Senang">
                            <span>Senang</span>
                        </label>
                    </div>
                </div>
            </section>

          <!-- Tombol Simpan dan Kembali -->
<div class="action-buttons">
    <button type="submit" class="btn">Simpan</button>
    <a href="index11.php" class="btn">Kembali</a>
</div>

        </form>

        <!-- Bagian Hasil -->
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="result">
                <h3>Data yang Anda Pilih:</h3>
                <p><strong>Gejala:</strong> <?= !empty($gejala) ? implode(', ', $gejala) : 'Tidak ada' ?></p>
                <p><strong>Suasana Hati:</strong> <?= !empty($suasana) ? implode(', ', $suasana) : 'Tidak ada' ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
