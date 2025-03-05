<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'db_login');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $conn->query("INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");
    header("Location: data_pegawai.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Karyawan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>TAMBAH DATA KARYAWAN</h2>
        <form action="" method="POST">
            <div class="input-group">
                <label>Username:</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label>Password:</label>
                <input type="password" name="password" required><br>
            </div>

            <div class="input-group">
                <label for="role">Login Sebagai</label>
                    <select name="role" id="role">
                        <option value="karyawan">Karyawan</option>
                    </select>
            </div>
            <button class="btn-login" type="submit">Tambah</button>
            <a href="data_pegawai.php" class="btn-cancel">Batal</a>
    </form>
    </div>
</body>
</html>
