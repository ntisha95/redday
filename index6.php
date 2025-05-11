<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kami Bisa Membantu!</title>
  <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    /* Global Styles */
    body {
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(135deg, #ffe6f0, #ffd9eb, #ffeef9);
      animation: background-move 10s infinite alternate ease-in-out;
    }
    
    /* Animasi latar belakang */
    @keyframes background-move {
      0% {
        background-position: 0% 50%;
      }
      100% {
        background-position: 100% 50%;
      }
    }
    
    /* Container utama */
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
    }
    
    /* Kartu utama */
    .card {
      text-align: center;
      background: rgba(255, 255, 255, 0.3); /* Transparansi */
      border-radius: 20px;
      padding: 30px 20px;
      width: 90%;
      max-width: 400px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(8px); /* Efek blur kaca */
      position: relative;
      overflow: hidden;
    }
    
    /* Ilustrasi */
    .illustration img {
      max-width: 100%; /* Agar tidak melebihi lebar kontainer */
      width: 120px; /* Ukuran tetap */
      height: auto; /* Menjaga proporsi gambar */
      margin-bottom: 20px;
      animation: bounce 2s infinite ease-in-out;
    }
    
    /* Animasi gambar */
    @keyframes bounce {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-10px);
      }
    }
    
    /* Heading */
    h1 {
      font-size: 1.8rem;
      color: #ff7f9e;
      margin-bottom: 20px;
      font-weight: 700;
      text-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    /* Fitur */
    .features {
      margin-bottom: 20px;
    }
    
    .features p {
      font-size: 1rem;
      color: #ff5f87;
      margin-bottom: 10px;
      text-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .features p strong {
      margin-left: 10px;
    }
    
    /* Tombol */
    .next-btn {
      display: inline-block;
      text-decoration: none;
      background: linear-gradient(135deg, #ffb6c1, #ffa6d1);
      color: white;
      border: none;
      border-radius: 30px;
      padding: 12px 30px;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 8px 15px rgba(255, 128, 159, 0.4);
    }
    
    .next-btn:hover {
      background: linear-gradient(135deg, #ffa6d1, #ffb6c1);
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(255, 128, 159, 0.5);
    }
    
    .next-btn:active {
      transform: translateY(2px);
      box-shadow: 0 6px 15px rgba(255, 128, 159, 0.3);
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="illustration">
        <!-- Ganti dengan path gambar sesuai lokasi -->
        <img src="jempol.png" alt="Ilustrasi wanita senyum">
      </div>
      <h1>Kami Bisa Membantu!</h1>
      <div class="features">
        <p>🌸 <strong>Mengelola gejala menstruasimu</strong></p>
        <p>🌼 <strong>Menjaga keseimbangan hormonmu</strong></p>
        <p>🌷 <strong>Mencatat siklus dan perubahannya</strong></p>
      </div>
      <!-- Tombol ke halaman berikutnya -->
      <a href="index7.php" class="next-btn">Selanjutnya</a>
    </div>
  </div>
</body>
</html>
    