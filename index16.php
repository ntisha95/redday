
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edukasi Menstruasi</title>
  <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* General Body */
    body {
      font-family: 'Arial', sans-serif;
      line-height: 1.6;
      background: linear-gradient(to bottom, #ffe6f2, #fff);
      color: #333;
    }

    /* Hero Section */
    .hero {
      text-align: center;
      background: linear-gradient(135deg, #ff80ab, #ffb6c1);
      color: white;
      padding: 60px 20px;
      border-bottom-left-radius: 50px;
      border-bottom-right-radius: 50px;
    }

    .hero-title {
      font-size: 3rem;
      margin-bottom: 10px;
      font-weight: bold;
      letter-spacing: 1px;
    }

    .hero-subtitle {
      font-size: 1.2rem;
      margin-bottom: 20px;
    }

    .cta-button {
      padding: 15px 30px;
      font-size: 1rem;
      background: #ff4f79;
      color: white;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.3s ease;
    }

    .cta-button:hover {
      background: #e63946;
      transform: scale(1.05);
    }

    /* Features Section */
    .features {
      padding: 50px 20px;
      text-align: center;
    }

    .section-title {
      font-size: 2.5rem;
      color: #e63946;
      margin-bottom: 40px;
      position: relative;
      display: inline-block;
    }

    .section-title::after {
      content: '';
      display: block;
      width: 80px;
      height: 3px;
      background: #ff4f79;
      margin: 10px auto;
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .feature-card {
      background: white;
      border-radius: 20px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .feature-card.feature-large {
      grid-column: span 2;
    }

    .feature-icon {
      width: 80px;
      height: 80px;
      margin-bottom: 15px;
    }

    .feature-card h3 {
      font-size: 1.4rem;
      color: #e63946;
      margin-bottom: 10px;
    }

    .feature-card p {
      font-size: 1rem;
      color: #555;
      line-height: 1.6;
    }

    /* Footer */
    .footer {
      background: #ff80ab;
      color: white;
      text-align: center;
      padding: 20px;
      border-top-left-radius: 50px;
      border-top-right-radius: 50px;
      margin-top: 50px;
    }

    .footer p {
      font-size: 1rem;
    }

    /* Tombol Kembali */
    .back-button {
      background-color: #ff4f79;
      color: white;
      font-size: 1rem;
      padding: 12px 25px;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.3s ease;
      margin-top: 20px;
    }

    .back-button:hover {
      background-color: #e63946;
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <!-- Hero Section -->
  <header class="hero">
    <div class="container">
      <h1 class="hero-title">Edukasi Menstruasi</h1>
      <p class="hero-subtitle">Mendukung perempuan untuk memahami tubuhnya dengan lebih baik.</p>
      <button class="cta-button" onclick="scrollToFeatures()">Pelajari Sekarang</button>
    </div>
  </header>

  <!-- Features Section -->
  <section id="features" class="features">
    <div class="container">
      <h2 class="section-title">Apa yang Kamu Ingin Ketahui?</h2>
      <div class="features-grid">
        <div class="feature-card" onclick="redirectToPage('index18.php')">
          <img src="mens.jpeg" alt="Informasi Menstruasi" class="feature-icon">
          <h3>Siklus Menstruasi</h3>
          <p>Penjelasan mengenai tahapan siklus, rata-rata durasi siklus, dan cara menghitungnya.</p>
        </div>
        <div class="feature-card" onclick="redirectToPage('index19.php')">
          <img src="tipss.jpeg" alt="Kesehatan Reproduksi" class="feature-icon">
          <h3>Tips Sehat</h3>
          <p>Dapatkan saran untuk menjaga kesehatan fisik dan mental selama menstruasi.</p>
        </div>
        <div class="feature-card" onclick="redirectToPage('index20.php')">
          <img src="hormon.jpeg" alt="Mengelola Gejala Menstruasi" class="feature-icon">
          <h3>Info Hormon</h3>
          <p>Pahami cara mengurangi nyeri menstruasi dan saran mengelola perubahan mood.</p>
        </div>
        <div class="feature-card" onclick="redirectToPage('index24.php')">
          <img src="makanan.jpeg" alt="Hindari makanan pemicu gejala tidak nyaman" class="feature-icon">
          <h3>Hindari makanan pemicu gejala tidak nyaman</h3>
          <p>Pahami makanan yang dapat memicu gejala tidak nyaman</p>
        </div>
        <div class="feature-card" onclick="redirectToPage('index21.php')">
          <img src="mitos.jpeg" alt="Mitologi dan Fakta Menstruasi" class="feature-icon">
          <h3>Mitos & Fakta</h3>
          <p>Pelajari mitos yang sering salah mengenai menstruasi dan fakta ilmiah untuk meluruskannya.</p>
        </div>
        <div class="feature-card" onclick="redirectToPage('index25.php')">
          <img src="olahraga.jpeg" alt="Menstruasi dan Olahraga" class="feature-icon">
          <h3>Menstruasi dan Olahraga</h3>
          <p>Aktiivitas fisik yang cocok saat menstruasi</p>
        </div>
        <div class="feature-card" onclick="redirectToPage('index27.php')">
          <img src="produk.jpeg" alt="Penggunaan produk menstruasi alternatif" class="feature-icon">
          <h3>Penggunaan produk menstruasi alternatif</h3>
          <p>Penggunaan menstrual cup, kain pembalut yang bisa dicuci ulang atau celana mestruasi</p>
        </div>
        <div class="feature-card" onclick="redirectToPage('index26.php')">
          <img src="hormon.jpeg" alt="Edukasi tentang hormonan change" class="feature-icon">
          <h3>Edukasi tentang hormonan change</h3>
          <p>Bagaimana perubahaan hormon mempengaruhi tubuh</p>
        </div>
        <div class="feature-card" onclick="redirectToPage('index28.php')">
          <img src="remaja.jpeg" alt="Panduan untuk Remaja" class="feature-icon">
          <h3>Panduan Remaja</h3>
          <p>Panduan untuk pemula tentang apa yang harus dilakukan saat menstruasi.</p>
        </div>
        <div class="feature-card" onclick="redirectToPage('index23.php')">
          <img src="konsul.jpeg" alt="Kapan Harus ke Dokter?" class="feature-icon">
          <h3>Konsultasi Medis</h3>
          <p>Kenali tanda-tanda gangguan menstruasi yang membutuhkan pemeriksaan medis.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer Section -->
  <footer class="footer">
    <div class="container">
      <p>&copy; 2024 Edukasi Menstruasi. Semua Hak Dilindungi.</p>
      <!-- Tombol Kembali ke Menu Sebelumnya -->
      <button class="back-button" onclick="window.history.back()">Kembali ke Menu Sebelumnya</button>
    </div>
  </footer>

  <!-- JavaScript untuk pengalihan halaman -->
  <script>
    function scrollToFeatures() {
      document.getElementById('features').scrollIntoView({ behavior: 'smooth' });
    }

    function redirectToPage(page) {
      window.location.href = page;
    }
  </script>
</body>
</html>
    