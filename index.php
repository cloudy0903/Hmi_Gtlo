<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HMI Cabang Gorontalo</title>
  <link rel="stylesheet" href="css/index.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="shortcut icon" type="image" href="image/hmi_mpo_gtlo.png">
  <style>
    /* Navbar Styling */
.navbar {
  background: linear-gradient(90deg, #007a3d,#007a3d);
}
.navbar-brand img {
  height: 50px;
}
.navbar-brand strong {
  color: white;
  font-size: 18px;
  font-weight: bold;
}
.navbar-nav .nav-link {
  color: white;
  font-weight: 500;
  margin: auto s;
  transition: color 0.3s ease;
}
.navbar-nav .nav-link:hover {
  color: #d4d4d4;
}

/* Fullscreen Hero Section Styling */
.hero {
  background: linear-gradient(to bottom right,#d4d4d4,#007a3d,  #d4d4d4 );
  color: white;
  text-align: center;
  height: 70vh; /* Full viewport height */
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.hero h1 {
  font-size: 1rem;
  font-weight: bold;
  text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
}
.hero h2 {
  font-size: 2rem;
  margin-bottom: 20px;
  text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
}
.hero p {
  font-size: 1.2rem;
  margin-bottom: 30px;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
}
.hero .btn-primary {
  background: white;
  border: none;
  color: #007a3d;
  font-weight: bold;
  padding: 10px 20px;
  border-radius: 25px;
  transition: transform 0.3s ease, background-color 0.3s ease;
}
.hero .btn-primary:hover {
  background: white;
  transform: scale(1.1);
  color: #007a3d;
}

/* Footer Styling */
footer {
  background-color: #1a1a1a;
  color: #fff;
  padding: 20px 0;
  text-align: center;
  box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.1);
}
footer p {
  margin: 5px 0;
  font-size: 14px;
}
footer .social-icons a {
  font-size: 24px;
  margin: 0 10px;
  color: white;
  transition: color 0.3s ease, transform 0.3s ease;
}
footer .social-icons a:hover {
  color: #d4d4d4;
  transform: scale(1.1);
}

/* Responsive Adjustments */
@media (max-width: 768px) {
  .hero h1 {
    font-size: 2.5rem;
  }
  .hero h2 {
    font-size: 1.8rem;
  }
  .hero p {
    font-size: 1rem;
  }
  .navbar-brand strong {
    font-size: 16px;
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
        <strong><span class="ms-2">HIMPUNAN MAHASISWA ISLAM</span></strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-home"></i> Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="tentang.php"><i class="fas fa-users"></i> Tentang Kami</a></li>
          <li class="nav-item"><a class="nav-link" href="publikasi.php"><i class="fas fa-newspaper"></i> Publikasi</a></li>
          <li class="nav-item"><a class="nav-link" href="berita.php"><i class="fas fa-bullhorn"></i> Berita</a></li>
          <li class="nav-item"><a class="nav-link" href="galeri.php"><i class="fas fa-image"></i> Galeri</a></li>
          <li class="nav-item"><a class="nav-link" href="struktur.php"><i class="fas fa-users-cog"></i> Struktur Kepengurusan</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h1>Website HMI Cabang Gorontalo</h1>
      <h2>Selamat datang di HMI Gorontalo</h2>
      <p>Website ini menjadi sarana publikasi, informasi, dan silaturahmi bagi seluruh anggota HMI cabang Gorontalo.</p>
      <a href="login.php" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</a>
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
</body>
</html>
