<?php
session_start();
include 'koneksi.php';

// Proses penghapusan jika parameter 'hapus' dan 'id' ada di URL
if (isset($_GET['hapus']) && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data pengguna berdasarkan ID
    $query = "DELETE FROM anggota_hmi WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect setelah penghapusan berhasil
        echo "<script>
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data berhasil dihapus.',
                    icon: 'success',
                    confirmButtonColor: '#28a745',
                }).then(() => {
                    window.location.href = 'kelola_anggota_hmi.php';  // Redirect kembali ke daftar
                });
              </script>";
    } else {
        // Jika ada masalah saat menghapus data
        echo "<script>
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Terjadi masalah saat menghapus data.',
                    icon: 'error',
                    confirmButtonColor: '#dc3545',
                });
              </script>";
    }
}
?>

<!doctype html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HMI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/k_anggota.css">
    <link rel="shortcut icon" type="image" href="img/sekolah.png">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        header {
            background: #007a3d;
            padding: 15px;
            color: white;
            font-size: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .project_area {
            margin: 30px auto;
            padding: 25px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
        }

        .tulisan_input2 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #007a3d;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        table th, table td {
            border: 1px solid #dddddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #007a3d;
            color: white;
        }

        table tbody tr:hover {
            background-color: #f1f5fa;
        }

        /* Styling tombol edit dan hapus */
.btn {
    font-size: 14px;
    padding: 8px 16px;
    border-radius: 5px;
    transition: all 0.3s ease;
    display: inline-block;  /* Memastikan tombol sejajar */
    width: 120px; /* Menyamaratakan lebar kedua tombol */
    text-align: center; /* Menyelaraskan teks di tengah tombol */
}

/* Tombol Edit */
.btn-edit {
    background-color: #007a3d;
    color: white;
}

.btn-edit:hover {
    background-color: #006a32;
}

/* Tombol Hapus */
.btn-hapus {
    background-color: #dc3545;
    color: white;
}

.btn-hapus:hover {
    background-color: #c82333;
}

/* Mengatur icon agar lebih terlihat */
.btn i {
    margin-right: 5px; /* Memberikan jarak antara ikon dan teks */
}

/* Responsif untuk perangkat mobile */
@media (max-width: 768px) {
    .btn {
        font-size: 12px;
        padding: 6px 12px;
        width: 100px; /* Mengurangi ukuran tombol pada perangkat kecil */
    }
}


        .form-search {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 20px;
        }

        .form-search input {
            width: 200px;
            padding: 10px;
            border-radius: 5px;
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-item.active .page-link {
            background-color: #007a3d;
            border-color: #007a3d;
        }

        .btn-primary {
            background-color: #007a3d;
            border-color: #007a3d;
        }

        .btn-back {
            margin: 20px 0;
            background-color: white;
            color: #007a3d;
            border-radius: 30px;
            padding: 10px 15px;
            font-size: 16px;
            font-weight: bold;
            border: none;
        }

        .btn-back:hover {
            background-color: #fff;
            color: #007a3d;
        }

        @media (max-width: 768px) {
            .project_area {
                margin: 20px;
                padding: 15px;
            }

            .btn {
                font-size: 12px;
            }

            .form-search input {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>

    <header>
        <a href="kelola_hmi.php" class="btn btn-back">&larr; Kembali</a>
    </header>

    <div class="project_area">
        <p class="tulisan_input2">DAFTAR ANGGOTA HMI</p>

        <div class="d-flex justify-content-between mb-3">
            <div>
                <a class="btn btn-dark" href="cetak_anggota_hmi.php" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                <a class="btn btn-dark" href="tambah_anggota_hmi.php"><i class="fa fa-user-plus"></i> Tambah</a>
            </div>
            <form method="POST" action="" class="form-search">
                <input type="text" name="cr" class="form-control" placeholder="Cari pengguna..." value="<?php echo isset($_POST['cr']) ? $_POST['cr'] : ''; ?>">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
            </form>
        </div>

            <?php
$batas = 10;
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
$posisi = ($halaman - 1) * $batas;
$cari = isset($_POST['cr']) ? $_POST['cr'] : '';
$query = $cari ? mysqli_query($conn, "SELECT * FROM anggota_hmi WHERE nama LIKE '%$cari%' OR email LIKE '%$cari%'")
    : mysqli_query($conn, "SELECT * FROM anggota_hmi LIMIT $posisi, $batas");
$no = 1 + $posisi;
?>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Jenis Kelamin</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $foto = $row['foto_profil'] ? htmlspecialchars($row['foto_profil']) : 'foto_tidak_tersedia.png';
                    echo "<tr>
                        <td>" . htmlspecialchars($no++) . "</td>
                        <td>" . htmlspecialchars($row['nama']) . "</td>
                        <td>" . htmlspecialchars($row['email']) . "</td>
                        <td>" . htmlspecialchars($row['password']) . "</td>
                        <td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>
                        <td>" . htmlspecialchars($row['no_tlp']) . "</td>
                        <td>" . htmlspecialchars($row['alamat']) . "</td>
                        <td>
                            <img src='uploads/{$foto}' alt='Foto' style='width: 50px; height: 50px; border-radius: 50%; object-fit: cover; cursor: pointer;' data-bs-toggle='modal' data-bs-target='#fotoModal' onclick=\"showImage('uploads/{$foto}')\">
                        </td>
                        <td>
                            <a class='btn btn-edit' href='edit_anggota_hmi.php?id={$row['id']}'><i class='fas fa-pencil-alt'></i> Edit</a>
                            <a href='#' class='btn btn-hapus' onclick='return hapusPengguna(event, {$row['id']})'><i class='fa fa-trash'></i> Hapus</a>
                        </td>
                    </tr>";
                }
            } else {
                echo '<tr><td colspan="9" class="text-center">Tidak ada data</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Modal Bootstrap untuk menampilkan gambar besar -->
<div class="modal fade" id="fotoModal" tabindex="-1" aria-labelledby="fotoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Foto Besar" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<?php
$totalData = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM anggota_hmi"));
$totalHalaman = ceil($totalData / $batas);
?>
<nav>
    <ul class="pagination">
        <?php for ($i = 1; $i <= $totalHalaman; $i++) : ?>
            <li class="page-item <?= ($i == $halaman) ? 'active' : '' ?>">
                <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>

<script>
    // Fungsi untuk memperbesar gambar
    function showImage(src) {
        document.getElementById('modalImage').src = src;
    }

    // Fungsi untuk menghapus pengguna dengan SweetAlert2
    function hapusPengguna(event, id) {
        event.preventDefault(); // Mencegah pengalihan halaman

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Tindakan ini tidak bisa dibatalkan!",
            icon: 'warning',
            background: '#e9f7ef', // Latar belakang hijau muda
            color: '#007a3d', // Teks hijau khas HMI
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#007a3d', // Tombol Hapus hijau
            cancelButtonColor: '#6c757d', // Tombol Batal abu-abu
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'kelola_anggota_hmi.php?hapus=true&id=' + id; // Arahkan ke halaman penghapusan
            }
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
