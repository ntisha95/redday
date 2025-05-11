<?php
// Koneksi database
$servername = "localhost";
$username_db = "redn2292";
$password_db = "Uk3H336T6XBC32"; // Sesuaikan dengan password MySQL Anda
$dbname = "redn2292user_management"; // Nama database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}

// Logika pengambilan data
$userId = 1; // Ganti dengan ID pengguna yang sedang login
$query = "
    SELECT start_date, cycle_length 
    FROM menstrual_history 
    WHERE user_id = :user_id 
    ORDER BY created_at DESC 
    LIMIT 1
";
$stmt = $pdo->prepare($query);
$stmt->execute(['user_id' => $userId]);
$menstrualData = $stmt->fetch(PDO::FETCH_ASSOC);

$predictedOvulationDates = [];
if ($menstrualData) {
    $startDate = $menstrualData['start_date'];
    $cycleLength = $menstrualData['cycle_length'] ?: 28; // Gunakan default 28 jika NULL

    $currentDate = new DateTime($startDate);
    $endYear = 2027;

    while ($currentDate->format('Y') <= $endYear) {
        $ovulationDate = clone $currentDate;
        $ovulationDate->add(new DateInterval("P14D")); // Hari ke-14 adalah ovulasi
        $predictedOvulationDates[] = $ovulationDate->format('Y-m-d');
        $currentDate->add(new DateInterval("P{$cycleLength}D"));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender Ovulasi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Desain kalender dengan nuansa pink dan girly */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffe6f7; /* Latar belakang pink lembut */
        }
        .calendar-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            text-align: center;
            color: #d26d8e; /* Warna pink cerah */
            font-weight: bold;
        }
        .calendar-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }
        .calendar-controls button {
            padding: 12px 18px;
            font-size: 16px;
            border: none;
            background: #d26d8e; /* Warna pink */
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
        }
        .calendar-controls button:hover {
            background: #f2788b; /* Warna pink muda saat hover */
            transform: scale(1.1);
            transition: all 0.3s ease;
        }
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }
        .day {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 60px;
            font-size: 16px;
            background: #f9cbe8; /* Latar belakang pink muda */
            border-radius: 8px;
            color: #d26d8e;
            font-weight: bold;
        }
        .day.weekday {
            background: #ffb6d1; /* Warna pink lebih terang untuk hari dalam minggu */
        }
        .day.ovulation {
            background: #ff80c0; /* Warna pink cerah untuk hari ovulasi */
            color: #fff;
        }
        .calendar-controls button i {
            margin-right: 8px;
        }
        .calendar .day:hover {
            background-color: #ff4f80; /* Warna pink saat hover */
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button-group {
            text-align: center;
            margin-top: 20px;
        }
        .next-button {
            padding: 12px 18px;
            font-size: 16px;
            background-color: #d26d8e;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .next-button:hover {
            background-color: #f2788b;
        }
    </style>
</head>
<body>
    <div class="calendar-container">
        <div class="header">
            <h1>Kalender Ovulasi Anda</h1>
        </div>
        <div class="calendar-controls">
            <button id="prev-month"><i class="fas fa-arrow-left"></i> Sebelumnya</button>
            <div>
                <select id="month-select"></select>
                <select id="year-select"></select>
            </div>
            <button id="next-month">Berikutnya <i class="fas fa-arrow-right"></i></button>
        </div>
        <div class="calendar" id="calendar-grid"></div>
        <div class="button-group">
            <button class="next-button" onclick="handleMainMenu()">Kembali ke Menu Utama</button>
        </div>
    </div>

    <script>
        const ovulationDates = <?= json_encode($predictedOvulationDates); ?>;
        const calendarGrid = document.getElementById('calendar-grid');
        const monthSelect = document.getElementById('month-select');
        const yearSelect = document.getElementById('year-select');
        let currentDate = new Date();

        function populateMonthYearSelect() {
            for (let i = 0; i < 12; i++) {
                const monthOption = document.createElement('option');
                monthOption.value = i;
                monthOption.textContent = new Date(0, i).toLocaleString('default', { month: 'long' });
                monthSelect.appendChild(monthOption);
            }
            const currentYear = new Date().getFullYear();
            for (let i = currentYear - 10; i <= currentYear + 10; i++) {
                const yearOption = document.createElement('option');
                yearOption.value = i;
                yearOption.textContent = i;
                yearSelect.appendChild(yearOption);
            }
        }

        function generateCalendar(date) {
            calendarGrid.innerHTML = '';
            monthSelect.value = date.getMonth();
            yearSelect.value = date.getFullYear();

            const firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
            const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
            const weekdays = ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];

            weekdays.forEach(day => {
                const weekdayEl = document.createElement('div');
                weekdayEl.textContent = day;
                weekdayEl.className = 'day weekday';
                calendarGrid.appendChild(weekdayEl);
            });

            for (let i = 0; i < firstDay.getDay(); i++) {
                const emptyEl = document.createElement('div');
                emptyEl.className = 'day';
                calendarGrid.appendChild(emptyEl);
            }

            for (let day = 1; day <= lastDay.getDate(); day++) {
                const dayEl = document.createElement('div');
                dayEl.className = 'day';
                dayEl.textContent = day;

                const currentDay = new Date(date.getFullYear(), date.getMonth(), day);
                const currentDayString = currentDay.toISOString().split('T')[0];

                if (ovulationDates.includes(currentDayString)) {
                    dayEl.classList.add('ovulation');
                }

                calendarGrid.appendChild(dayEl);
            }
        }

        document.getElementById('prev-month').addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            generateCalendar(currentDate);
        });

        document.getElementById('next-month').addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            generateCalendar(currentDate);
        });

        function handleMainMenu() {
    alert('Navigasi ke menu utama.');
    window.location.href = 'index11.php'; // Ganti dengan URL halaman menu utama
}


        populateMonthYearSelect();
        generateCalendar(currentDate);
    </script>
</body>
</html>
