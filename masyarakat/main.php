<!-- Tampilan Pengaduan Masyarakat -->
<div class="container mt-4" >
    <div class="card">
    <div class="card-header bg-warning">
    <div class="mt-3 col-md-4 float-end">
    <h6 class="text-center mt-2">Selamat Datang, <?php echo $_SESSION['nama'] ?></h6>
   </div>
    <h4 class="text-left mt-2">Silahkan mengisi pengaduan</h4>
    <hr>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
			<div class="card-body">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="mb-3">
						<label class="form-label">Judul Pengaduan</label>
						<input type="text" class="form-control" name="judul_laporan" placeholder="Masukkan Judul Pengaduan" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Isi Pengaduan</label>
						<textarea class="form-control" name="isi_laporan" placeholder="Jelaskan tentang pengaduan" required></textarea>
					</div>
					<div class="mb-3">
						<label class="form-label">Foto</label>
						<input type="file" class="form-control" name="foto" placeholder="Upload bukti foto" required>
					</div>
			</div>
			<div class="card-footer">
				<button type="submit" name="btn_kirim" class="btn btn-danger float-lg-end">Ajukan</button>
			</div>
		</form>
        
       
</div>

<div class="container">
<div class="row mt-3">
<h4 class="text-left mt-3">Riwayat Pengaduan</h4>
    <hr>
        <div class="card" style="overflow-y:scroll; max-height:200px;">
        <table class="table table-striped" >
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">JUDUL PENGADUAN</th>
                    <th scope="col">ISI PENGADUAN</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                </tr>
                <!-- Tampilkan Data Pengaduan ke Tabel View-->
                <?php
                $no = 1;
                $nik = $_SESSION['nik'];
                $tampil_data = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan
                WHERE nik='$nik'");
                if (mysqli_num_rows ($tampil_data)){
                
                while ($data = mysqli_fetch_array($tampil_data)) { ?>
                <tr>
                    
                   <td><?php echo $no++; ?></td>
                   <td><?php echo $data['judul_laporan']; ?></td>
                   <td><?php echo $data['isi_laporan']; ?></td>
                   <td><img src="../assets/img/<?php echo $data['foto'] ?>" width="100"></td>
                    <td>
                        <?php
                        if ($data['status'] =='proses') {
                            echo "<span class='badge bg-warning'>Proses</span>";
                        } elseif ($data['status'] =='selesai') {
                            echo "<span class='badge bg-success'>Selesai</span>";
                            echo "<br><a href='index.php?page=tanggapan&id_pengaduan=$data[id_pengaduan]'>Lihat Tanggapan</a>";
                        } else {
                            echo "<span class='badge bg-danger'>Menunggu</span>";
                        }
                        ?>
                    </td>
                    <td>
                   
                        <!-- Modal Hapus -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?php echo $data['id_pengaduan'] ?>">
                        Hapus
                        </button>

                        <div class="modal fade" id="modalHapus<?php echo $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="edit_data.php" method="POST">
                                <input type="hidden" name="id_pengaduan" value="<?php echo $data['id_pengaduan'] ?>">
                            <div class="modal-body">
                                Apakah anda yakin menghapus data <br> <?php echo $data['judul_laporan']  ?> ?
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger" name="btn_hapus">Hapus</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    </td>
                </tr>    
              <?php } } else{
                echo '<tr><td colspan="8" align="center">Belum Ada Pengaduan!</td></tr>';
              } ?>      
            </tbody>
        </table>
            
            </div>
        </div>
</div>
