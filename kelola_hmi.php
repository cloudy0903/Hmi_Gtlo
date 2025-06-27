<?php
// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'hmi';

$conn = new mysqli($host, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan total
$total_anggota = $conn->query("SELECT COUNT(*) AS total FROM anggota_hmi")->fetch_assoc()['total'];
$total_komisariat = $conn->query("SELECT COUNT(*) AS total FROM pengurus_komisariat")->fetch_assoc()['total'];
$total_cabang = $conn->query("SELECT COUNT(*) AS total FROM pengurus_cabang")->fetch_assoc()['total'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard HMI</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #007a3d;
            color: #fff;
        }
        .navbar {
            background-color: white;
        }
        .navbar-brand, .nav-link {
            color: #007a3d !important;
        }
        .nav-link {
            text-align: center;
            width: 100%;
            font-weight: bold;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 20px 0;
            background-color: #ffffff;
            color:  #007a3d ;
        }
        .card-header {
            background-color: #000000;
            color: #fff;
            font-weight: bold;
        }
        .card-body h1 {
            font-size: 3rem;
            color:  #007a3d ;
        }
        .logo-hmi {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }
        .btn-back {
            margin: 20px 0;
            background-color:  #007a3d;
            color: #fff;
            border-radius: 30px;
            padding: 10px 15px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            transition: all 0.3s ease-in-out;
        }
        .btn-back:hover {
            background-color: #007a3d;
            color: #ffffff;
            transform: scale(1.05);
        }
        .informasi-card {
            background-color: #f8f9fa;
            color: #000;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a href="cabang.php" class="btn btn-back">&larr; Kembali</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="kelola_anggota_hmi.php">Anggota HMI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kelola_pengurus_komisariat.php">Pengurus Komisariat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kelola_pengurus_cabang.php">Pengurus Cabang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="text-center my-4">
        <img src="image/hmi_mpo_gtlo.png" alt="Logo HMI" class="logo-hmi">
        <h1>HIMPUNAN MAHASISWA ISLAM</h1>
        <p>Selamat datang di sistem informasi HMI</p>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">Anggota HMI</div>
                    <div class="card-body">
                        <h1><?php echo $total_anggota; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">Pengurus Komisariat</div>
                    <div class="card-body">
                        <h1><?php echo $total_komisariat; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">Pengurus Cabang</div>
                    <div class="card-body">
                        <h1><?php echo $total_cabang; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card informasi-card">
                   
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
