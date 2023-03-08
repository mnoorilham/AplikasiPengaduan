<!-- Tampilan Halaman  Detail Tanggapan Masyarakat -->
<?php
include '../config/koneksi.php';
if (!empty($_GET['id_pengaduan'])) {
	$id = $_GET['id_pengaduan'];
	$query = mysqli_query($koneksi, "SELECT a.*, b.* FROM tbl_pengaduan a INNER JOIN tbl_tanggapan b ON a.id_pengaduan=b.id_pengaduan
	WHERE b.id_pengaduan=$id");
	$data = mysqli_fetch_array($query);


?>
<div class="container mt-4" >
    <div class="card">
    <div class="card-header bg-warning">
    <h4 class="text-left mt-3">Detail Tanggapan</h4>
    <hr>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
			<div class="card-body">
				<form action="" method="POST">
					<div class="mb-3">
						<label class="form-label">Judul Pengaduan</label>
						<input type="text" class="form-control" value="<?php echo $data['judul_laporan'] ?>" readonly>
					</div>
					<div class="mb-3">
						<label class="form-label">Isi Pengaduan</label>
						<textarea class="form-control" readonly><?php echo $data['isi_laporan'] ?></textarea>
					</div>
					<div class="mb-3">
						<label class="form-label">Foto</label>
						<img src="../assets/img/<?php echo $data['foto'] ?>" class="form-control" style="width: 150px;">
					</div>
                    <div class="mb-3">
						<label class="form-label">Tanggapan</label>
						<textarea class="form-control" readonly><?php echo $data['tanggapan'] ?></textarea>
					</div>
			</div>
			<div class="card-footer">
				<a href="index.php" class="btn btn-danger">Kembali</a>
			</div>
		</form>
</div>
<?php } else{
	echo "Halaman tidak tersedia!";
	}?>