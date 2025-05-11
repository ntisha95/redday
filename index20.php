<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Memahami Peran Hormon Selama Menstruasi</title>
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

    ul, p, ol {
      font-size: 1rem;
      line-height: 1.6;
      margin: 10px 0;
    }

    ul li, ol li {
      margin-bottom: 10px;
    }

    footer {
      text-align: center;
      margin-top: 40px;
      font-size: 1rem;
      color: #7e7e7e;
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
      <h1>🩸 Memahami Peran Hormon Selama Menstruasi</h1>
      <p class="intro">
        <?= "Pelajari bagaimana hormon memengaruhi tubuh dan emosi selama siklus menstruasi serta cara mengelolanya." ?>
      </p>
      <div class="divider"></div>
    </header>

    <section class="section">
      <h2>🔬 Peran Hormon dalam Siklus Menstruasi</h2>
      <div class="timeline">
        <div class="timeline-item">
          <h3>1. Estrogen</h3>
          <p>
            <?= "Estrogen meningkat selama fase folikular untuk mempersiapkan tubuh bagi kehamilan. Penurunannya sebelum menstruasi dapat memicu perubahan suasana hati." ?>
          </p>
        </div>
        <div class="timeline-item">
          <h3>2. Progesteron</h3>
          <p>
            <?= "Progesteron naik pada fase luteal untuk menjaga lapisan rahim. Penurunan drastisnya menyebabkan kram menstruasi dan gejala PMS." ?>
          </p>
        </div>
        <div class="timeline-item">
          <h3>3. Prostaglandin</h3>
          <p>
            <?= "Prostaglandin bertanggung jawab atas kontraksi rahim selama menstruasi. Kadar yang tinggi sering menjadi penyebab nyeri menstruasi." ?>
          </p>
        </div>
      </div>
    </section>

    <section class="section">
      <h2>💡 Cara Mengurangi Nyeri Menstruasi</h2>
      <ul>
        <li><strong>Manajemen dengan Pola Hidup Sehat:</strong> Olahraga ringan, konsumsi makanan anti-inflamasi, dan hindari gula serta kafein.</li>
        <li><strong>Kompres Hangat:</strong> Gunakan bantal pemanas untuk merelaksasi otot rahim.</li>
        <li><strong>Pijat Ringan:</strong> Lakukan pijatan lembut pada perut atau punggung bawah.</li>
        <li><strong>Konsumsi Suplemen:</strong> Seperti magnesium, vitamin B6, atau teh herbal.</li>
        <li><strong>Obat Pereda Nyeri:</strong> Konsultasikan dengan dokter jika perlu.</li>
      </ul>
    </section>

    <section class="section">
      <h2>🌈 Saran untuk Mengelola Perubahan Mood</h2>
      <ol>
        <li><strong>Latihan Relaksasi:</strong> Meditasi, yoga, atau aromaterapi.</li>
        <li><strong>Aktivitas Fisik:</strong> Olahraga ringan untuk meningkatkan endorfin.</li>
        <li><strong>Tidur yang Cukup:</strong> Pastikan tidur berkualitas selama 7-9 jam.</li>
        <li><strong>Konsumsi Makanan Pendukung Mood:</strong> Cokelat hitam, karbohidrat kompleks, dan omega-3.</li>
        <li><strong>Hindari Stres:</strong> Fokus pada aktivitas yang Anda nikmati.</li>
        <li><strong>Komunikasi:</strong> Berbagi dengan orang terdekat untuk mendapatkan dukungan emosional.</li>
      </ol>
    </section>

    <footer>
      <p>
        <?= "💡 Dengan memahami hormon selama menstruasi, Anda dapat lebih mudah mengelola kesehatan fisik dan mental." ?>
      </p>
      <div class="divider"></div>
    </footer>

    <!-- Tombol Kembali ke Halaman Sebelumnya -->
    <div class="back-button">
      <button onclick="window.history.back()">Kembali ke Halaman Sebelumnya</button>
    </div>
  </div>
</body>
</html>
