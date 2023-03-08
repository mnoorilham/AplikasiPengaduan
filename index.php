<!DOCTYPE html>
<html>
  <!-- Header -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi Pengaduan Masyarakat</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-warning">
  <div class="container">
    <a class="navbar-brand" href="index.php">Aplikasi Pengaduan Masyarakat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="main_navbar">
      <ul class="navbar-nav">
        <li class="nav-item">
         	<a class="nav-link" href="index.php?page=registrasi">Daftar Akun</a>
        </li>
         <li class="nav-item">
         	<a class="nav-link" href="index.php?page=login">Login</a>
        </li>
    </div>
  </div>
</nav>

<!--Untuk Switch Halaman-->
<?php 
  if (isset($_GET['page'])) {
    $page= $_GET['page'];
    switch ($page) {
      case 'login':
        include 'login.php';
        break;
        case 'registrasi':
        include 'registrasi.php';
        break;
      
      default:
        echo "Halaman tidak tersedia";
        break;
    }
  } else {
    include 'home.php';
  }
 ?>
<!-- Footer -->
<footer class="footer py-2 bg-light fixed-bottom">
	<div class="container">
		<p class="text-center">UKK RPL 2023 | Nama Peserta | SMK Muhammadiyah 1 Sangatta</p>
	</div>
</footer>
 

  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>