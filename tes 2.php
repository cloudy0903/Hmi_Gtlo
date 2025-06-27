<?php
// Koneksi ke database
require 'koneksi.php';

// Inisialisasi variabel
$error = '';
$success = '';

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $no_tlp = $_POST['no_tlp'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $tabel = $_POST['tabel'] ?? '';

    // Validasi input
    if (empty($nama) || empty($email) || empty($no_tlp) || empty($alamat) || empty($tabel)) {
        $error = 'Semua field wajib diisi!';
    } else {
        // Cek apakah email sudah ada di database
        $queryCheck = "SELECT email FROM $tabel WHERE email = ?";
        $stmtCheck = $conn->prepare($queryCheck);
        $stmtCheck->bind_param("s", $email);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        if ($resultCheck->num_rows > 0) {
            // Jika email sudah ada
            $error = 'Email sudah terdaftar. Gunakan email yang lain.';
        } else {
            // Insert data ke tabel sesuai pilihan
            $queryInsert = "INSERT INTO $tabel (nama, email, no_tlp, alamat) VALUES (?, ?, ?, ?)";
            $stmtInsert = $conn->prepare($queryInsert);
            $stmtInsert->bind_param("ssss", $nama, $email, $no_tlp, $alamat);

            try {
                $stmtInsert->execute();
                $success = 'Data berhasil ditambahkan!';
            } catch (mysqli_sql_exception $e) {
                $error = 'Terjadi kesalahan: ' . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Anggota HMI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #003f21, #00923f);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
        }
        .container {
            background: #fff;
            color: #333;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            padding: 30px;
            margin-top: 50px;
        }
        .btn-primary {
            background-color: #00923f;
            border: none;
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #007b33;
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        h1 {
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #00923f;
        }
        .nav-pills .nav-link.active {
            background-color: #00923f;
            color: #fff;
            border-radius: 20px;
        }
        .form-label {
            font-weight: bold;
        }
        .alert {
            border-radius: 12px;
            font-size: 0.95rem;
        }
        .list-group-item {
            border: none;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }
        .list-group-item:hover {
            background-color: #f0f0f0;
        }
        .list-group-item i {
            color: #00923f;
            margin-right: 10px;
        }
        .nav-pills .nav-link {
            font-size: 1rem;
            font-weight: 500;
            color: #00923f; /* Warna hijau untuk teks tab */
        }
        .nav-pills .nav-link:hover {
            color: #007b33; /* Warna hijau lebih gelap saat hover */
        }
        .form-control:focus {
            border-color: #00923f;
            box-shadow: 0 0 5px rgba(0, 146, 63, 0.5);
        }
        footer {
            text-align: center;
            margin-top: 50px;
            color: #fff;
            font-size: 0.9rem;
        }
        footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
        footer a:hover {
            color: #00ff89;
            text-decoration: underline;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-weight: bold;
            color: #00923f;
        }

        .list-group-item {
            transition: transform 0.2s ease;
        }

        .list-group-item:hover {
            transform: scale(1.05);
            cursor: pointer;
        }

        .btn-group .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1><i class="fas fa-users"></i> Kelola Anggota HMI</h1>

    <div class="tab-content" id="tabContent">
        <!-- Tab: Tambah Anggota -->
        <div class="tab-pane fade show active" id="tambah" role="tabpanel" aria-labelledby="tambah-tab">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                </div>
                <div class="mb-3">
                    <label for="no_tlp" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="Masukkan nomor telepon" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="tabel" class="form-label">Pilih Tabel</label>
                    <select class="form-select" id="tabel" name="tabel" required>
                        <option value="" selected>-- Pilih Tabel --</option>
                        <option value="anggota_hmi">Anggota HMI</option>
                        <option value="pengurus_komisariat">Pengurus Komisariat</option>
                        <option value="pengurus_cabang">Pengurus Cabang</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-50">Tambah Anggota</button>
                    <a href="login.php" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</a>
                    <a href="index.php" class="btn kembali-btn">Kembali</a>
                </div>
            </form>
        </div>
        
    </div>
</div>

<!-- Script JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function editAnggota(id) {
        window.location.href = 'edit_anggota_hmi.php?id=' + id;
    }

    function hapusAnggota(id) {
        if (confirm('Apakah Anda yakin ingin menghapus anggota ini?')) {
            window.location.href = 'hapus.php?id=' + id;
        }
    }
</script>
</body>
</html>
