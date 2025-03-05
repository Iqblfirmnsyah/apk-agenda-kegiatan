<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include 'database.php';

// Jika tombol submit ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kegiatan = $_POST['nama_kegiatan'];
    $hari_kegiatan = $_POST['hari_kegiatan'];
    $tanggal_kegiatan = $_POST['tanggal_kegiatan'];
    $waktu_mulai = $_POST['waktu_mulai'];
    $tempat = $_POST['tempat'];
    $keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : null;

    $sql = "INSERT INTO kegiatan (nama_kegiatan, hari_kegiatan, tanggal_kegiatan, waktu_mulai, tempat, keterangan)
            VALUES ('$nama_kegiatan', '$hari_kegiatan', '$tanggal_kegiatan', '$waktu_mulai', '$tempat', '$keterangan')";
    
    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='admin.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Kegiatan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Form Tambah Kegiatan</h2>
        <form method="POST">
            <div class="input-group">
                <label>ID Jadwal</label>
                <input type="text" name="id_jadwal" required>
            </div>
            <div class="input-group">
                <label>Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" required>
            </div>
            <div class="input-group">
                <label>Hari Kegiatan</label>
                <select name="hari_kegiatan" required>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
            </div>
            <div class="input-group">
                <label>Tanggal Kegiatan</label>
                <input type="date" name="tanggal_kegiatan" required>
            </div>
            <div class="input-group">
                <label>Waktu Mulai</label>
                <input type="time" name="waktu_mulai" required>
            </div>
            <div class="input-group">
                <label>Tempat</label>
                <input type="text" name="tempat" required>
            </div>
            <div class="input-group">
                <label>Keterangan (Opsional)</label>
                <textarea name="keterangan" rows="3"></textarea>
            </div>
            <button class="btn-login" type="submit">Tambah</button>
            <a href="admin.php" class="btn-cancel">Batal</a>
        </form>
    </div>
</body>
</html>
