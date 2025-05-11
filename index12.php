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
        die("Koneksi gagal: " . $e->getMessage());
    }

    // Proses pembaruan data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newStartDate = $_POST['new_start_date'] ?? null;
        $cycleLength = $_POST['cycle_length'] ?? null;
        $periodDuration = $_POST['period_duration'] ?? null;
        $userId = 1; // ID pengguna tetap

        // Validasi data
        if ($newStartDate && is_numeric($cycleLength) && is_numeric($periodDuration)) {
            try {
                $query = "UPDATE menstrual_history 
                        SET start_date = :start_date, 
                            cycle_length = :cycle_length, 
                            period_duration = :period_duration 
                        WHERE user_id = :user_id";
                $stmt = $pdo->prepare($query);
                $stmt->execute([
                    ':start_date' => $newStartDate,
                    ':cycle_length' => $cycleLength,
                    ':period_duration' => $periodDuration,
                    ':user_id' => $userId,
                ]);
            } catch (PDOException $e) {
                echo "Kesalahan saat memperbarui data: " . $e->getMessage();
            }
        } else {
            echo "Input tidak valid.";
        }
    }

    // Ambil data terakhir
    $userId = 1;
    $query = "SELECT start_date, cycle_length, period_duration 
            FROM selected_date_ranges 
            WHERE user_id = :user_id 
            ORDER BY created_at DESC LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':user_id' => $userId]);
    $menstrualData = $stmt->fetch(PDO::FETCH_ASSOC);

    $predictedDates = [];
    if ($menstrualData) {
        $startDate = $menstrualData['start_date'];
        $cycleLength = $menstrualData['cycle_length'] ?? 28;
        $periodDuration = $menstrualData['period_duration'] ?? 7;

        $currentDate = new DateTime($startDate);
        $endYear = 2027;

        while ($currentDate->format('Y') <= $endYear) {
            $endDate = clone $currentDate;
            $endDate->add(new DateInterval("P{$periodDuration}D"));
            $predictedDates[] = [
                'start' => $currentDate->format('Y-m-d'),
                'end' => $endDate->format('Y-m-d'),
            ];
            $currentDate->add(new DateInterval("P{$cycleLength}D"));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender Menstruasi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
     body {
                font-family: 'Comic Sans MS', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #ffeff8;
            }
            .calendar-container {
                max-width: 600px;
                margin: 30px auto;
                padding: 20px;
                background: linear-gradient(135deg, #ff99cc, #ff66b2);
                border-radius: 20px;
                box-shadow: 0 10px 15px rgba(255, 105, 180, 0.5);
            }
            .header h1 {
                margin: 0;
                font-size: 28px;
                text-align: center;
                color: #fff;
            }
            .calendar-controls {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: 20px 0;
            }
            .calendar-controls button {
                padding: 12px 20px;
                font-size: 16px;
                border: none;
                background: #ff4d94;
                color: #fff;
                border-radius: 15px;
                cursor: pointer;
            }
            .calendar-controls select {
                padding: 12px;
                font-size: 16px;
                border: 2px solid #ff4d94;
                border-radius: 15px;
                background: #fff5f9;
                color: #ff4d94;
            }
            .calendar {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                gap: 8px;
            }
            .day {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                height: 50px;
                font-size: 16px;
                background: #ffe6f2;
                border-radius: 15px;
                position: relative;
            }
            .day.weekday {
                font-weight: bold;
                background: #ff66b2;
                color: white;
            }
            .day.predicted {
                background: #ff1a66;
                color: white;
            }
            .day .icon {
                position: absolute;
                top: 5px;
                right: 5px;
                font-size: 12px;
                color: #FFD700; /* Warna kuning emas */
                text-shadow: 0px 0px 5px rgba(255, 255, 255, 0.8); /* Bayangan putih */
            }
    </style>
</head>
<body>
<div class="calendar-container">
            <div class="header">
                <h1>Kalender Menstruasi Anda</h1>
            </div>
            <div class="calendar-controls">
                <button id="prev-month"><i class="fas fa-chevron-left"></i></button>
                <div>
                    <select id="month-select"></select>
                    <select id="year-select"></select>
                </div>
                <button id="next-month"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="calendar" id="calendar-grid"></div>
            <div style="text-align: center; margin-top: 20px;">
            <h3 style="text-align: center; color: #ffe6f2;">Edit Hari Merah ✨</h3>
        <form method="POST" action="index12.php" style="background: #ffe6f2; padding: 20px; border-radius: 15px; box-shadow: 0px 5px 10px rgba(255, 105, 180, 0.4);">
            <div style="margin-bottom: 15px;">
                <label for="new_start_date" style="font-weight: bold; color: #ff4d94;">Tanggal Mulai Menstruasi:</label><br>
                <input type="date" id="new_start_date" name="new_start_date" required style="padding: 10px; border: 2px solid #ff99cc; border-radius: 10px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="cycle_length" style="font-weight: bold; color: #ff4d94;">Panjang Siklus (hari):</label><br>
                <input type="number" id="cycle_length" name="cycle_length" min="20" max="40" value="28" required style="padding: 10px; border: 2px solid #ff99cc; border-radius: 10px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="period_duration" style="font-weight: bold; color: #ff4d94;">Durasi Menstruasi (hari):</label><br>
                <input type="number" id="period_duration" name="period_duration" min="3" max="10" value="7" required style="padding: 10px; border: 2px solid #ff99cc; border-radius: 10px;">
            </div>
            <button type="submit" class="next-button" style="background: #ff66b2; color: white; padding: 10px 20px; border: none; border-radius: 15px; font-size: 16px; cursor: pointer; box-shadow: 0px 3px 5px rgba(255, 105, 180, 0.4);">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
            <button type="button" onclick="window.history.back()" style="background: #ff99cc; color: white; padding: 10px 20px; border: none; border-radius: 15px; font-size: 16px; cursor: pointer; margin-left: 10px; box-shadow: 0px 3px 5px rgba(255, 105, 180, 0.4);">
                <i class="fas fa-arrow-left"></i> Kembali
            </button>
            <button type="button" onclick="window.location.href='index13.php';" 
            style="background: #ffd700; color: white; padding: 10px 20px; border: none; border-radius: 15px; font-size: 16px; cursor: pointer; margin-left: 10px; box-shadow: 0px 3px 5px rgba(255, 215, 0, 0.4);">
        <i class="fas fa-sticky-note"></i> Catatan
    </button>

        </form>
    </div>

        </div>
    <script>
                const predictedDates = <?= json_encode($predictedDates); ?>;
            const calendarData = {}; // Cache kalender
            const calendarGrid = document.getElementById('calendar-grid');
            const monthSelect = document.getElementById('month-select');
            const yearSelect = document.getElementById('year-select');
            const currentDate = new Date();

            function populateMonthYearSelect() {
                for (let i = 0; i < 12; i++) {
                    const monthOption = document.createElement('option');
                    monthOption.value = i;
                    monthOption.text = new Date(0, i).toLocaleString('en', { month: 'long' });
                    monthSelect.appendChild(monthOption);
                }
                for (let i = currentDate.getFullYear() - 5; i <= currentDate.getFullYear() + 5; i++) {
                    const yearOption = document.createElement('option');
                    yearOption.value = i;
                    yearOption.text = i;
                    yearSelect.appendChild(yearOption);
                }
                monthSelect.value = currentDate.getMonth();
                yearSelect.value = currentDate.getFullYear();
            }

            function renderCalendar(month, year) {
                const key = `${year}-${month}`;
                if (!calendarData[key]) {
                    const firstDay = new Date(year, month, 1);
                    const lastDay = new Date(year, month + 1, 0);
                    const totalDays = lastDay.getDate();

                    calendarData[key] = [];
                    for (let i = 1; i <= totalDays; i++) {
                        const fullDate = new Date(year, month, i).toISOString().split('T')[0];
                        const isPredicted = predictedDates.some(prediction =>
                            fullDate >= prediction.start && fullDate <= prediction.end
                        );
                        calendarData[key].push({ day: i, isPredicted });
                    }
                }

                calendarGrid.innerHTML = '';
                const weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                weekdays.forEach(day => {
                    const dayElement = document.createElement('div');
                    dayElement.classList.add('day', 'weekday');
                    dayElement.innerText = day;
                    calendarGrid.appendChild(dayElement);
                });

                const firstDayOfWeek = new Date(year, month, 1).getDay();
                for (let i = 0; i < firstDayOfWeek; i++) {
                    const emptyElement = document.createElement('div');
                    emptyElement.classList.add('day');
                    calendarGrid.appendChild(emptyElement);
                }

                calendarData[key].forEach(({ day, isPredicted }) => {
                    const dayElement = document.createElement('div');
                    dayElement.classList.add('day');
                    dayElement.innerText = day;
                    if (isPredicted) {
                        dayElement.classList.add('predicted');
                        dayElement.innerHTML += '<span class="icon"><i class="fas fa-heart"></i></span>';
                    }
                    calendarGrid.appendChild(dayElement);
                });
            }

            populateMonthYearSelect();
            renderCalendar(currentDate.getMonth(), currentDate.getFullYear());

            monthSelect.addEventListener('change', () => {
                renderCalendar(parseInt(monthSelect.value), parseInt(yearSelect.value));
            });

            yearSelect.addEventListener('change', () => {
                renderCalendar(parseInt(monthSelect.value), parseInt(yearSelect.value));
            });

            document.getElementById('prev-month').addEventListener('click', () => {
                let month = parseInt(monthSelect.value) - 1;
                let year = parseInt(yearSelect.value);
                if (month < 0) {
                    month = 11;
                    year--;
                }
                monthSelect.value = month;
                yearSelect.value = year;
                renderCalendar(month, year);
            });

            document.getElementById('next-month').addEventListener('click', () => {
                let month = parseInt(monthSelect.value) + 1;
                let year = parseInt(yearSelect.value);
                if (month > 11) {
                    month = 0;
                    year++;
                }
                monthSelect.value = month;
                yearSelect.value = year;
                renderCalendar(month, year);
            });
    </script>
</body>
</html>
