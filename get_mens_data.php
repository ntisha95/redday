<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil user_id dari query string
$user_id = $_GET['user_id'];

// Ambil data siklus menstruasi
$sql = "SELECT MONTH(start_date) AS month, AVG(period_duration) AS avg_duration
        FROM menstruation_data
        WHERE user_id = $user_id
        GROUP BY MONTH(start_date)
        ORDER BY MONTH(start_date)";

// Menjalankan query dan mendapatkan hasil
$result = $conn->query($sql);

$labels = [];
$values = [];

// Proses data hasil query
while ($row = $result->fetch_assoc()) {
    $labels[] = date('M', mktime(0, 0, 0, $row['month'], 10)); // Mengubah angka bulan menjadi nama bulan
    $values[] = round($row['avg_duration'], 1); // Durasi rata-rata
}

// Kembalikan data dalam format JSON
echo json_encode(['labels' => $labels, 'values' => $values]);

$conn->close();
?>
