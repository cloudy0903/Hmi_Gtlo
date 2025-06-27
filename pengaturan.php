<?php
session_start();

// Pastikan sesi 'email' dan 'nama' ada sebelum menggunakan variabel
if (isset($_SESSION['email']) && isset($_SESSION['nama'])) {
    $nama = $_SESSION['nama'];
    $email = $_SESSION['email'];
} else {
    // Jika sesi tidak ada, arahkan pengguna ke halaman login
    header('Location: login.php');
    exit();
}

// Sertakan file koneksi
require_once 'koneksi.php';

// Proses penggantian nama dan foto profil
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_name'])) {
        $new_name = $_POST['new_name'];
        // Perbarui nama di database
        $query = "UPDATE pengurus_cabang SET nama = ? WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $new_name, $email);
        $stmt->execute();
        $_SESSION['nama'] = $new_name; // Update nama sesi
        $nama = $new_name;
    }

    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $profile_picture = $_FILES['profile_picture'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($profile_picture["name"]);
        
        // Pastikan file yang di-upload adalah gambar
        if (move_uploaded_file($profile_picture["tmp_name"], $target_file)) {
            // Perbarui foto profil di database
            $query = "UPDATE pengurus_cabang SET foto_profil = ? WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $target_file, $email);
            $stmt->execute();
        }
    }
}

// Ambil foto profil dari database
$query = "SELECT foto_profil FROM pengurus_cabang WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$profile_picture = $user['foto_profil'] ?? 'default-profile.jpg';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Pengaturan Profil</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="new_name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="new_name" name="new_name" value="<?php echo htmlspecialchars($nama); ?>" required>
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Foto Profil</label>
                <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
            </div>
            <div class="mb-3">
                <img src="<?php echo $profile_picture; ?>" alt="Foto Profil" class="img-fluid" style="max-width: 150px;">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="update_name">Update Profil</button>
            </div>
        </form>
    </div>
</body>
</html>
