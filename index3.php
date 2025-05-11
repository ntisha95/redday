
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data dari tombol yang ditekan
    $response = isset($_POST['response']) ? $_POST['response'] : '';

    // Lakukan sesuatu berdasarkan respons pengguna
    if ($response === 'yes') {
        // Redirect ke halaman index4.html jika pengguna memilih "Ya"
        header("Location: index4.php");
        exit();
    } elseif ($response === 'no') {
        // Redirect ke halaman index4.html jika pengguna memilih "Tidak"
        header("Location: index4.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menstrual Cycle Question</title>
  <style>
    /* Global Styling */
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #ff9a9e, #fad0c4, #fad0c4);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Container */
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    /* Card Styling */
    .question-card {
        background: white;
        border-radius: 30px;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
        text-align: center;
        padding: 30px;
        position: relative;
        width: 90%;
        max-width: 400px;
        overflow: hidden;
    }

    /* Top Decorative Element */
    .top-decor {
        position: absolute;
        top: -50px;
        left: -50px;
        width: 150px;
        height: 150px;
        background: radial-gradient(circle, #ff99cc, #ff6699);
        border-radius: 50%;
        z-index: 1;
        animation: float 6s infinite ease-in-out;
    }

    /* Illustration */
    .illustration {
        width: 120px;
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
    }

    /* Question Text */
    .question-card h1 {
        font-size: 22px;
        color: #ff4081;
        margin-bottom: 25px;
        position: relative;
        z-index: 2;
    }

    /* Buttons */
    .buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
        position: relative;
        z-index: 2;
    }

    /* Styling for Buttons */
    .button {
        position: relative;
        padding: 12px 30px;
        font-size: 18px;
        font-weight: bold;
        color: white;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 10px;
        justify-content: center;
        overflow: hidden;
    }

    .button.yes {
        background: linear-gradient(135deg, #ff7e5f, #feb47b);
        box-shadow: 0px 5px 15px rgba(255, 126, 95, 0.4);
    }

    .button.no {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        box-shadow: 0px 5px 15px rgba(106, 17, 203, 0.4);
    }

    .button:hover {
        transform: scale(1.1);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }

    .button .icon {
        font-size: 20px;
    }

    /* Button Hover Effects */
    .button::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 200%;
        height: 100%;
        background: rgba(255, 255, 255, 0.2);
        transform: skewX(-45deg);
        transition: left 0.3s ease;
        z-index: 1;
    }

    .button:hover::after {
        left: 100%;
    }

    .button span {
        z-index: 2;
    }

    /* Adding Smooth Hover Animation */
    .button:active {
        transform: scale(0.98);
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
    }

    /* Animations */
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(20px);
        }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="question-card">
      <div class="top-decor"></div>
      <img src="mikir.png" alt="Illustration" class="illustration">
      <h1>Apakah siklus menstruasimu teratur, girls?</h1>
      <div class="buttons">
        <!-- Form untuk tombol Ya -->
        <form method="POST">
          <button class="button yes" name="response" value="yes">
            <span class="icon">✔️</span> Ya
          </button>
        </form>
        <!-- Form untuk tombol Tidak -->
        <form method="POST">
          <button class="button no" name="response" value="no">
            <span class="icon">❌</span> Tidak
          </button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
