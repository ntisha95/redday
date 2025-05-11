<?php
// Tidak perlu pengalihan menggunakan header PHP
// Biarkan HTML mengatur pengalihan melalui JavaScript
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red-Day Period</title>
    <script>
        // Mengalihkan pengguna ke index11.php setelah 3 detik
        setTimeout(function() {
            window.location.href = "index11.php";
        }, 3000); // Waktu dalam milidetik (3000 ms = 3 detik)
    </script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #ffe4e1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            text-align: center;
            position: relative;
            max-width: 600px;
        }

        .calendar {
            background-color: #ffd966;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            margin-bottom: 30px;
        }

        .header span {
            font-weight: bold;
            margin: 0 5px;
            color: #333;
            font-size: 16px;
        }

        .days {
            display: grid;
            grid-template-columns: repeat(7, 40px);
            grid-gap: 8px;
            margin-top: 15px;
        }

        .day {
            width: 40px;
            height: 40px;
            background-color: #f39c9c;
            border-radius: 8px;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .day:hover {
            background-color: #ff6f6f;
            transform: scale(1.1);
        }

        .highlight {
            background-color: #5f9ea0;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        .character .blood-drop {
            width: 80px;
            height: 100px;
            background-color: #e74c3c;
            border-radius: 50% 50% 40% 40% / 60% 60% 20% 20%;
            position: relative;
            margin: 20px auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            animation: bounce 2s infinite ease-in-out;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-15px);
            }
        }

        .blood-drop .face {
            position: absolute;
            top: 30px;
            left: 10px;
        }

        .blood-drop .eyes {
            width: 12px;
            height: 12px;
            background: #fff;
            border-radius: 50%;
            position: absolute;
            top: 5px;
            left: 10px;
            box-shadow: 30px 0 0 #fff;
        }

        .blood-drop .smile {
            width: 35px;
            height: 20px;
            border: 2px solid #fff;
            border-radius: 50%;
            position: absolute;
            top: 30px;
            left: 5px;
            border-top-color: transparent;
        }

        .blood-drop .blush {
            width: 10px;
            height: 10px;
            background: #ffc0cb;
            border-radius: 50%;
            position: absolute;
            top: 18px;
            left: -5px;
            box-shadow: 50px 0 0 #ffc0cb;
            animation: fadeBlush 2s infinite;
        }

        @keyframes fadeBlush {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.6;
            }
        }

        .blood-drop .hands {
            width: 10px;
            height: 40px;
            background: #e74c3c;
            position: absolute;
            top: 50px;
            left: -10px;
            transform: rotate(-30deg);
            box-shadow: 60px 0 0 #e74c3c;
            animation: wave 2s infinite ease-in-out;
        }

        @keyframes wave {
            0%, 100% {
                transform: rotate(-30deg);
            }
            50% {
                transform: rotate(-10deg);
            }
        }

        h1 {
            font-size: 28px;
            color: #d64d4d;
            margin: 20px 0;
        }

        h1 .highlight-text {
            color: #e74c3c;
            font-weight: bold;
        }

        .privacy {
            font-size: 16px;
            font-weight: bold;
            color: #555;
            background: #ffd966;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 2s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="calendar">
            <div class="header">
                <span>S</span>
                <span>M</span>
                <span>T</span>
                <span>W</span>
                <span>TH</span>
                <span>F</span>
                <span>S</span>
            </div>
            <div class="days">
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day highlight"></div>
            </div>
        </div>
        <div class="character">
            <div class="blood-drop">
                <div class="face">
                    <div class="eyes"></div>
                    <div class="smile"></div>
                    <div class="blush"></div>
                </div>
                <div class="hands"></div>
            </div>
        </div>
        <h1>Membuat <span class="highlight-text">Red-Day</span> Period Mu</h1>
        <p class="privacy">Privasimu Aman 100%</p>
    </div>
</body>
</html>