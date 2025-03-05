<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'db_login');
    $email = $_POST['email'];
    $name = $_POST['name']; // Ganti nama menjadi name

    $conn->query("INSERT INTO email_penerima (email, name) VALUES ('$email', '$name')"); // Ganti nama menjadi name
    header("Location: data_pegawai.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Email Karyawan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Tambah Email Karyawan</h2>
        <form action="" method="POST">
            <div class="input-group">
                <label>Email:</label>
                <input type="email" name="email" required><br>
            </div>
            <div class="input-group">
                <label>Name:</label> <!-- Ganti Nama menjadi Name -->
                <input type="text" name="name" required><br><br> <!-- Ganti nama menjadi name -->
            </div>
            <button class="btn-login" type="submit">Tambah</button>
            <a href="data_pegawai.php" class="btn-cancel">Batal</a>
        </form>
    </div>
</body>
</html>
