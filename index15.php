<?php
// Koneksi ke database
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

// Ambil data durasi menstruasi untuk user tertentu
$userId = 1; // Ganti dengan ID pengguna yang aktif
$query = "
    SELECT 
        MONTH(start_date) AS month, 
        YEAR(start_date) AS year, 
        AVG(period_duration) AS avg_duration 
    FROM menstrual_history 
    WHERE user_id = :user_id 
    GROUP BY year, month
    ORDER BY year, month
";
$stmt = $pdo->prepare($query);
$stmt->execute(['user_id' => $userId]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Pisahkan data untuk tahun ini dan tahun sebelumnya
$currentYear = date('Y');
$currentYearData = [];
$previousYearData = [];
foreach ($data as $row) {
    if ($row['year'] == $currentYear) {
        $currentYearData[(int)$row['month']] = (float)$row['avg_duration'];
    } elseif ($row['year'] == $currentYear - 1) {
        $previousYearData[(int)$row['month']] = (float)$row['avg_duration'];
    }
}

// Format data menjadi array bulanan
function formatDataForChart($data) {
    $formatted = [];
    for ($i = 1; $i <= 12; $i++) {
        $formatted[] = $data[$i] ?? 0;
    }
    return $formatted;
}

$currentYearData = formatDataForChart($currentYearData);
$previousYearData = formatDataForChart($previousYearData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Grafik Mens</title>
  <style>
    /* Global Styles */
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(to bottom, #ffe4e1, #ffc1cc);
        color: #4d4d4d;
    }
    
    header {
        background-color: #ff99aa;
        color: white;
        text-align: center;
        padding: 1.5rem 0;
        font-size: 1.5rem;
        font-weight: bold;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    main {
        padding: 2rem;
    }
    
    footer {
        background-color: #ff6699;
        color: white;
        text-align: center;
        padding: 1rem 0;
        margin-top: 2rem;
        font-size: 0.9rem;
    }
    
    /* Back Button */
    .back-button-container {
        text-align: center;
        margin: 1rem 0;
    }
    
    button {
        background-color: #ff99aa;
        color: white;
        border: none;
        padding: 0.8rem 1.5rem;
        border-radius: 25px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    button:hover {
        background-color: #ff6699;
    }
    
    button:active {
        background-color: #ff3366;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    
    /* Graph Section */
    .graph-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        margin: 1rem auto;
        max-width: 90%;
    }
    
    .graph-container {
        width: 100%;
        max-width: 600px;
    }
    
    canvas {
        width: 100%;
        height: auto;
    }
    
    .info {
        text-align: center;
    }
    
    .info h2 {
        color: #ff6699;
        font-size: 1.5rem;
    }
    
    .info p {
        font-size: 1rem;
        color: #666;
    }

    .year-selector {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin: 1rem 0;
    }
    
    @media (min-width: 768px) {
        .graph-section {
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
    
        .info {
            width: 40%;
        }
    
        .graph-container {
            width: 50%;
        }
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    <script>
    const data = {
        currentYear: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            values: <?= json_encode($currentYearData); ?> // Data tahun ini dari PHP
        },
        previousYear: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            values: <?= json_encode($previousYearData); ?> // Data tahun lalu dari PHP
        }
    };
</script>
  </script>
</head>
    <body>
  <header>
    <h1>🌸 Menu Grafik Mens</h1>
  </header>

  <main>
    <div class="back-button-container">
      <!-- Tombol kembali ke halaman sebelumnya -->
      <button onclick="goBack()">⬅️ Kembali</button>
    </div>

    <div class="year-selector">
      <!-- Pilihan tahun -->
      <button onclick="loadChart('current')">Tahun Ini</button>
      <button onclick="loadChart('previous')">Tahun Lalu</button>
    </div>

    <section class="graph-section">
      <div class="graph-container">
        <!-- Grafik menstruasi -->
        <canvas id="mensChart"></canvas>
      </div>
      <div class="info">
        <h2>📊 Statistik Siklus</h2>
        <p>Pantau siklus menstruasi Anda dengan grafik ini untuk mengenali pola kesehatan Anda.</p>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; <script>document.write(new Date().getFullYear());</script> Aplikasi Kesehatan - Semua Hak Dilindungi</p>
  </footer>

  <!-- Sertakan Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Sertakan file JavaScript -->
  <script>
    // Fungsi tombol kembali
    function goBack() {
        window.history.back();
    }

    // Data untuk grafik
    const data = {
        currentYear: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            values: [5, 4, 6, 5, 5, 4, 6, 5, 4, 5, 6, 5] // Data durasi untuk tahun ini
        },
        previousYear: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            values: [6, 5, 5, 4, 6, 5, 5, 4, 5, 6, 5, 4] // Data durasi untuk tahun lalu
        }
    };

    // Inisialisasi grafik
    let mensChart;
    const ctx = document.getElementById('mensChart').getContext('2d');

    // Fungsi untuk memuat data grafik berdasarkan tahun
    function loadChart(year) {
        const chartData = year === 'previous' ? data.previousYear : data.currentYear;

        if (mensChart) {
            mensChart.destroy();
        }

        mensChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartData.labels,
                datasets: [
                    {
                        label: 'Durasi (Hari)',
                        data: chartData.values,
                        borderColor: '#ff6699',
                        backgroundColor: 'rgba(255, 102, 153, 0.2)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#ff3366',
                        pointRadius: 5,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            color: '#4d4d4d',
                        },
                    },
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan',
                            color: '#4d4d4d',
                            font: {
                                size: 14,
                            },
                        },
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Durasi (Hari)',
                            color: '#4d4d4d',
                            font: {
                                size: 14,
                            },
                        },
                        min: 0,
                        max: 10,
                    },
                },
            },
        });
    }

    // Memuat data untuk tahun ini secara default
    loadChart('current');
  </script>
</body>
</html>
