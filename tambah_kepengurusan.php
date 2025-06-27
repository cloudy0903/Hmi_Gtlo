<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $foto = $_FILES['foto'];

    $fotoPath = 'uploads/' . basename($foto['name']);
    move_uploaded_file($foto['tmp_name'], $fotoPath);

    $sql = "INSERT INTO struktur_pengurus (nama, jabatan, foto, sosial_media) 
            VALUES ('$nama', '$jabatan', '" . basename($foto['name']) . "', '$sosial_media')";
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
        <input type="text" class="form-control" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="jabatan" class="form-label">Jabatan</label>
        <input type="text" class="form-control" name="jabatan" required>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" name="foto" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
