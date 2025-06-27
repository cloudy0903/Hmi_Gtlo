<?php
session_start();

// Cek apakah sesi 'nama' sudah ada
if (isset($_SESSION['nama'])) {
    $nama = $_SESSION['nama'];
} else {
    // Jika belum ada sesi 'nama', arahkan ke halaman login
    header('Location: login.php');
    exit();
}

// Sertakan file koneksi
require_once 'koneksi.php';

// Ambil foto profil dari database
$query = "SELECT foto_profil FROM anggota_hmi WHERE nama = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $nama);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Tentukan jalur foto profil atau gunakan default jika tidak ada
$foto_profil = !empty($user['foto_profil']) ? 'uploads/' . $user['foto_profil'] : 'uploads/default.jpg';

// Bersihkan nama untuk mencegah serangan XSS
$nama_sanitized = htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/cabang.css">
    <title>Dashboard HMI</title>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="profile py-3 text-center">
                <!-- Tampilkan foto profil -->
                <img src="<?php echo $foto_profil; ?>" alt="Foto Profil" class="rounded-circle border border-2" width="100" height="100">
                <strong><span class="d-block mt-2"><?php echo $nama_sanitized; ?></span></strong>
            </div>
            <!-- Sidebar lainnya -->
            <div class="nav-item">
                <button class="btn" onclick="showPublikasi()">
                    <i class="fas fa-newspaper"></i> Publikasi
                </button>
            </div>
            <div class="nav-item">
                <button class="btn" onclick="showBerita()">
                    <i class="fas fa-bullhorn"></i> Berita
                </button>
            </div>
            <div class="nav-item">
                <button class="btn" onclick="showGaleri()">
                    <i class="bi bi-images"></i> Galeri
                </button>
            </div>
            <div class="nav-item">
                <button class="btn" onclick="showKalender()">
                    <i class="fas fa-calendar-alt"></i> Kalender
                </button>
            </div>
            <div class="nav-item">
                <button class="btn" onclick="showPengaturan()">
                    <i class="bi bi-gear"></i> Pengaturan
                </button>
            </div>
            <div class="nav-item">
                <button class="btn" onclick="logout()">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content" id="content">
            <div class="container mt-5">
                <div class="welcome-section text-center mb-5">
                    <h1 class="display-4 mb-3 fw-bold">SELAMAT DATANG DI DASHBOARD ANDA!!!</h1>
                    <img src="image/hmi_mpo_gtlo.png" alt="Tentang Kami Illustration" class="welcome-image rounded img-fluid mx-auto d-block">
                </div>
                <div class="additional-section">
                    <h2 class="text-center mb-4">Apa yang Bisa Anda Lakukan?</h2>
                    <div class="row g-3">
                        <div class="col-md-4 d-flex">
                            <div class="feature flex-grow-1">
                                <i class="fas fa-newspaper fa-3x text-success"></i>
                                <h5 class="mt-3">Publikasi</h5>
                                <p>Tambah, hapus, atau edit karya anda dengan mudah.</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="feature flex-grow-1">
                                <i class="fas fa-bullhorn fa-3x text-success"></i>
                                <h5 class="mt-3">Berita</h5>
                                <p>Lihat dan atur berita acara penting organisasi Anda.</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="feature flex-grow-1">
                                <i class="bi bi-images fa-3x text-success"></i>
                                <h5 class="mt-3">Galeri</h5>
                                <p>Unggah dan kelola foto-foto kegiatan organisasi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showPublikasi() { window.location.href = 'daftar_pengguna.php'; }
        function showBerita() { window.location.href = 'daftar_petugas.php'; }
        function showGaleri() { window.location.href = 'galeri.php'; }
        function showKalender() { window.location.href = 'kalender_cabang.php'; }
        function showPengaturan() { window.location.href = 'pengaturan.php'; }
        function logout() {
            alert('Anda telah keluar dari akun!');
            window.location.href = 'index.php';
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
