<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Menstruasi dan Ovulasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fce4ec, #ff80ab); /* Gradasi lembut untuk latar belakang */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        /* Container Utama */
        .container {
            width: 90%;
            max-width: 900px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
            padding: 30px;
            gap: 30px;
        }

        /* Header */
        .header {
            flex: 1;
            text-align: center; /* Teks terpusat */
        }

        .header-icon {
            margin-bottom: 20px;  /* Memberikan jarak antara ikon dan teks */
        }

        .header-icon img {
            width: 100px;  /* Ukuran gambar lebih besar */
            height: 100px; /* Menjaga proporsi gambar */
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .header-icon img:hover {
            transform: scale(1.1);  /* Efek zoom saat hover */
        }

        .header h1, .header h2 {
            font-size: 40px;
            color: #ff5a8f;
            margin-bottom: 10px;
            font-weight: 600;
            text-shadow: 2px 2px 10px rgba(255, 88, 122, 0.5);
        }

        .header p {
            font-size: 18px;
            color: #888;
            font-weight: 400;
        }

        /* Navbar (Menu Navigasi) */
        .navbar {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            background: linear-gradient(135deg, #ff80ab, #ff5a8f);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .navbar ul {
            list-style: none;
            padding: 0;
            width: 100%;
        }

        .navbar ul li {
            margin-bottom: 15px;
        }

        .menu-item {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 20px;
            border-radius: 50px;
            transition: all 0.3s ease;
            width: 100%;
            background-color: #ff5a8f;
        }

        .menu-item:hover {
            background-color: #ff80a5;
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(255, 88, 122, 0.6);
        }

        .menu-icon {
            width: 40px;
            height: 40px;
            background-color: #fff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px;
        }

        /* Animasi bounce pada ikon */
        @keyframes iconBounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-8px);
            }
        }

        .menu-item img:hover {
            animation: iconBounce 0.5s ease-in-out;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .navbar {
                width: 100%;
                align-items: center;
            }

            .menu-item {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <!-- Icon di atas teks -->
            <div class="header-icon">
                <img src="mikir.png" alt="Icon"> <!-- Ganti dengan path ikon yang diinginkan -->
            </div>
            <h1>Selamat Datang di Aplikasi</h1>
            <h2>Menstruasi dan Ovulasi</h2>
            <p>Temukan informasi penting dan bermanfaat di bawah ini.</p>
        </div>

        <!-- Menu Navigasi -->
        <nav class="navbar">
            <ul>
                <li>
                    <a href="index12.php" class="menu-item" id="calendar-menstruation">
                        <img src="kalendermens.png" alt="Kalender Menstruasi" class="menu-icon"> Kalender Menstruasi
                    </a>
                </li>
                <li>
                    <a href="index14.php" class="menu-item" id="calendar-ovulation">
                        <img src="kalenderovulasi.png" alt="Kalender Ovulasi" class="menu-icon"> Kalender Ovulasi
                    </a>
                </li>
                <li>
                    <a href="index16.php" class="menu-item" id="education">
                        <img src="edukasi.png" alt="Edukasi" class="menu-icon"> Edukasi
                    </a>
                </li>
                <li>
                    <a href="index15.php" class="menu-item" id="charts">
                        <img src="grafik.png" alt="Grafik" class="menu-icon"> Grafik
                    </a>
                </li>
                <li>
                    <a href="index17.php" class="menu-item" id="settings">
                        <img src="pengaturan.png" alt="Pengaturan" class="menu-icon"> Pengaturan
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</body>
</html>