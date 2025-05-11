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
    die("Koneksi database gagal: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data gejala yang dipilih
    $symptoms = isset($_POST['symptom']) ? $_POST['symptom'] : [];

    // Cek apakah ada gejala yang dipilih
    if (!empty($symptoms)) {
        try {
            // Simpan gejala ke database
            $stmt = $pdo->prepare("INSERT INTO user_responses (selected_symptom) VALUES (:symptom)");
            foreach ($symptoms as $symptom) {
                $stmt->execute(['symptom' => $symptom]);
            }
            // Redirect ke halaman berikutnya
            header("Location: index6.php");
            exit();
        } catch (PDOException $e) {
            $error_message = "Terjadi kesalahan: " . $e->getMessage();
        }
    } else {
        $error_message = "Silakan pilih setidaknya satu gejala.";
    }
}
?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Tangkap data gejala yang dipilih
        $symptoms = isset($_POST['symptom']) ? $_POST['symptom'] : [];

        // Cek apakah ada gejala yang dipilih
        if (!empty($symptoms)) {
            // Redirect ke halaman berikutnya jika ada pilihan
            header("Location: index6.php");
            exit();
        } else {
            $error_message = "Silakan pilih setidaknya satu gejala.";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Apa yang Kamu Rasakan?</title>
        <style>
            /* Global Styles */
            body {
                margin: 0;
                padding: 0;
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(135deg, #f8b0c5, #f6d1e7);
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }

            /* Container */
            .container {
                width: 90%;
                max-width: 400px;
                text-align: center;
            }

            /* Header Images */
            .header-images {
                display: flex;
                justify-content: space-around;
                align-items: center;
                margin-bottom: 20px;
            }

            .header-img {
                max-width: 70px;
                height: auto;
                transition: transform 0.3s;
            }

            .header-img:hover {
                transform: scale(1.2);
            }

            /* Symptoms Card */
            .symptoms-card {
                background: white;
                padding: 20px;
                border-radius: 15px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
            }

            .symptoms-card h2 {
                font-size: 1.5rem;
                color: #f774a6;
                margin-bottom: 20px;
            }

            .symptoms-list {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .symptoms-list li {
                background: #fef3f8;
                margin: 8px 0;
                padding: 10px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                display: flex;
                align-items: center;
                justify-content: space-between;
                font-size: 0.9rem;
                color: #ff74a6;
            }

            .symptoms-list input {
                accent-color: #f774a6;
                width: 18px;
                height: 18px;
            }

            /* Next Step Button */
            .next-step button {
                background: linear-gradient(135deg, #ff7e5f, #feb47b);
                color: white;
                border: none;
                padding: 10px 20px;
                font-size: 1rem;
                font-weight: bold;
                border-radius: 50px;
                cursor: pointer;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .next-step button:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            }

            .next-step button:active {
                transform: translateY(1px);
            }

            .error {
                color: red;
                margin-top: 10px;
                font-size: 0.9rem;
            }

            /* Responsive Design */
            @media (max-width: 500px) {
                .header-img {
                    max-width: 50px;
                }

                .symptoms-card h2 {
                    font-size: 1.2rem;
                }

                .next-step button {
                    font-size: 0.9rem;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header-images">
                <img src="mkn.png" alt="Eating" class="header-img">
                <img src="mood.png" alt="Mood Swing" class="header-img">
                <img src="ngaca.png" alt="Acne" class="header-img">
            </div>
            <form method="POST">
                <div class="symptoms-card">
                    <h2>Apa yang kamu rasakan?</h2>
                    <ul class="symptoms-list">
                        <li><label><input type="checkbox" name="symptom[]" value="Kram Perut"> Kram Perut</label></li>
                        <li><label><input type="checkbox" name="symptom[]" value="Sakit Punggung"> Sakit Punggung</label></li>
                        <li><label><input type="checkbox" name="symptom[]" value="Sakit Kepala"> Sakit Kepala</label></li>
                        <li><label><input type="checkbox" name="symptom[]" value="Muncul Jerawat"> Muncul Jerawat</label></li>
                        <li><label><input type="checkbox" name="symptom[]" value="Mood Swing"> Mood Swing</label></li>
                        <li><label><input type="checkbox" name="symptom[]" value="Cepat Lelah"> Cepat Lelah</label></li>
                        <li><label><input type="checkbox" name="symptom[]" value="Nafsu Makan Meningkat"> Nafsu Makan Meningkat</label></li>
                        <li><label><input type="checkbox" name="symptom[]" value="Tidak Satupun"> Tidak Satupun</label></li>
                    </ul>
                </div>
                <div class="next-step">
                    <button type="submit">Langkah Berikutnya</button>
                </div>
                <?php if (!empty($error_message)): ?>
                    <div class="error"><?= htmlspecialchars($error_message) ?></div>
                <?php endif; ?>
            </form>
        </div>
    </body>
    </html>
