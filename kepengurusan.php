<?php
require 'koneksi.php';

// Ambil data pengurus dari database
$sql = "SELECT * FROM struktur_pengurus";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Struktur Pengurus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Admin Panel - Struktur Pengurus</h1>
        <a href="?action=add" class="btn btn-primary mb-3">Tambah Pengurus</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Foto</th>
                    <th>Media Sosial</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['jabatan'] ?></td>
                        <td><img src="uploads/<?= $row['foto'] ?>" alt="Foto" width="100"></td>
                        <td>
                            <?php
                            $sosial_media = json_decode($row['sosial_media'], true);
                            foreach ($sosial_media as $platform => $url) {
                                echo "<a href='$url' target='_blank'>$platform</a> ";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="?action=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="?action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php
    // Tambah
    if (isset($_GET['action']) && $_GET['action'] === 'add') {
        include 'tambah_kepengurusan.php';
    }

    // Edit
    if (isset($_GET['action']) && $_GET['action'] === 'edit') {
        include 'edit_kepengurusan.php';
    }

    // Hapus
    if (isset($_GET['action']) && $_GET['action'] === 'delete') {
        $id = $_GET['id'];
        $conn->query("DELETE FROM struktur_pengurus WHERE id = $id");
        header('Location: index.php');
    }
    ?>
    
</body>
</html>
