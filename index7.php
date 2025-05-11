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

    // Proses penyimpanan tanggal yang dipilih
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selected_dates'])) {
        $userId = 1; // ID pengguna yang aktif, sesuaikan dengan sistem Anda
        $selectedDates = json_decode($_POST['selected_dates'], true);

        foreach ($selectedDates as $date) {
            $query = "INSERT INTO selected_date_ranges (user_id, start_date, created_at) VALUES (:user_id, :start_date, NOW())";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                'user_id' => $userId,
                'start_date' => $date,
            ]);
        }

        // Arahkan ke halaman berikutnya
        header("Location: index8.php");
        exit();
    }

    // Ambil riwayat menstruasi untuk prediksi
    $userId = 1; // Sesuaikan dengan sistem Anda
    $predictedDates = [];

    try {
        $query = "SELECT start_date, cycle_length, period_duration 
                FROM menstrual_history 
                WHERE user_id = :user_id 
                ORDER BY start_date";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':user_id' => $userId]);
        $history = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($history) {
            $endYearDate = new DateTime(date('Y-12-31')); // Sampai akhir tahun ini
            foreach ($history as $data) {
                $currentDate = new DateTime($data['start_date']);
                while ($currentDate->format('Y-m-d') <= $endYearDate->format('Y-m-d')) {
                    $endDate = clone $currentDate;
                    $endDate->add(new DateInterval("P{$data['period_duration']}D"));
                    $predictedDates[] = [
                        'start' => $currentDate->format('Y-m-d'),
                        'end' => $endDate->format('Y-m-d'),
                    ];
                    $currentDate->add(new DateInterval("P{$data['cycle_length']}D"));
                }
            }
        }
    } catch (PDOException $e) {
        echo "Kesalahan saat mengambil data riwayat: " . $e->getMessage();
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pilih Tanggal</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background: linear-gradient(120deg, #fdfbfb, #ebedee);
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 800px;
                margin: 50px auto;
                padding: 20px;
                background: #ffffff;
                border-radius: 15px;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
                text-align: center;
            }

            h1 {
                font-size: 26px;
                color: #ff6f6f;
                margin-bottom: 10px;
            }

            select {
                padding: 10px;
                font-size: 16px;
                margin: 10px;
                border: 1px solid #ccc;
                border-radius: 8px;
                background-color: #f9f9f9;
                color: #555;
                cursor: pointer;
            }

            .calendar {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                gap: 10px;
                margin: 20px 0;
            }

            .day {
                padding: 15px;
                border-radius: 10px;
                text-align: center;
                background: #f3f4f6;
                color: #6b7280;
                font-weight: bold;
                font-size: 14px;
                cursor: pointer;
                transition: transform 0.2s ease, background 0.3s ease;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .day:hover {
                background: #ffdee9;
                transform: translateY(-3px);
            }

            .day.selected {
                background: #ff6f6f;
                color: #ffffff;
                transform: translateY(-5px);
            }

            button {
                padding: 10px 25px;
                border: none;
                background: linear-gradient(45deg, #ff6f6f, #ff947b);
                color: #ffffff;
                border-radius: 8px;
                font-size: 16px;
                cursor: pointer;
                margin-top: 20px;
                transition: background 0.3s ease, transform 0.2s ease;
            }

            button:hover {
                background: linear-gradient(45deg, #ff947b, #ff6f6f);
                transform: scale(1.05);
            }

            .error {
                color: red;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Pilih Tanggal Anda</h1>
            <form method="POST" action="">
                <label for="month">Bulan:</label>
                <select id="month">
                    <?php for ($m = 1; $m <= 12; $m++): ?>
                        <option value="<?= $m ?>"><?= date('F', mktime(0, 0, 0, $m, 1)) ?></option>
                    <?php endfor; ?>
                </select>

                <label for="year">Tahun:</label>
                <select id="year">
                    <?php for ($y = date('Y'); $y <= date('Y') + 1; $y++): ?>
                        <option value="<?= $y ?>"><?= $y ?></option>
                    <?php endfor; ?>
                </select>

                <div class="calendar"></div>
                <input type="hidden" id="selected_dates" name="selected_dates">
                <div id="error" class="error"></div>
                <button type="submit">Simpan Tanggal dan Lanjut</button>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const daysContainer = document.querySelector('.calendar');
                const monthSelect = document.getElementById('month');
                const yearSelect = document.getElementById('year');
                const selectedDatesInput = document.getElementById('selected_dates');
                const errorContainer = document.getElementById('error');

                // Prediksi tanggal dari PHP
                const predictedDates = <?= json_encode($predictedDates) ?>;
                const selectedDates = [];

                function isPredicted(date) {
                    return predictedDates.some(prediction => date >= prediction.start && date <= prediction.end);
                }

                function renderCalendar() {
                    const year = parseInt(yearSelect.value);
                    const month = parseInt(monthSelect.value);
                    const daysInMonth = new Date(year, month, 0).getDate();

                    daysContainer.innerHTML = '';

                    for (let day = 1; day <= daysInMonth; day++) {
                        const date = `${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                        const dayElement = document.createElement('div');
                        dayElement.className = 'day';
                        dayElement.textContent = day;
                        dayElement.dataset.date = date;

                        if (selectedDates.includes(date)) {
                            dayElement.classList.add('selected');
                        } else if (isPredicted(date)) {
                            dayElement.style.background = '#ffd700'; // Warna khusus untuk prediksi
                            dayElement.style.color = '#000';
                        }

                        dayElement.addEventListener('click', () => {
                            if (selectedDates.includes(date)) {
                                selectedDates.splice(selectedDates.indexOf(date), 1);
                                dayElement.classList.remove('selected');
                            } else if (!isPredicted(date)) {
                                if (selectedDates.length < 10) {
                                    selectedDates.push(date);
                                    dayElement.classList.add('selected');
                                } else {
                                    errorContainer.textContent = 'Anda hanya dapat memilih hingga 10 tanggal.';
                                }
                            }

                            selectedDatesInput.value = JSON.stringify(selectedDates);
                            errorContainer.textContent = '';
                        });

                        daysContainer.appendChild(dayElement);
                    }
                }

                monthSelect.addEventListener('change', renderCalendar);
                yearSelect.addEventListener('change', renderCalendar);
                renderCalendar();
            });
        </script>
    </body>
    </html>