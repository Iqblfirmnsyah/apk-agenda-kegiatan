<?php
// Pastikan koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_login');

// Ambil ID yang dikirimkan melalui URL
$id = $_GET['id'];

// Pastikan ID valid
if (isset($id) && is_numeric($id)) {
    // Query untuk menghapus email berdasarkan ID
    $conn->query("DELETE FROM email_penerima WHERE id = '$id'");

    // Redirect kembali ke halaman data email setelah penghapusan
    header('Location: data_pegawai.php');
    exit();
} else {
    // Jika ID tidak valid, redirect ke halaman utama atau halaman error
    header('Location: data_pegawai.php');
    exit();
}
?>
