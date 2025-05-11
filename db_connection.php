<?php
// Pengaturan untuk koneksi database
$servername = "localhost"; // Host server database
$username = "redn2292";        // Username untuk akses database
$password = "Uk3H336T6XBC32";            // Password untuk database (kosong jika belum diset)
$dbname = "redn2292_user_management"; // Nama database yang digunakan

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error); // Menampilkan pesan error jika gagal
}
?>
