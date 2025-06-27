<?php
// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hmi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek apakah form disubmit dan data ada dalam $_POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form menggunakan filter_input untuk keamanan
    $nama = filter_input(INPUT_POST, 'nama', );
    $email = filter_input(INPUT_POST, 'email', );
    $no_telp = filter_input(INPUT_POST, 'no_telp', );
    $alamat = filter_input(INPUT_POST, 'alamat', );
    $jurusan = filter_input(INPUT_POST, 'jurusan', );
    $angkatan = filter_input(INPUT_POST, 'angkatan', );

    // Pastikan semua field terisi
    if ($nama && $email && $no_telp && $alamat && $jurusan && $angkatan) {
        // Cek apakah email sudah terdaftar
        $checkEmail = $conn->prepare("SELECT email FROM pendaftaran WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $checkEmail->store_result();

        if ($checkEmail->num_rows > 0) {
            // Email sudah terdaftar
            header("Location: daftar_hmi.php?status=email_terdaftar");
            exit();
        } else {
            // Insert data menggunakan prepared statement
            $stmt = $conn->prepare("INSERT INTO pendaftaran (nama, email, no_telp, alamat, jurusan, angkatan) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssi", $nama, $email, $no_telp, $alamat, $jurusan, $angkatan);

            if ($stmt->execute()) {
                // Berhasil, redirect ke halaman dengan status berhasil
                header("Location: daftar_hmi.php?status=berhasil");
                exit();
            } else {
                // Gagal insert data
                header("Location: daftar_hmi.php?status=gagal");
                exit();
            }
            $stmt->close();
        }
        $checkEmail->close();
    } else {
        // Field tidak lengkap
        header("Location: daftar_hmi.php?status=gagal");
        exit();
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kader HMI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* HMI Colors */
        .bg-hmi-green {
            background-color: #007a3d;
        }

        .text-hmi-green {
            color: #007a3d;
        }

        .form-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        h2 {
            font-weight: bold;
            color: #007a3d;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .btn-primary {
            background-color: #007a3d;
            display: inline-flex;
            align-items: center;
            font-size: 14px;
            font-weight: 600;
            border-radius: 50px;
            padding: 8px 20px;
            transition: background-color 0.3s ease;
            margin-right: 10px;
            border: none;
        }

        .btn-primary i {
            margin-right: 8px;
        }

        .btn-primary:hover {
            background-color: #005f28;
        }

        .btn-reset {
            display: inline-flex;
            align-items: center;
            font-size: 14px;
            font-weight: 600;
            border-radius: 50px;
            padding: 8px 20px;
            background-color: #dc3545;
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-reset i {
            margin-right: 8px;
        }

        .btn-reset:hover {
            background-color: #c82333;
        }

        .btn-secondary {
            background-color: #343a40;
            color: #f8f9fa;
            font-weight: 600;
            font-size: 14px;
            border-radius: 50px;
            padding: 8px 20px;
            transition: background-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #343a40;
        }

        .btn-secondary a {
            color: inherit;
            text-decoration: none;
        }
        .btn-secondary a:hover {
            color: inherit;
        }

        .form-control {
            border-radius: 8px;
            box-shadow: none;
            border: 1px solid #ddd;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #007a3d;
            box-shadow: 0 0 5px rgba(0, 122, 61, 0.2);
        }

        textarea.form-control {
            resize: vertical;
        }

        /* Styling for button container */
        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        /* Toast styles */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            max-width: 350px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2 class="text-center">Pendaftaran Kader HMI</h2>

        <form action="daftar_hmi.php" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" required>
            </div>
            <div class="mb-3">
                <label for="angkatan" class="form-label">Angkatan</label>
                <input type="number" class="form-control" id="angkatan" name="angkatan" required>
            </div>

            <div class="button-container">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-user-plus"></i> Daftar
                </button>
                <button type="reset" class="btn btn-reset">
                    <i class="fa-solid fa-rotate-right"></i> Reset
                </button>
                <button type="button" class="btn btn-secondary">
                    <a href="tentang.php"><i class="fa fa-arrow-left"></i> Kembali </a>
                </button>
            </div>
        </form>
    </div>

    <?php if (isset($_GET['status'])): ?>
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <?php if ($_GET['status'] == 'berhasil'): ?>
                <div id="successToast" class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Pendaftaran berhasil!
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            <?php elseif ($_GET['status'] == 'gagal'): ?>
                <div id="errorToast" class="toast align-items-center text-white bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Pendaftaran gagal, silakan coba lagi.
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            <?php elseif ($_GET['status'] == 'email_terdaftar'): ?>
                <div id="emailToast" class="toast align-items-center text-white bg-warning border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Email sudah terdaftar, Gunakan Email lain.
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toast auto-hide after 3 seconds
        const toastElList = [].slice.call(document.querySelectorAll('.toast'))
        const toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl, { delay: 3000 });
        });
        toastList.forEach(toast => toast.show());
    </script>
</body>
</html>