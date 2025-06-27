<?php
require 'koneksi.php';

// Pastikan id ada di URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Escape id untuk keamanan
    $id = $conn->real_escape_string($id);

    // Ambil data berdasarkan id
    $result = $conn->query("SELECT * FROM struktur_pengurus WHERE id = '$id'");

    // Pastikan hasil query ada
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        // Jika data tidak ditemukan, beri peringatan atau redirect
        die('Data tidak ditemukan');
    }

} 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    
    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto'];
        $fotoPath = 'uploads/' . basename($foto['name']);
        move_uploaded_file($foto['tmp_name'], $fotoPath);
        $fotoSql = ", foto = '" . basename($foto['name']) . "'";
    } else {
        $fotoSql = ''; // Tidak ada perubahan foto
    }

    // Pastikan query update selalu memiliki kolom yang benar
    $sql = "UPDATE struktur_pengurus SET 
            nama = '$nama', jabatan = '$jabatan',  $fotoSql WHERE id = '$id'";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" value="<?= isset($row['nama']) ? $row['nama'] : '' ?>" required>
    </div>
    <div class="mb-3">
        <label for="jabatan" class="form-label">Jabatan</label>
        <input type="text" class="form-control" name="jabatan" value="<?= isset($row['jabatan']) ? $row['jabatan'] : '' ?>" required>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" name="foto">
        <small>Biarkan kosong jika tidak ingin mengganti.</small>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
