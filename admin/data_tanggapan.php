<!-- Tampilan Halaman Tanggapan pada Halaman Admin-->
<div class="container">
<div class="row mt-3">
<h4 class="text-left mt-3">Data Tanggapan</h4>
    <hr>
        <div class="card">
            <div class="card-body">
                <a href="export_tanggapan.php" class="btn btn-outline-success">Export Data</a>
            </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">NIK</th>
                    <th scope="col">JUDUL PENGADUAN</th>
                    <th scope="col">TANGGAPAN</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <!-- Tampilkan Data Pengaduan oleh Masyarakat ke dalam Tabel -->
                <?php
                include '../config/koneksi.php';
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT a.*, b.* FROM tbl_tanggapan a INNER JOIN tbl_pengaduan b ON a.id_pengaduan=b.id_pengaduan ");
                while ($data = mysqli_fetch_array($query)) { ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['tgl_tanggapan'] ?></td>
                    <td><?php echo $data['nik'] ?></td>
                    <td><?php echo $data['judul_laporan'] ?></td>
                    <td><?php echo $data['tanggapan'] ?></td>
                    <td>
                    <?php
                        if ($data['status'] =='proses') {
                            echo "<span class='badge bg-warning'>Proses</span>";
                        } elseif ($data['status'] =='selesai') {
                            echo "<span class='badge bg-success'>Selesai</span>";                    
                        } else {
                            echo "<span class='badge bg-danger'>Menunggu</span>";
                        }
                        ?>
                    </td>
                    <td>
                         <!-- Modal Hapus -->
                         <a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?php echo $data['id_tanggapan'] ?>">Hapus</a>               
                        <div class="modal fade" id="modalHapus<?php echo $data['id_tanggapan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Info</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="edit_data.php" method="POST">
                            <input type="hidden" name="id_tanggapan" class="form-control" value="<?php echo $data['id_tanggapan'] ?>">
                            <p>Apakah anda yakin ingin menghapus tanggapan <br><?php echo $data['judul_laporan'] ?> ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" name="btn_hapus_tanggapan">Hapus</button>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
            
            </div>
        </div>
</div>
