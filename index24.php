<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Makanan yang Berpengaruh pada Gejala Menstruasi</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background: linear-gradient(135deg, #fef3e6, #f4eef8);
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

    ul, ol {
      margin-top: 20px;
      padding-left: 20px;
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
      <h1>🍽️ Makanan yang Berpengaruh pada Gejala Menstruasi</h1>
      <p class="intro">
        <?= "Memahami pengaruh makanan dapat membantu meredakan gejala menstruasi." ?>
      </p>
      <div class="divider"></div>
    </header>

    <section class="section">
      <h2>🚫 Makanan yang Dapat Memperburuk Gejala</h2>
      <ul>
        <?php
        $unhealthy_foods = [
          "Makanan Tinggi Kafein: Bisa meningkatkan kecemasan dan nyeri.",
          "Makanan Berminyak atau Digoreng: Memperparah jerawat dan kram.",
          "Minuman Bersoda: Dapat menyebabkan kembung dan ketidaknyamanan."
        ];

        foreach ($unhealthy_foods as $food): ?>
          <li><?= $food ?></li>
        <?php endforeach; ?>
      </ul>
    </section>

    <section class="section">
      <h2>✅ Makanan yang Dianjurkan</h2>
      <ul>
        <?php
        $healthy_foods = [
          "Omega-3: Ikan salmon atau chia seeds untuk mengurangi peradangan.",
          "Magnesium: Alpukat dan pisang untuk meredakan kram.",
          "Serat: Sayuran hijau dan buah-buahan untuk mencegah sembelit."
        ];

        foreach ($healthy_foods as $food): ?>
          <li><?= $food ?></li>
        <?php endforeach; ?>
      </ul>
    </section>

    <button class="back-button" onclick="goBack()">🔙 Kembali ke Halaman Sebelumnya</button>

    <footer>
      <p>
        <?= "💡 Pilihan makanan yang tepat dapat membuat siklus menstruasi lebih nyaman." ?>
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
