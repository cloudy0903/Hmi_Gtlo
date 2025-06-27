<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HMI GTLO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image" href="image/hmi_mpo_gtlo.png">
    <link rel="stylesheet" href="css/login.css">
    <style>
        .notification {
            position: absolute;
            top: 40px;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px;
            background-color: #6c757d;
            color: white;
            border-radius: 10px;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            display: none;
            z-index: 9999;
        }

        .notification.show {
            display: block;
        }

        .notification-error {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

   <div class="notification" id="notification-success">
        Login Sukses
    </div>

    <div class="notification notification-error" id="notification-error">
        Login Gagal
    </div>

    <div class="container d-flex justify-content-center align-items-center h-100">
        <div class="card login-card">
            <h2 class="login-title">Log In</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="role" class="form-label">Pilih Peran</label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="">-- Pilih --</option>
                        <option value="Anggota">Anggota</option>
                        <option value="komisariat">Komisariat</option>
                        <option value="cabang">Cabang</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" name="login" class="btn login-btn">Log In</button>
                    <a href="index.php" class="btn kembali-btn">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <?php
$koneksi = mysqli_connect("localhost", "root", "", "hmi");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

if (isset($_POST['login'])) {
    $role = $_POST['role']; // Role (Pengguna / Petugas)
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($role == 'Anggota') {
        // Cek login anggota
        $data_anggota = mysqli_query($koneksi, "SELECT * FROM anggota_hmi WHERE email ='$email' AND password ='$password'");
        $r_anggota = mysqli_fetch_array($data_anggota);
        if ($r_anggota) {
            $_SESSION['nama'] = $r_anggota['nama'];
            $_SESSION['password'] = $r_anggota['password'];
            echo "<script>document.getElementById('notification-success').classList.add('show'); setTimeout(function(){ window.location.href = 'anggota.php'; }, 2000);</script>";
        } else {
            echo "<script>document.getElementById('notification-error').classList.add('show'); setTimeout(function(){ window.location.href = 'login.php'; }, 2000);</script>";
        }
    } elseif ($role == 'komisariat') {
        // Cek login komisariat
        $data_komisariat = mysqli_query($koneksi, "SELECT * FROM pengurus_komisariat WHERE email ='$email' AND password ='$password'");
        $r_komisariat = mysqli_fetch_array($data_komisariat);
        if ($r_komisariat) {
            $_SESSION['nama'] = $r_komisariat['nama'];
            $_SESSION['password'] = $r_komisariat['password'];
            echo "<script>document.getElementById('notification-success').classList.add('show'); setTimeout(function(){ window.location.href = 'komisariat.php'; }, 2000);</script>";
        } else {
            echo "<script>document.getElementById('notification-error').classList.add('show'); setTimeout(function(){ window.location.href = 'login.php'; }, 2000);</script>";
        }
    } elseif ($role == 'cabang') {
        // Cek login cabang
        $data_cabang = mysqli_query($koneksi, "SELECT * FROM pengurus_cabang WHERE email ='$email' AND password ='$password'");
        $r_cabang = mysqli_fetch_array($data_cabang);
        if ($r_cabang) {
            $_SESSION['nama'] = $r_cabang['nama'];
            $_SESSION['password'] = $r_cabang['password'];
            echo "<script>document.getElementById('notification-success').classList.add('show'); setTimeout(function(){ window.location.href = 'cabang.php'; }, 2000);</script>";
        } else {
            echo "<script>document.getElementById('notification-error').classList.add('show'); setTimeout(function(){ window.location.href = 'login.php'; }, 2000);</script>";
        }
    }
}
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
