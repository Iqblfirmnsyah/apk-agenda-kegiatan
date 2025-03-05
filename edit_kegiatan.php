<?php
session_start();
include 'database.php';

// Cek apakah user sudah login
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM kegiatan WHERE id_jadwal = $id";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);

// Update data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kegiatan = $_POST['nama_kegiatan'];
    $hari_kegiatan = $_POST['hari_kegiatan'];
    $tanggal_kegiatan = $_POST['tanggal_kegiatan'];
    $waktu_mulai = $_POST['waktu_mulai'];
    $tempat = $_POST['tempat'];
    $keterangan = $_POST['keterangan'];

    $sql_update = "UPDATE kegiatan SET 
                    nama_kegiatan = '$nama_kegiatan',
                    hari_kegiatan = '$hari_kegiatan',
                    tanggal_kegiatan = '$tanggal_kegiatan',
                    waktu_mulai = '$waktu_mulai',
                    tempat = '$tempat',
                    keterangan = '$keterangan'
                   WHERE id_jadwal = $id";

    if (mysqli_query($koneksi, $sql_update)) {
        header("Location: admin.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kegiatan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Edit Kegiatan</h2>
        <form method="POST">
            <div class="input-group">
                <label>Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" value="<?= $data['nama_kegiatan']; ?>" required>
            </div>
            <div class="input-group">
                <label>Hari Kegiatan</label>
                <input type="text" name="hari_kegiatan" value="<?= $data['hari_kegiatan']; ?>" required>
            </div>
            <div class="input-group">
                <label>Tanggal Kegiatan</label>
                <input type="date" name="tanggal_kegiatan" value="<?= $data['tanggal_kegiatan']; ?>" required>
            </div>
            <div class="input-group">
                <label>Waktu Mulai</label>
                <input type="time" name="waktu_mulai" value="<?= $data['waktu_mulai']; ?>" required>
            </div>
            <div class="input-group">
                <label>Tempat</label>
                <input type="text" name="tempat" value="<?= $data['tempat']; ?>" required>
            </div>
            <div class="input-group">
                <label>Keterangan (Opsional)</label>
                <textarea name="keterangan" rows="3"><?= $data['keterangan']; ?></textarea>
            </div>
            <button class="btn-login" type="submit">Update</button>
            <a href="admin.php" class="btn-cancel">Batal</a>
        </form>
    </div>
</body>
</html>
