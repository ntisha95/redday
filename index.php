<?php
// Variabel dinamis (jika ingin membuat elemen dinamis)
$title = "RED-DAY PERIOD";
$hero_text = "Solusi Cerdas untuk Kesehatan Siklusmu";
$hero_subtext = "Aplikasi Red Day Periode adalah solusi sederhana untuk membantu Anda melacak siklus menstruasi dan kesehatan reproduksi anda. 
Red Day Periode membantu Anda memahami tubuh lebih baik dan mengelola keseharian dengan nyaman. Cocok untuk semua wanita, mulai dari remaja hingga dewasa..";
$cta_text = "Gabung Sekarang";
$cta_button = "Login Aplikasi";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome untuk Ikon Sosial Media -->
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #4f4f4f;
            background-color: #fff4f8;
            line-height: 1.6;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #ff94c2, #ff639c);
            color: white;
            padding: 2rem 0;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo {
            width: 50px;
        }

        /* Animasi Logo */
        .animated-logo {
            animation: rotate-logo 5s linear infinite;
        }

        @keyframes rotate-logo {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        /* Animasi Muncul Teks */
        .animated-text {
            animation: fade-in 2s ease-in;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
files-group
        /* Hero Section */
        .hero {
            text-align: center;
            margin-top: 1rem;
        }

        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .hero-button {
            padding: 0.8rem 2rem;
            background: white;
            color: #e91e63;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s;
        }

        /* Animasi Hover Tombol */
        .animated-button:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(233, 30, 99, 0.5);
        }

        /* Fitur Utama */
        .features-section h2 {
            text-align: center;
            color: #e91e63;
            margin-bottom: 2rem;
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .feature-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            width: 300px;
        }

        /* Animasi Kartu */
        .animated-card {
            animation: slide-in 2s ease-out;
        }

        @keyframes slide-in {
            0% {
                opacity: 0;
                transform: translateX(-30px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            width: 60px;
            margin-bottom: 1rem;
        }

        /* Video Section */
        .video-section {
            background: #fff4f8;
            padding: 3rem 0;
            text-align: center;
        }

        .video-section h2 {
            color: #e91e63;
            margin-bottom: 1rem;
        }

        .video-container video {
            width: 100%;
            max-width: 700px;
            border-radius: 12px;
            border: 3px solid #ffc1e3;
        }

        /* CTA Section */
        .cta-section {
            background: #e91e63;
            color: white;
            text-align: center;
            padding: 2rem;
            border-radius: 12px;
        }

        .cta-button {
            background: white;
            color: #e91e63;
            text-decoration: none;
            padding: 0.8rem 2rem;
            border-radius: 25px;
            font-weight: 700;
            display: inline-block;
            margin-top: 1rem;
            transition: transform 0.3s;
        }

        .cta-button:hover {
            transform: scale(1.1);
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 1rem;
            background: #ff94c2;
            color: white;
            font-size: 0.9rem;
        }

        /* Ikon Media Sosial */
        .social-links {
            margin-top: 1rem;
        }

        .social-icon {
            font-size: 1.5rem;
            color: white;
            margin: 0 1rem;
            transition: color 0.3s;
        }

        .social-icon:hover {
            color: #e91e63;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="nav">
                <div class="logo-container">
                    <img src="logo.png" alt="Logo" class="logo animated-logo">
                    <h1 class="animated-text"><?= $title; ?></h1>
                </div>
                <nav>
                    <ul class="menu">
                        <li><a href="#features">Fitur</a></li>
                        <li><a href="#video">Video</a></li>
                        <li><a href="#cta">Login</a></li>
                    </ul>
                </nav>
            </div>
            <div class="hero">
                <h2 class="animated-text"><?= $hero_text; ?></h2>
                <p><?= $hero_subtext; ?></p>
                <a href="#cta" class="hero-button animated-button">Mulai Sekarang</a>
            </div>
        </div>
    </header>

    <!-- Fitur Utama -->
    <section class="features-section" id="features">
        <div class="container">
            <h2>Fitur Utama</h2>
            <div class="features">
                <div class="feature-card animated-card">
                    <img src="catatan.png" alt="Pencatatan Siklus" class="feature-icon">
                    <h3>Pencatatan Siklus</h3>
                    <p>Catat tanggal menstruasi dan dapatkan prediksi siklus berikutnya.</p>
                </div>
                <div class="feature-card animated-card">
                    <img src="pengingat.png" alt="Pengingat" class="feature-icon">
                    <h3>Pengingat</h3>
                    <p>Notifikasi otomatis untuk persiapan harianmu.</p>
                </div>
                <div class="feature-card animated-card">
                    <img src="tipssehat.png" alt="Tips Kesehatan" class="feature-icon">
                    <h3>Tips Kesehatan</h3>
                    <p>Artikel seputar kesehatan menstruasi dan hormonal.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section class="video-section" id="video">
        <div class="container">
            <h2 class="animated-text">YUK SIMAK</h2>
            <p></p>
            <div class="video-container">
                <video controls>
                    <source src="promos.mp4" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="cta">
        <div class="container">
            <h2>Siap Memulai?</h2>
            <p>Gabung dengan kami dan mulai melacak siklusmu sekarang!</p>
            <a href="login.php" class="cta-button">Login Sekarang</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; <?= date("Y"); ?> <?= $title; ?>. Semua Hak Dilindungi.</p>
            <div class="social-links">
                <a href="https://www.tiktok.com/@red_dayperiode?_t=8rqCs3cO5we&_r=1" target="_blank" class="social-icon"><i class="fab fa-tiktok"></i></a>
                <a href="https://www.instagram.com/redday_periode/profilecard/?igsh=eHJjYm82ZmFlcTBw" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/1234567890" target="_blank" class="social-icon"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>
