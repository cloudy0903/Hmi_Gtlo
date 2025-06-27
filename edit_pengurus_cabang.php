<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['nama'])) {
    header("location: index.php");
    exit();
}

$id = $_GET['id'];  // Ambil ID anggota dari URL

// Query untuk mengambil data anggota berdasarkan ID
$query = "SELECT * FROM pengurus_cabang WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    $data = mysqli_fetch_assoc($result);  // Mengambil data anggota
} else {
    echo "<div class='alert alert-danger text-center'>Error: " . mysqli_error($conn) . "</div>";
    exit();
}

// Pastikan $data memiliki nilai
if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $jenis_kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $no_tlp = mysqli_real_escape_string($conn, $_POST['no_tlp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    
    // Memeriksa apakah foto profil diubah
    if ($_FILES['file']['name'] != "") {
        $foto_profil = $_FILES['file']['name'];
        $target_dir = "uploads/";  // Tentukan folder penyimpanan
        $target_file = $target_dir . basename($foto_profil);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi ekstensi file
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowed_extensions)) {
            echo "<div class='alert alert-danger text-center'><i class='fas fa-times-circle'></i> Hanya file gambar yang diizinkan (jpg, jpeg, png, gif).</div>";
        } else {
            // Proses upload foto
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                // Query untuk memperbarui data anggota
                $query = "UPDATE pengurus_cabang SET 
                          nama = '$nama', 
                          email = '$email', 
                          password = '$password', 
                          jenis_kelamin = '$jenis_kelamin', 
                          no_tlp = '$no_tlp', 
                          alamat = '$alamat', 
                          foto_profil = '$foto_profil' 
                          WHERE id = '$id'";
                if (mysqli_query($conn, $query)) {
                    echo "<div class='alert alert-success text-center'><i class='fas fa-check-circle'></i> Update Anggota Berhasil</div>";
                    echo "<meta http-equiv='refresh' content='1;url=kelola_pengurus_cabang.php'>";
                } else {
                    echo "<div class='alert alert-danger text-center'><i class='fas fa-times-circle'></i> Update Anggota Gagal: " . mysqli_error($conn) . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger text-center'><i class='fas fa-times-circle'></i> Gagal mengunggah foto.</div>";
            }
        }
    } else {
        // Jika foto tidak diubah, update tanpa mengganti foto
        $query = "UPDATE pengurus_cabang SET 
                  nama = '$nama', 
                  email = '$email', 
                  password = '$password', 
                  jenis_kelamin = '$jenis_kelamin', 
                  no_tlp = '$no_tlp', 
                  alamat = '$alamat' 
                  WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            echo "<div class='alert alert-success text-center'><i class='fas fa-check-circle'></i> Update Anggota Berhasil</div>";
            echo "<meta http-equiv='refresh' content='1;url=kelola_pengurus_cabang.php'>";
        } else {
            echo "<div class='alert alert-danger text-center'><i class='fas fa-times-circle'></i> Update Anggota Gagal: " . mysqli_error($conn) . "</div>";
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota HMI</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
        <h4 class="tulisan_input2">EDIT PENGURUS CABANG HMI</h4>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="<?php echo $data['email']; ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" value="<?php echo $data['password']; ?>" required>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki" <?php echo ($data['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php echo ($data['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="no_tlp">No Telepon</label>
                <input type="text" name="no_tlp" id="no_tlp" class="form-control" value="<?php echo $data['no_tlp']; ?>" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
            </div>

            <div class="form-group">
                <label for="file">Foto</label>
                <input type="file" name="file" id="file" class="form-control">
                <img src="uploads/<?php echo $data['foto_profil']; ?>" alt="Foto Profil" width="100">
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary" name="update">
                    <i class="fas fa-user-plus"></i> Update
                </button>
                <button type="reset" class="btn btn-danger">
                    <i class="fas fa-redo-alt"></i> Reset
                </button>
                <a href="kelola_pengurus_cabang.php" class="btn btn-warning">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
