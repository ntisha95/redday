<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda-Tanda Gangguan Menstruasi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&family=Raleway:wght@300;700&display=swap" rel="stylesheet">
    <style>
        /* Global styles */
        body {
            font-family: 'Quicksand', 'Raleway', sans-serif;
            background-color: #fef9f6;
            color: #444;
            margin: 0;
            padding: 0;
        }

        /* Container utama */
        .container {
            max-width: 900px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px 30px;
            overflow: hidden;
        }

        /* Header */
        header h1 {
            font-family: 'Raleway', sans-serif;
            font-weight: 700;
            text-align: center;
            font-size: 2.4em;
            color: #ff6b6b;
            margin-bottom: 10px;
        }

        header .intro {
            font-size: 1.2em;
            color: #555;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Artikel langkah */
        .step {
            background-color: #fff8f0;
            border-left: 6px solid #ff9e6d;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            position: relative;
        }

        .step-icon {
            font-size: 2.5em;
            position: absolute;
            top: -10px;
            left: -10px;
            background: #fff;
            color: #ff6b6b;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .step h2 {
            margin-top: 10px;
            font-size: 1.6em;
            color: #444;
        }

        .step p {
            margin-top: 10px;
            font-size: 1em;
            color: #555;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            margin-top: 20px;
            background: #ff6b6b;
            color: white;
            border-radius: 10px;
            font-size: 1.1em;
        }

        .back-button {
            text-align: center;
            margin-top: 30px;
        }

        .back-button button {
            background-color: #d96b9c;
            color: white;
            font-size: 1rem;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-button button:hover {
            background-color: #f5c2de;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Tanda-Tanda Gangguan Menstruasi</h1>
            <p class="intro">Beberapa tanda menstruasi mungkin memerlukan perhatian medis. Ketahui lebih dalam gejala yang perlu diwaspadai untuk menjaga kesehatanmu.</p>
        </header>
        <section class="content">
            <?php
            // Data tanda-tanda gangguan menstruasi
            $signs = [
                [
                    "icon" => "⏰",
                    "judul" => "Menstruasi Tidak Teratur",
                    "deskripsi" => "Siklus yang kurang dari 21 hari atau lebih dari 35 hari secara konsisten bisa menandakan gangguan hormon seperti <strong>PCOS</strong> atau masalah tiroid."
                ],
                [
                    "icon" => "💔",
                    "judul" => "Pendarahan yang Sangat Berat (Menorrhagia)",
                    "deskripsi" => "Jika pembalut harus diganti lebih dari sekali dalam satu jam atau pendarahan berlangsung lebih dari 7 hari, bisa jadi tanda <strong>fibroid</strong> atau <strong>anemia</strong>."
                ],
                [
                    "icon" => "😖",
                    "judul" => "Nyeri Menstruasi yang Sangat Parah",
                    "deskripsi" => "Kram yang sangat parah dapat disebabkan oleh <strong>endometriosis</strong> atau <strong>fibroid rahim</strong>. Jangan abaikan jika nyeri mengganggu aktivitas sehari-hari."
                ],
                [
                    "icon" => "🚫",
                    "judul" => "Menstruasi yang Tidak Datang Sama Sekali (Amenorea)",
                    "deskripsi" => "Kondisi ini bisa disebabkan oleh <strong>gangguan hormon</strong>, <strong>stres</strong>, atau <strong>PCOS</strong>. Segera konsultasikan ke dokter jika tidak menstruasi selama 3 bulan berturut-turut."
                ],
                [
                    "icon" => "🩸",
                    "judul" => "Pendarahan di Luar Siklus Menstruasi",
                    "deskripsi" => "Pendarahan tidak normal di luar periode menstruasi bisa menunjukkan <strong>infeksi</strong>, <strong>polip rahim</strong>, atau bahkan <strong>kanker rahim</strong>."
                ]
            ];

            // Menampilkan data tanda-tanda gangguan menstruasi
            foreach ($signs as $sign) {
                echo "<article class='step'>";
                echo "<div class='step-icon'>{$sign['icon']}</div>";
                echo "<h2>{$sign['judul']}</h2>";
                echo "<p>{$sign['deskripsi']}</p>";
                echo "</article>";
            }
            ?>
        </section>
        <footer>
            <p>🌸 Jangan abaikan tanda-tanda gangguan menstruasi. Konsultasikan dengan dokter untuk penanganan lebih lanjut. 🌸</p>
        </footer>
        <!-- Tombol Kembali ke Halaman Sebelumnya -->
        <div class="back-button">
            <button onclick="window.history.back()">Kembali ke Halaman Sebelumnya</button>
        </div>
    </div>
</body>
</html>
