<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Angsuran Mobil</title>
    <!-- Import Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Import Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        @media (max-width: 768px) {
            .container div.position-absolute {
                padding-left: 10%; /* Lebih kecil pada layar tablet */
                max-width: 90%;
            }
        }
        @media (max-width: 576px) {
            .container div.position-absolute {
                padding-left: 10%; /* Lebih kecil pada layar ponsel */
                max-width: 100%;
            }
        }
    </style>
    
</head>


<body style="font-family: 'Poppins', sans-serif;">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success p-4 fixed-top">
  <div class="container">
      <a class="navbar-brand fw-bold" href="/">
          <img src="{{ asset('images/logo.svg') }}" alt="Logo Bahagia" width="30" height="30" class="d-inline-block align-text-top">
          Tesla
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link text-white" href="#">Beranda</a></li>
              <li class="nav-item"><a class="nav-link text-white" href="#">Tentang Perusahaan</a></li>
              <li class="nav-item"><a class="nav-link text-white" href="#">Kontak Perusahaan</a></li>
          </ul>
      </div>
  </div>
</nav>

<!-- Header / Slider -->
<div class="container-fluid p-0">
    <div class="position-relative d-flex align-items-center" style="height: 70vh;">
        <img src="{{ asset('images/slider.jpg') }}" class="img-fluid w-100 h-100" alt="Slider Image" style="object-fit: cover;">
        <div class="position-absolute w-100 h-100" style="top: 0; left: 0; background-color: rgba(8, 111, 8, 0.4);"></div>
        <div class="container text-white position-absolute d-flex flex-column justify-content-center align-items-start" style="top: 0; height: 100%; padding-left: 10%; max-width: 600px;">
          <h1>Lorem Ipsum</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, exercitationem! Quia laborum excepturi nostrum odit veritatis porro voluptates aliquid neque voluptatum quidem mollitia, ducimus voluptatibus velit, quae libero et eaque itaque debitis pariatur? Libero nihil, odit suscipit dolorem similique mollitia beatae nesciunt voluptatum velit maxime! Quae quaerat rerum ipsum optio?</p>
        </div>
    </div>
  </div>
  
  

<!-- Form Input -->
<div class="container my-5">
    <h3 class="text-center">Kalkulator Kredit Mobil</h3>
    <form method="POST" action="{{ route('calculate') }}" class="p-4">
        @csrf
        <div class="mb-3">
            <label for="hargaMobil" class="form-label">Harga Mobil</label>
            <input type="number" name="harga_mobil" id="hargaMobil" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="dp" class="form-label">DP (%)</label>
            <input type="number" name="dp" id="dp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tenor" class="form-label">Tenor (Tahun)</label>
            <input type="number" name="tenor" id="tenor" class="form-control" required>
        </div>
        <div class="justify-content-end d-flex"> <button type="submit" class="btn btn-success justify-content-end px-5">Hitung</button></div>
    </form>
</div>

<!-- Hasil Perhitungan -->
<div class="container my-4">
    @if(isset($harga_mobil))
        <h4>Hasil Perhitungan</h4>
        <ul class="list-group">
            <li class="list-group-item">Harga Mobil: Rp. {{ number_format($harga_mobil, 2, ',', '.') }}</li>
            <li class="list-group-item">DP: {{ $dp_percent }}% (Rp. {{ number_format($dp, 2, ',', '.') }})</li>
            <li class="list-group-item">Tenor: {{ $tenor }} Tahun ({{ $jumlah_bulan }} Bulan)</li>
            <li class="list-group-item">Bunga: 20% (Rp. {{ number_format($bunga, 2, ',', '.') }})</li>
            <li class="list-group-item">Jumlah Angsuran: Rp. {{ number_format($angsuran_per_bulan, 2, ',', '.') }} / Bulan</li>
        </ul>
    @endif
</div>

<!-- Footer -->
<footer class="bg-success text-white pt-5 pb-5">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <h5 class=" fw-bold">Tesla</h5>
              <p>Perusahaan kami berfokus pada menyediakan layanan terbaik di industri otomotif, dengan komitmen terhadap kualitas dan kepuasan pelanggan.</p>
              
              <h6 class=" fw-bold mt-3">Kontak</h6>
              <p>Alamat: Jalan Veteran, No 25, Kota Malang</p>
              <p>Email: tesla@gmail.com</p>
              <p>Telepon: +6281234567890</p>
          </div>

          <div class="col-md-6 d-flex align-items-start justify-content-md-end">
              <div>
                  <h6 class=" fw-bold mb-2">Ikuti Kami</h6>
                  <a href="#" class="text-white me-3" style="text-decoration: none;">
                      <img src="{{ asset('images/instagram.svg') }}" alt="Instagram" width="24" height="24">
                  </a>
                  <a href="#" class="text-white me-3" style="text-decoration: none;">
                      <img src="{{ asset('images/tiktok.svg') }}" alt="TikTok" width="24" height="24">
                  </a>
                  <a href="#" class="text-white" style="text-decoration: none;">
                      <img src="{{ asset('images/youtube.svg') }}" alt="YouTube" width="24" height="24">
                  </a>
              </div>
          </div>
      </div>

      <hr class="my-3">

      <!-- Footer Bottom -->
      <div class="row">
          <div class="col text-center">
              <p class="mb-0">© 2024 Tesla. All rights reserved.</p>
          </div>
      </div>
  </div>
</footer>

<!-- JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
