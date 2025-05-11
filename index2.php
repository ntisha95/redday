<?php
session_start();
include 'config.php'; // File koneksi ke database

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Tangkap tahun yang dipilih dari URL
if (isset($_GET['year'])) {
    $year_selected = intval($_GET['year']); // Pastikan tahun adalah angka

    // Simpan data ke database
    $query = "INSERT INTO year_selections (username, year_selected) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $username, $year_selected);
    
    if ($stmt->execute()) {
        echo "Tahun $year_selected berhasil disimpan!";
    } else {
        echo "Gagal menyimpan tahun: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>
