<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_login');

// Ambil data email dan nama berdasarkan ID
$id = $_GET['id'];
$email_result = $conn->query("SELECT * FROM email_penerima WHERE id = '$id'");
$email_data = $email_result->fetch_assoc();

// Proses update atau hapus email dan nama
if (isset($_POST['update_email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Jika checkbox hapus email dicentang, hapus data email dan nama
    if (isset($_POST['delete_email'])) {
        $conn->query("DELETE FROM email_penerima WHERE id = '$id'");
    } else {
        // Update atau tambahkan nama dan email
        if ($email_result->num_rows > 0) {
            $conn->query("UPDATE email_penerima SET name = '$name', email = '$email' WHERE id = '$id'");
        } else {
            $conn->query("INSERT INTO email_penerima (id, name, email) VALUES ('$id', '$name', '$email')");
        }
    }

    // Redirect setelah update
    header('Location: data_pegawai.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="login-container">
    <h2>Edit Nama dan Email</h2>
    <form method="POST">
        <!-- Input Nama -->
        <div class="input-group">
            <label>Nama</label>
            <input type="text" name="name" class="" 
                value="<?php echo isset($email_data['name']) ? htmlspecialchars($email_data['name']) : ''; ?>" required>
        </div>

        <!-- Input Email -->
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" class="" 
                value="<?php echo isset($email_data['email']) ? htmlspecialchars($email_data['email']) : ''; ?>" required>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" name="update_email" class="btn-login">Update</button>
        <a href="data_pegawai.php" class="btn-cancel">Cancel</a>
    </form>
</div>
</body>
</html>
