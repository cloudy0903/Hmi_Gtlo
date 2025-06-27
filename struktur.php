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
    <title>Struktur Organisasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card img {
            border-radius: 12px 12px 0 0;
            height: 250px;
            object-fit: cover;
        }
        .social-icons a {
            margin-right: 10px;
            color: #6c757d;
            transition: color 0.3s ease;
        }
        .social-icons a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Struktur Organisasi</h1>
        <div class="row g-4">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="uploads/<?= $row['foto'] ?>" alt="<?= $row['nama'] ?>" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $row['nama'] ?></h5>
                            <p class="text-muted"><?= $row['jabatan'] ?></p>
                            <div class="social-icons">
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
