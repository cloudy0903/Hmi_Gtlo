<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website HMI Cabang Gorontalo</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    /* General Styles */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
    }

    /* Navbar Styles */
    .navbar {
      background-color: #007a3d;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand img {
      width: 50px;
      margin-right: 10px;
    }

    .navbar-nav .nav-link {
      color: white !important;
      font-weight: 600;
      
      transition: transform 0.3s ease, color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
      transform: scale(1.1);
      color: #f8f9fa;
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(135deg, #007a3d, #004d2f);
      color: white;
      text-align: center;
      padding: 100px 0;
      border-bottom: 5px solid #004d2f;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .hero h1 {
      font-size: 3.5rem;
      font-weight: 800;
      text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3);
      margin-bottom: 20px;
    }

    .hero h2 {
      font-size: 2rem;
      font-weight: 600;
      margin-top: 20px;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
    }

    .hero p {
      font-size: 1.2rem;
      margin-top: 20px;
      text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
      margin-bottom: 30px;
    }

    .hero .btn-primary {
      background-color: #004d2f;
      color: white;
      padding: 12px 40px;
      font-size: 1.1rem;
      font-weight: 600;
      border: none;
      margin-top: 20px;
      transition: background-color 0.3s ease, transform 0.3s ease;
      border-radius: 30px;
    }

    .hero .btn-primary:hover {
      background-color: #007a3d;
      transform: scale(1.05);
    }

    /* Footer Styles */
    footer {
      background-color: #1a1a1a;
      color: #fff;
      padding: 30px 0;
      text-align: center;
      box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.1);
    }

    footer a {
      color: #fff;
      transition: color 0.3s ease;
      margin: 0 12px;
    }

    footer a:hover {
      color: #007a3d;
    }

    footer .social-icons i {
      font-size: 1.8rem;
      transition: transform 0.3s ease;
    }

    footer .social-icons i:hover {
      transform: scale(1.1);
    }

    /* Media Queries for Mobile Responsiveness */
    @media (max-width: 768px) {
      .hero h1 {
        font-size: 2.5rem;
      }

      .hero h2 {
        font-size: 1.8rem;
      }

      .hero p {
        font-size: 1.1rem;
      }

      .hero .btn-primary {
        font-size: 1rem;
        padding: 10px 30px;
      }

      .navbar-nav .nav-link {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>
  <!-- Navbar Section -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="image/hmi_mpo_gtlo.png" alt="HMI Logo">
        <span class="ms-2">HIMPUNAN MAHASISWA ISLAM</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-home"></i> Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-users"></i> Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-newspaper"></i> Publikasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-bullhorn"></i> Berita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-image"></i> Galeri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-users-cog"></i> Struktur Kepengurusan</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h1>Website HMI Cabang Gorontalo</h1>
      <h2>Selamat datang di HMI Gorontalo</h2>
      <p>Website ini menjadi sarana publikasi, informasi, dan silaturahmi bagi seluruh anggota dan masyarakat.</p>
      <a href="#" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</a>
    </div>
  </section>

  <!-- Footer Section -->
  <footer>
    <div class="container">
      <p>Follow us on:</p>
      <div class="social-icons">
        <a href="#" class="text-white"><i class="fab fa-facebook-square"></i></a>
        <a href="#" class="text-white"><i class="fab fa-twitter-square"></i></a>
        <a href="#" class="text-white"><i class="fab fa-instagram-square"></i></a>
        <a href="#" class="text-white"><i class="fab fa-youtube-square"></i></a>
      </div>
      <p>© 2024 HMI Cabang Gorontalo. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <!-- Custom JS to manage active state -->
   <script>
    // Select all nav links
    const navLinks = document.querySelectorAll('.nav-link');
    
    // Add event listener to each nav link
    navLinks.forEach(link => {
      link.addEventListener('click', function () {
        // Remove 'active' class from all links
        navLinks.forEach(nav => nav.classList.remove('active'));
        // Add 'active' class to the clicked link
        this.classList.add('active');
      });
    });
  </script>
</body>
</html>
