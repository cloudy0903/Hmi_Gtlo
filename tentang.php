<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - HMI Style</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/tentang.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.8;
        }

        .bg-hmi-green {
            background-color: #007a3d; /* Hijau khas HMI */
        }

        header {
            background: linear-gradient(90deg, #007a3d, #004f2d);
            color: #fff;
        }

        header h1 {
            font-size: 2.5rem;
        }

        header p {
            font-size: 1.2rem;
        }

        section {
            margin-bottom: 2rem;
        }

        .social-icons a {
            font-size: 1.5rem;
            margin: 0 10px;
            color: #fff;
            transition: transform 0.3s ease;
        }

        .social-icons a:hover {
            transform: scale(1.2);
            color: #007a3d;
        }

        footer {
            background-color: #004f2d;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="text-center py-5">
        <h1 class="display-4">Tentang Kami</h1>
        <p class="lead">Menginspirasi generasi untuk membangun peradaban yang berkemajuan</p>
    </header>

    <!-- About Section -->
    <section class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="image/hmi_mpo_gtlo.png" class="img-fluid rounded shadow" alt="Tentang Kami">
            </div>
            <div class="col-md-6">
                <h2 class="mb-4">Siapa Kami?</h2>
                <p>
                    Himpunan Mahasiswa Islam (HMI) adalah organisasi yang bertujuan untuk mencetak generasi muda 
                    yang unggul, berkarakter Islami, dan siap menghadapi tantangan zaman.
                </p>
                <p>
                    Dengan semangat kebersamaan dan komitmen pada nilai-nilai Islam, kami terus berupaya menjadi 
                    bagian dari solusi atas berbagai permasalahan bangsa.
                </p>
            </div>
        </div>
    </section>

    <!-- History Section -->
    <section class="container py-5">
        <h2 class="text-center mb-4">Sejarah HMI</h2>
        <div class="row">
            <div class="col-md-12">
                <p>
                    HMI didirikan pada 5 Februari 1947 di Yogyakarta oleh Lafran Pane dan sejumlah mahasiswa 
                    Islam lainnya. Organisasi ini lahir di tengah perjuangan bangsa Indonesia dalam merebut 
                    dan mempertahankan kemerdekaan. Sejak berdiri, HMI telah menjadi wadah bagi mahasiswa 
                    untuk mengembangkan potensi diri, berdakwah, dan berkontribusi nyata untuk umat dan bangsa.
                </p>
                <p>
                    Peran HMI tidak hanya dalam konteks akademik, tetapi juga dalam pergerakan sosial, politik, 
                    dan budaya. Hingga kini, HMI terus menjadi salah satu organisasi mahasiswa yang terdepan dalam 
                    melahirkan pemimpin-pemimpin muda.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>Ikuti kami di:</p>
            <div class="social-icons">
                <a href="#" class="text-white"><i class="fab fa-facebook-square"></i></a>
                <a href="#" class="text-white"><i class="fab fa-twitter-square"></i></a>
                <a href="#" class="text-white"><i class="fab fa-instagram-square"></i></a>
                <a href="#" class="text-white"><i class="fab fa-youtube-square"></i></a>
            </div>
            <p>&copy; 2024 HMI Cabang Gorontalo. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
