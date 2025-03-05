<?php
include 'database.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        if ($role == "admin") {
            header("Location: admin.php");
        } else if ($role == "karyawan") {
            header("Location: karyawan.php");
        } else {
            echo "<script>alert('Role tidak dikenali!'); window.location='index.html';</script>";
        }
    } else {
        echo "<script>alert('Login gagal, periksa kembali username, password, dan role!'); window.location='index.html';</script>";
    }
}
?>
