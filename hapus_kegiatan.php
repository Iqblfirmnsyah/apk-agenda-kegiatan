<?php
session_start();
include 'database.php';

// Cek apakah user sudah login
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$sql = "DELETE FROM kegiatan WHERE id_jadwal = $id";

if (mysqli_query($koneksi, query: $sql)) {
    header("Location: admin.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
