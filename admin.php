<?php
session_start();
include 'database.php';

// Cek apakah user sudah login dan memiliki role admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Ambil data dari tabel kegiatan dengan urutan terbaru di atas
$sql = "SELECT * FROM kegiatan ORDER BY tanggal_kegiatan DESC";
$result = mysqli_query($koneksi, $sql);

if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Kegiatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
    <aside id="sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <img src="img/Logoo.png" width="30px">
            </button>
            <div class="sidebar-logo">
                <a href="#">Diskominfo</a>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="admin.php" class="sidebar-link">
                    <i class="bi bi-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="data_pegawai.php" class="sidebar-link">
                    <i class="bi bi-people"></i>
                    <span>Informasi Karyawan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="about.php" class="sidebar-link">
                    <i class="bi bi-info-circle"></i>
                    <span>About</span>
                </a>
            </li>
        <div class="sidebar-footer">
            <a href="logout.php" class="sidebar-link">
                <i class="bi bi-box-arrow-left"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
<script src="nav.js"></script>

<div class="container">
    <h1>AGENDA KEGIATAN DISKOMINFO</h1>
    <div class="clock">
        <div id="Date">Friday 22 November 2024</div>
        <ul>
            <li id="hours">08</li>
            <li id="point">:</li>
            <li id="min">30</li>
            <li id="point">:</li>
            <li id="sec">30</li>
        </ul>
    </div>
    <div>
        <script src="digital_clock.js"></script>
    </div>
    <div>
        <button id="kirimEmail" class="btn-lonceng">
            <i class="fas fa-bell"></i> Kirim Notifikasi Email
        </button>
    </div>
    <script src="kirim_email.js"></script>
    
    <div class="container">
        <a href="tambah_kegiatan.php" class="btn-add">
            <i class="fas fa-plus"></i> Tambah Kegiatan</a>
        <table border="1" class="table">
            <thead>
                <tr>
                    <th>No</th> <!-- Diganti dari "ID Jadwal" menjadi "No" -->
                    <th>Nama Kegiatan</th>
                    <th>Hari Kegiatan</th>
                    <th>Tanggal Kegiatan</th>
                    <th>Waktu Mulai</th>
                    <th>Tempat</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1; // Variabel penghitung dimulai dari 1
                while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $no++; ?></td> <!-- Menampilkan nomor urut -->
                        <td style="text-align: left;"><?= $row['nama_kegiatan']; ?></td>
                        <td><?= $row['hari_kegiatan']; ?></td>
                        <td><?= $row['tanggal_kegiatan']; ?></td>
                        <td><?= $row['waktu_mulai']; ?></td>
                        <td><?= $row['tempat']; ?></td>
                        <td><?= $row['keterangan']; ?></td>
                        <td>
                            <a href="edit_kegiatan.php?id=<?= $row['id_jadwal']; ?>" class="btn-edit">
                                <i class="fas fa-edit"></i>Edit
                            </a>
                            <a href="hapus_kegiatan.php?id=<?= $row['id_jadwal']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
