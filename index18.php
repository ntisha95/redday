<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Penjelasan Lengkap tentang Siklus Menstruasi</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background: linear-gradient(135deg, #fde4e4, #f8f0f6);
      margin: 0;
      padding: 0;
      color: #5e5e5e;
    }
    
    .container {
      width: 90%;
      max-width: 1000px;
      margin: 20px auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
    
    header {
      text-align: center;
      padding: 20px 10px;
    }
    
    header h1 {
      font-size: 2.5rem;
      color: #ec6bb1;
    }
    
    header .intro {
      font-size: 1.1rem;
      color: #7e7e7e;
    }
    
    .divider {
      width: 80%;
      height: 2px;
      margin: 20px auto;
      background: linear-gradient(90deg, #ec6bb1, #fcb0d6);
      border-radius: 2px;
    }
    
    .section {
      margin: 30px 0;
    }
    
    h2 {
      font-size: 2rem;
      color: #9c4571;
      background: linear-gradient(90deg, #fcb0d6, #ec6bb1);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    
    .timeline {
      margin-top: 20px;
      padding-left: 10px;
      border-left: 4px solid #fcb0d6;
    }
    
    .timeline-item {
      background-color: #fbe1ed;
      padding: 15px;
      margin: 15px 0;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      position: relative;
    }
    
    .timeline-item::before {
      content: '📍';
      position: absolute;
      left: -25px;
      top: 15px;
      font-size: 1.5rem;
      color: #ec6bb1;
    }
    
    ul li, ol li {
      margin-bottom: 10px;
    }
    
    .back-button {
      display: inline-block;
      padding: 10px 20px;
      background: linear-gradient(135deg, #fcb0d6, #ec6bb1);
      color: white;
      font-size: 1rem;
      font-weight: bold;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
      transition: all 0.3s ease;
    }
    
    .back-button:hover {
      background: linear-gradient(135deg, #ec6bb1, #fcb0d6);
      transform: scale(1.05);
    }
    
    footer {
      text-align: center;
      margin-top: 40px;
      font-size: 1rem;
      color: #7e7e7e;
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>🩸 Penjelasan Lengkap tentang Siklus Menstruasi</h1>
      <p class="intro">
        <?= "Siklus menstruasi adalah rangkaian perubahan alami dalam tubuh perempuan yang terjadi setiap bulan." ?>
      </p>
      <div class="divider"></div>
    </header>

    <section class="section">
      <h2>🔄 Tahapan Siklus Menstruasi</h2>
      <div class="timeline">
        <?php
        $stages = [
          [
            "title" => "1. Fase Menstruasi (Hari 1-5)",
            "description" => "Pada fase ini, dinding rahim (endometrium) yang sebelumnya menebal akan luruh dan keluar melalui vagina dalam bentuk darah menstruasi.",
            "symptoms" => "Kram perut, lemas, dan perubahan suasana hati."
          ],
          [
            "title" => "2. Fase Folikular (Hari 1-13)",
            "description" => "Hormon FSH merangsang ovarium untuk memproduksi beberapa folikel. Salah satu folikel menjadi dominan, berisi sel telur yang siap dilepaskan.",
            "symptoms" => "Peningkatan energi dan perubahan suasana hati akibat hormon estrogen."
          ],
          [
            "title" => "3. Fase Ovulasi (Sekitar Hari 14)",
            "description" => "Sel telur yang matang dilepaskan dari ovarium ke tuba falopi. Masa subur terjadi di sini, dan peluang terjadinya kehamilan sangat tinggi jika ada pembuahan.",
            "symptoms" => "Lendir serviks lebih cair dan licin, nyeri ringan pada perut bagian bawah."
          ],
          [
            "title" => "4. Fase Luteal (Hari 15-28)",
            "description" => "Setelah ovulasi, korpus luteum menghasilkan progesteron untuk mempersiapkan rahim menerima embrio. Jika tidak ada pembuahan, siklus dimulai kembali.",
            "symptoms" => "Nyeri payudara, perubahan suasana hati, dan kembung."
          ],
        ];

        foreach ($stages as $stage): ?>
          <div class="timeline-item">
            <h3><?= $stage["title"] ?></h3>
            <p><?= $stage["description"] ?></p>
            <p><strong>Gejala yang dirasakan:</strong> <?= $stage["symptoms"] ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="section">
      <h2>⏳ Durasi Siklus Menstruasi</h2>
      <p>
        <?= "Siklus menstruasi rata-rata berlangsung 28 hari, namun bisa bervariasi antara 21 hingga 35 hari, tergantung individu." ?>
      </p>
    </section>

    <section class="section">
      <h2>📝 Cara Menghitung Siklus Menstruasi</h2>
      <ol>
        <?php
        $steps = [
          "Catat Hari Pertama Haid sebagai Hari 1.",
          "Hitung jumlah hari hingga menstruasi berikutnya dimulai.",
          "Gunakan perhitungan ini untuk memahami pola siklus selama beberapa bulan."
        ];

        foreach ($steps as $step): ?>
          <li><?= $step ?></li>
        <?php endforeach; ?>
      </ol>
    </section>

    <section class="section">
      <h2>📋 Faktor yang Mempengaruhi Siklus Menstruasi</h2>
      <ul>
        <?php
        $factors = [
          "Stres tinggi dapat menyebabkan ketidakseimbangan hormon.",
          "Perubahan berat badan dan pola makan.",
          "Olahraga berlebihan dapat mengganggu siklus.",
          "Kondisi kesehatan seperti PCOS dan gangguan tiroid.",
          "Usia, terutama pada remaja dan menjelang menopause."
        ];

        foreach ($factors as $factor): ?>
          <li><?= $factor ?></li>
        <?php endforeach; ?>
      </ul>
    </section>

    <button class="back-button" onclick="goBack()">🔙 Kembali ke Halaman Sebelumnya</button>

    <footer>
      <p>
        <?= "💡 Memahami siklus menstruasi membantu Anda mengenali tubuh dan lebih siap menghadapi perubahan fisik dan emosional." ?>
      </p>
      <div class="divider"></div>
    </footer>
  </div>

  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>
</html>
