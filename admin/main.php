<!-- Tampilan Utama Halaman Admin -->
<?php
include '../config/koneksi.php';
$masyarakat = mysqli_query($koneksi, "SELECT * FROM tbl_masyarakat");
$jmlh_masyarakat = mysqli_num_rows($masyarakat);

$pengaduan = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan");
$jmlh_pengaduan = mysqli_num_rows($pengaduan);

$tanggapan = mysqli_query($koneksi, "SELECT * FROM tbl_tanggapan");
$jmlh_tanggapan = mysqli_num_rows($tanggapan);

$petugas = mysqli_query($koneksi, "SELECT * FROM tbl_petugas");
$jmlh_petugas = mysqli_num_rows($petugas);
?>
<div class="container mt-4" >
    
    <div class="row mt-3">
        <div class="col-md-3 mt-1">
            <div class="container">
                <div class=""><h4 class="mt-3">Dashboard Administrator</h4></div>
                <div class="">Selamat Datang, <?php echo $_SESSION['nama_petugas'] ?></div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">Jumlah Masyarakat</div>
                <div class="card-body"><?php echo $jmlh_masyarakat; ?></div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">Jumlah Pengaduan</div>
                <div class="card-body"><?php echo $jmlh_pengaduan; ?></div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">Jumlah Tanggapan</div>
                <div class="card-body"><?php echo $jmlh_tanggapan; ?></div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">Jumlah Petugast</div>
                <div class="card-body"><?php echo $jmlh_petugas; ?></div>
            </div>
        </div>
    </div>
</div>
