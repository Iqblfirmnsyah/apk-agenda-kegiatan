<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Website</title>
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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">About This Website</h1>
                <p class="text-center text-muted">Aplikasi Agenda Kegiatan Diskominfo</p>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <p>
                            <strong>Aplikasi Agenda Kegiatan Diskominfo</strong> adalah solusi digital berbasis web yang 
                            dirancang untuk mempermudah pengelolaan dan pencatatan kegiatan di lingkungan 
                            Dinas Komunikasi dan Informatika (Diskominfo). 
                        </p>
                        <p>
                            Aplikasi ini menyediakan fitur untuk menyusun agenda kegiatan secara efisien, serta dilengkapi 
                            dengan notifikasi melalui email yang membantu pengguna untuk tetap terinformasi tentang acara 
                            atau tugas yang akan datang. 
                        </p>
                        <p>
                            Dengan tampilan yang user-friendly dan fitur yang intuitif, aplikasi ini bertujuan untuk 
                            meningkatkan produktivitas dan koordinasi antarpegawai dalam menjalankan kegiatan sehari-hari.
                        </p>
                        <hr>
                        <p class="text-center text-muted">© 2024 Iqbal Firmansyah & Muhammad Hidayatullah. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
        crossorigin="anonymous"></script>
</body>
</html>
