<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // PHPMailer
include 'database.php';

// Aktifkan debugging PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ambil data kegiatan untuk hari ini
$tanggalHariIni = date('Y-m-d');
$query = "SELECT * FROM kegiatan WHERE tanggal_kegiatan = '$tanggalHariIni'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    echo json_encode(['success' => false, 'message' => 'Gagal mengambil data kegiatan: ' . mysqli_error($koneksi)]);
    exit();
}

if (mysqli_num_rows($result) > 0) {
    $mail = new PHPMailer(true);

    try {
        // Konfigurasi email
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'diskominfokegiatan@gmail.com';
        $mail->Password = 'sqee azox izjf fnus'; // App password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom('diskominfokegiatan@gmail.com', 'Pengingat Agenda Kegiatan Diskominfo');

        // Ambil semua email penerima
        $emailQuery = "SELECT email FROM email_penerima";
        $emailResult = mysqli_query($koneksi, $emailQuery);

        if (!$emailResult || mysqli_num_rows($emailResult) == 0) {
            echo json_encode(['success' => false, 'message' => 'Tidak ada email penerima yang ditemukan']);
            exit();
        }

        // Simpan semua email penerima dalam array
        $emailAddresses = [];
        while ($emailRow = mysqli_fetch_assoc($emailResult)) {
            if (!empty($emailRow['email']) && filter_var($emailRow['email'], FILTER_VALIDATE_EMAIL)) {
                $emailAddresses[] = $emailRow['email'];
            }
        }

        // Loop untuk setiap kegiatan hari ini
        while ($row = mysqli_fetch_assoc($result)) {
            // Tambahkan semua email penerima
            foreach ($emailAddresses as $email) {
                $mail->addAddress($email);
            }

            // Isi email
            $mail->isHTML(true);
            $mail->Subject = "Pengingat: " . $row['nama_kegiatan'];
            $mail->Body = "
                <h1>Pengingat Kegiatan Diskominfo</h1>
                <p><strong>Nama Kegiatan:</strong> {$row['nama_kegiatan']}</p>
                <p><strong>Hari:</strong> {$row['hari_kegiatan']}</p>
                <p><strong>Tanggal:</strong> {$row['tanggal_kegiatan']}</p>
                <p><strong>Waktu:</strong> {$row['waktu_mulai']}</p>
                <p><strong>Tempat:</strong> {$row['tempat']}</p>
                <p><strong>Keterangan:</strong> {$row['keterangan']}</p>
            ";

            // Kirim email untuk kegiatan ini
            if (!$mail->send()) {
                echo json_encode(['success' => false, 'message' => 'Gagal mengirim email: ' . $mail->ErrorInfo]);
                exit();
            }

            // Hapus penerima untuk kegiatan berikutnya
            $mail->clearAddresses();
        }

        echo json_encode(['success' => true, 'message' => 'Semua email berhasil dikirim']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Kesalahan PHPMailer: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Tidak ada kegiatan untuk hari ini']);
}

?>