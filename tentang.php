<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - HMI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
        }

        /* HMI Colors */
        .bg-hmi-green {
            background-color: #007a3d; /* Warna hijau khas HMI */
        }

        .text-hmi-green {
            color: #007a3d;
        }

        header {
            background: linear-gradient(90deg, #007a3d, #004f2d);
            color: white;
            padding: 60px 0; /* Adjust padding for a better header spacing */
        }

        h1, h2 {
            font-weight: bold;
        }

        p {
            line-height: 1.8;
        }

        .img-section {
            max-height: 350px;
            object-fit: cover;
        }

        /* Adjusting Section Spacing */
        .section-title {
            margin-bottom: 30px;
        }

        .about-content {
            line-height: 1.6;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            header {
                padding: 40px 0; /* Reduce header padding on smaller screens */
            }

            .img-section {
                max-height: 250px; /* Reduce image height on smaller screens */
            }

            .col-md-6 {
                margin-bottom: 20px; /* Add spacing between columns on smaller screens */
            }
        }

        /* Styling for the Daftar Button */
        .btn-primary {
            background-color: #005f28; 
            display: inline-flex;
            align-items: center;
            padding: 12px 25px; /* Increase padding for better clickable area */
            font-size: 16px; /* Ensure text size is readable */
            font-weight: 600; /* Slightly bolder text */
            border-radius: 30px; /* Rounded corners */
            transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transitions */
            border: none; /* Remove border */
        }

        .btn-primary i {
            font-size: 18px; /* Adjust icon size */
            margin-right: 12px; /* Space between icon and text */
        }

        .btn-primary:hover {
            background-color: #005f28; /* Darker green for hover effect */
            transform: translateY(-2px); /* Slightly lift the button on hover */
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="text-center">
        <h1 class="display-4">Tentang Kami</h1>
        <p class="lead">Menginspirasi generasi untuk membangun peradaban yang berkemajuan</p>
    </header>

    <!-- About Section -->
    <section class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="image/hmi_mpo_gtlo.png" class="img-fluid rounded shadow img-section" alt="Tentang Kami">
            </div>
            <div class="col-md-6">
                <h2 class="mb-4 text-hmi-green section-title">Siapa Kami?</h2>
                <p class="about-content">
                    Himpunan Mahasiswa Islam (HMI) adalah organisasi yang bertujuan untuk mencetak generasi muda 
                    yang unggul, berkarakter Islami, dan siap menghadapi tantangan zaman.
                </p>
                <p class="about-content">
                    Dengan semangat kebersamaan dan komitmen pada nilai-nilai Islam, kami terus berupaya menjadi 
                    bagian dari solusi atas berbagai permasalahan bangsa.
                </p>
                <a href="daftar_hmi.php" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i> Daftar
                </a>
            </div>
        </div>
    </section>

    <!-- History Section -->
    <section class="container py-5">
        <h2 class="text-center mb-4 text-hmi-green section-title">Sejarah HMI</h2>
        <div class="row">
            <div class="col-md-6">
                <p class="about-content">
                    HMI didirikan pada 5 Februari 1947 di Yogyakarta oleh Lafran Pane dan sejumlah mahasiswa 
                    Islam lainnya. Organisasi ini lahir di tengah perjuangan bangsa Indonesia dalam merebut 
                    dan mempertahankan kemerdekaan.
                </p>
            </div>
            <div class="col-md-6">
                <p class="about-content">
                    Peran HMI tidak hanya dalam konteks akademik, tetapi juga dalam pergerakan sosial, politik, 
                    dan budaya. Hingga kini, HMI terus menjadi salah satu organisasi mahasiswa yang terdepan dalam 
                    melahirkan pemimpin-pemimpin muda.
                </p>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
