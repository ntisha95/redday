<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitos dan Fakta Menstruasi</title>
    <style>
        /* Global styles */
        body {
            font-family: 'Quicksand', 'Raleway', sans-serif;
            background-color: #fef8f8;
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

        header p {
            font-size: 1.2em;
            color: #555;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Artikel langkah */
        .myth-fact {
            background-color: #fff8f8;
            border-left: 6px solid #ff6b6b;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            position: relative;
        }

        .myth-fact h2 {
            font-size: 1.6em;
            color: #444;
        }

        .myth-fact p {
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
            <h1>Mitos dan Fakta Mengenai Menstruasi</h1>
            <p>Menstruasi adalah proses alami yang sering kali dikelilingi oleh berbagai mitos dan kesalahpahaman. Mitos-mitos ini dapat menambah kebingungan atau bahkan ketakutan bagi perempuan yang mengalaminya. Oleh karena itu, penting untuk membedakan antara mitos dan fakta ilmiah agar kita lebih memahami proses ini dengan benar.</p>
        </header>
        <hr>
        <section class="content">
            <?php
            // Data mitos dan fakta
            $myths = [
                [
                    "judul" => "Mitos 1: Menstruasi Tidak Bisa Terjadi Saat Hamil",
                    "mitos" => "Jika seseorang hamil, mereka tidak bisa menstruasi.",
                    "fakta" => "Selama kehamilan, menstruasi memang tidak terjadi. Namun, ada kondisi yang disebut <em>pendarahan implantasi</em>, yaitu pendarahan ringan yang terjadi ketika embrio menempel di dinding rahim. Ini sering terjadi di awal kehamilan dan bisa disalahartikan sebagai menstruasi."
                ],
                [
                    "judul" => "Mitos 2: Menstruasi Harus Teratur Setiap Bulan",
                    "mitos" => "Siklus menstruasi harus selalu 28 hari, dan jika berbeda, berarti ada masalah.",
                    "fakta" => "Siklus menstruasi yang normal bervariasi antara 21 hingga 35 hari. Panjang siklus bisa dipengaruhi oleh faktor seperti stres, pola makan, olahraga, atau kondisi medis tertentu."
                ],
                [
                    "judul" => "Mitos 3: Menstruasi Tidak Bisa Terjadi Saat Menyusui",
                    "mitos" => "Menstruasi tidak akan terjadi pada perempuan yang menyusui.",
                    "fakta" => "Meskipun menyusui eksklusif dapat menunda menstruasi, siklus menstruasi tetap bisa kembali selama masa menyusui, terutama jika pemberian ASI tidak dilakukan secara eksklusif."
                ],
                [
                    "judul" => "Mitos 4: Menstruasi Harus Sakit",
                    "mitos" => "Menstruasi pasti akan menyebabkan nyeri atau kram yang parah, dan ini adalah hal yang normal.",
                    "fakta" => "Meskipun banyak wanita mengalami kram saat menstruasi (dikenal sebagai dismenore), nyeri menstruasi yang parah tidak selalu normal. Jika nyeri sangat mengganggu aktivitas sehari-hari, itu bisa menjadi tanda kondisi medis yang perlu diperiksa lebih lanjut, seperti endometriosis atau fibroid."
                ],
                [
                    "judul" => "Mitos 5: Pembalut Harus Diganti Setiap Jam",
                    "mitos" => "Pembalut harus diganti setiap jam, atau bisa menyebabkan infeksi.",
                    "fakta" => "Pembalut atau tampon harus diganti setiap 4-6 jam, tetapi tidak perlu setiap jam. Jika menstruasi ringan, Anda mungkin bisa mengganti pembalut lebih jarang. Namun, untuk menghindari bau dan iritasi, sebaiknya ganti pembalut sesuai kebutuhan, terutama jika sudah penuh."
                ]
            ];

            // Menampilkan mitos dan fakta
            foreach ($myths as $myth) {
                echo "<div class='myth-fact'>";
                echo "<h2>{$myth['judul']}</h2>";
                echo "<p><strong>Mitos:</strong> {$myth['mitos']}</p>";
                echo "<p><strong>Fakta:</strong> {$myth['fakta']}</p>";
                echo "</div><hr>";
            }
            ?>
        </section>
        <footer>
            <p><strong>Kesimpulan:</strong> Menstruasi adalah bagian alami dari kehidupan perempuan. Namun, mitos yang beredar dapat menimbulkan kebingungan dan kesalahpahaman. Penting untuk mendapatkan informasi dari sumber terpercaya agar dapat memahami menstruasi secara ilmiah dan menjaga kesehatan secara optimal.</p>
        </footer>
        <div class="back-button">
            <button onclick="window.history.back()">Kembali ke Halaman Sebelumnya</button>
        </div>
    </div>
</body>
</html>
