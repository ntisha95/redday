<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitos dan Fakta Menstruasi</title>
    <style>
        /* Reset dasar */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }

        /* Kontainer utama */
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: linear-gradient(135deg, #fdfbfb, #ebedee);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        /* Header */
        header h1 {
            color: #d6336c;
            text-align: center;
            font-size: 2em;
        }

        header p {
            text-align: justify;
            font-size: 1.2em;
            margin-top: 10px;
        }

        /* Konten mitos dan fakta */
        .content {
            margin-top: 20px;
        }

        .myth-fact {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .myth-fact h2 {
            color: #333;
            margin-bottom: 10px;
            font-size: 1.5em;
        }

        .myth-fact p {
            margin: 5px 0;
            font-size: 1.1em;
        }

        .myth-fact p strong {
            color: #d6336c;
            font-weight: bold;
        }

        /* Footer */
        footer {
            margin-top: 30px;
            padding: 15px;
            background: #d6336c;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        footer p {
            font-size: 1em;
            margin: 0;
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
            <p>
                <?= "Menstruasi adalah proses alami yang sering kali dikelilingi oleh berbagai mitos dan kesalahpahaman. Mitos-mitos ini dapat menambah kebingungan atau bahkan ketakutan bagi perempuan yang mengalaminya. Oleh karena itu, penting untuk membedakan antara mitos dan fakta ilmiah agar kita lebih memahami proses ini dengan benar." ?>
            </p>
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
                    "fakta" => "Meskipun banyak wanita mengalami kram saat menstruasi (dikenal sebagai dismenore), nyeri menstruasi yang parah tidak selalu normal. Beberapa wanita bisa mengalami menstruasi tanpa rasa sakit. Jika nyeri sangat mengganggu aktivitas sehari-hari, itu bisa menjadi tanda kondisi medis yang perlu diperiksa lebih lanjut, seperti endometriosis atau fibroid."
                ],
                [
                    "judul" => "Mitos 5: Pembalut Harus Diganti Setiap Jam",
                    "mitos" => "Pembalut harus diganti setiap jam, atau bisa menyebabkan infeksi.",
                    "fakta" => "Pembalut atau tampon harus diganti setiap 4-6 jam, tetapi tidak perlu setiap jam. Jika menstruasi ringan, Anda mungkin bisa mengganti pembalut lebih jarang. Namun, untuk menghindari bau dan iritasi, sebaiknya ganti pembalut sesuai kebutuhan, terutama jika sudah penuh."
                ]
            ];

            // Looping untuk menampilkan setiap mitos
            foreach ($myths as $myth) {
                echo "
                <div class='myth-fact'>
                    <h2>{$myth['judul']}</h2>
                    <p><strong>Mitos:</strong> {$myth['mitos']}</p>
                    <p><strong>Fakta:</strong> {$myth['fakta']}</p>
                </div>
                <hr>";
            }
            ?>
        </section>
        <footer>
            <p><strong>Kesimpulan:</strong> <?= "Menstruasi adalah bagian alami dari kehidupan perempuan. Namun, mitos yang beredar dapat menimbulkan kebingungan dan kesalahpahaman. Penting untuk mendapatkan informasi dari sumber terpercaya agar dapat memahami menstruasi secara ilmiah dan menjaga kesehatan secara optimal." ?></p>
        </footer>
        <!-- Tombol Kembali ke Halaman Sebelumnya -->
        <div class="back-button">
            <button onclick="window.history.back()">Kembali ke Halaman Sebelumnya</button>
        </div>
    </div>
</body>
</html>
            