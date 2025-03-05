<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_login');

// Ambil data dari tabel users
$result_users = $conn->query("SELECT * FROM users");

// Ambil data dari tabel email_penerima
$result_email = $conn->query("SELECT * FROM email_penerima");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<>
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
        <!-- Tabel Users -->
        <h1>DATA AKUN KARYAWAN</h1>
        <a href="tambah_user.php" class="btn-add">
            <i class="fas fa-plus"></i> Tambah Data Karyawan
        </a>
        <table border="1" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $no = 1; // Variabel penghitung dimulai dari 1
                while ($user = $result_users->fetch_assoc()): ?>
                    <tr>
                        <td><?= $no++; ?></td> <!-- Menampilkan nomor urut -->
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['password']; ?></td>
                        <td><?= $user['role']; ?></td>
                        <td>
                            <a href="edit_kegiatan.php?id=<?= $user['id']; ?>" class="btn-edit">Edit</a>
                            <a href="delete_user.php?id=<?= $user['id']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table><br>

        <!-- Tabel Email -->
        <h1>DATA EMAIL KARYAWAN</h1>
        <a href="tambah_email.php" class="btn-add">
            <i class="fas fa-plus"></i> Tambah Email Karyawan
        </a>
        <table border="1" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            while ($email_row = $result_email->fetch_assoc()) :
                $user_name = '';
                $result_users->data_seek(0); // Reset pointer hasil query
                while ($user_row = $result_users->fetch_assoc()) {
                    if ($user_row['id'] == $email_row['id']) {
                        $user_name = $user_row['username'];
                        break;
                    }
                }
            ?>

            <tr>
                    <td><?= $no++; ?></td> <!-- Menampilkan nomor urut -->
                    <td><?= $email_row['name']; ?></td>
                    <td><?= $email_row['email']; ?></td>
                    <td>
                        <a href="edit_email.php?id=<?= $email_row['id']; ?>" class="btn-edit">Edit</a>
                        <a href="delete_email.php?id=<?= $email_row['id']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>

            </tbody>
        </table>
    </div>
</body>
</html>
