<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_login');

// Ambil data user berdasarkan ID
$id = $_GET['id'];
$user_result = $conn->query("SELECT * FROM users WHERE id = '$id'");
$user = $user_result->fetch_assoc();

// Proses update data user
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Update data di tabel users
    $conn->query("UPDATE users SET username = '$username', password = '$password', role = '$role' WHERE id = '$id'");

    // Redirect setelah update
    header('Location: data_pegawai.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="login-container">
    <h1>EDIT AKUN</h1>
    <form method="POST">
        <!-- Input Username -->
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" class="" 
                value="<?php echo htmlspecialchars($user['username']); ?>" required>
        </div>

        <!-- Input Password -->
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" class="" 
                value="<?php echo htmlspecialchars($user['password']); ?>" required>
        </div>

        <!-- Input Role -->
        <div class="input-group">
            <label>Role</label>
            <select name="role" class="">
                <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="karyawan" <?php if ($user['role'] == 'karyawan') echo 'selected'; ?>>Karyawan</option>
            </select>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" name="update" class="btn-login">Update</button>
        <a href="data_pegawai.php" class="btn-cancel">Cancel</a>
    </form>
</div>
</body>
</html>
