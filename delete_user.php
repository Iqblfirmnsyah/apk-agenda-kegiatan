<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_login');

// Ambil ID user untuk dihapus
$id = $_GET['id'];

// Hapus data dari tabel users
$conn->query("DELETE FROM users WHERE id = '$id'");

header('Location: data_pegawai.php');
?>
