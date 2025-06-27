<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['nama'])) {
    header("location: index.php");
    exit();
}

if (isset($_POST['simpan'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $user = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $jenis_kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $no_tlp = mysqli_real_escape_string($conn, $_POST['no_tlp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    
    // Mengambil informasi file yang di-upload
    $foto_profil = $_FILES['file']['name'];
    $target_dir = "uploads/"; // Tentukan folder penyimpanan
    $target_file = $target_dir . basename($foto_profil);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi ekstensi file
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_extensions)) {
        echo "<div class='alert alert-danger text-center'><i class='fas fa-times-circle'></i> Hanya file gambar yang diizinkan (jpg, jpeg, png, gif).</div>";
    } else {
        // Proses upload file
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            // Menyimpan data pengguna ke database
            $query = "INSERT INTO anggota_hmi (nama, email, password, jenis_kelamin, no_tlp, alamat, foto_profil) 
                      VALUES ('$nama', '$user', '$pass', '$jenis_kelamin', '$no_tlp', '$alamat', '$foto_profil')";

            if (mysqli_query($conn, $query)) {
                echo "<div class='alert alert-success text-center'><i class='fas fa-check-circle'></i> Tambah User Berhasil</div>";
                echo "<meta http-equiv='refresh' content='1;url=kelola_anggota_hmi.php'>";
            } else {
                echo "<div class='alert alert-danger text-center'><i class='fas fa-times-circle'></i> Tambah User Gagal: " . mysqli_error($conn) . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center'><i class='fas fa-times-circle'></i> Gagal mengunggah foto.</div>";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUKU TAMU</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/tambah_pengguna.css">
    <link rel="shortcut icon" type="image" href="img/sekolah.png">

    <style>
        body {
            background-color: white;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 750px;
            margin-top: 20px;
        }

        .tulisan_input2 {
            text-align: center;
            font-size: 28px;
            color: #007a3d; /* Hijau HMI */
            font-weight: bold;
            margin-bottom: 30px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 8px;
            box-shadow: none;
            border: 1px solid #ddd;
            margin-bottom: 15px;
        }

        .form-control:focus {
            border-color: #007a3d; /* Hijau HMI */
            box-shadow: 0 0 5px rgba(0, 122, 61, 0.5);
        }

        .btn-primary {
            background-color: #007a3d;
            border-color: #007a3d;
            color: white;
            width: 160px;
            font-weight: bold;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #006a32;
            border-color: #006a32;
        }

        .btn-danger {
            background-color: #f44336;
            border-color: #f44336;
            color: white;
            width: 160px;
            margin-top: 20px;
        }

        .btn-danger:hover {
            background-color: #d32f2f;
            border-color: #d32f2f;
        }

        .btn-warning {
            background-color: #ff9800;
            border-color: #ff9800;
            color: white;
            width: 160px;
            margin-top: 20px;
        }

        .btn-warning:hover {
            background-color: #f57c00;
            border-color: #f57c00;
        }

        .alert {
            font-size: 16px;
            margin-top: 20px;
            text-align: center;
        }

        .form-group {
            color: #007a3d;
        }
    </style>
</head>

<body>

    <div class="container">
        <h4 class="tulisan_input2">TAMBAH ANGGOTA HMI</h4>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_petugas">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required placeholder="Nama">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" required placeholder="Email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required placeholder="Password">
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="" disabled selected>--Pilih--</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="no_tlp">No Telepon</label>
                <input type="text" name="no_tlp" id="no_tlp" class="form-control" required placeholder="+62...">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" required placeholder="Alamat">
            </div>

            <div class="form-group">
                <label for="file">Foto</label>
                <input type="file" name="file" id="file" class="form-control" required>
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary" name="simpan">
                    <i class="fas fa-user-plus"></i> Tambah
                </button>
                <button type="reset" class="btn btn-danger">
                    <i class="fas fa-redo-alt"></i> Reset
                </button>
                <a href="kelola_anggota_hmi.php" class="btn btn-warning">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
