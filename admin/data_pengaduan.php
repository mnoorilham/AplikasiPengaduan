<!-- Tampilan Halaman Pengaduan pada Halaman Admin -->
<div class="container">
<div class="row mt-3">
<h4 class="text-left mt-3">Data Pengaduan</h4>
    <hr>
        <div class="card" style="overflow-y:scroll; max-height:500px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">NAMA PELAPOR</th>
                    <th scope="col">JUDUL PENGADUAN</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <!-- Tampilkan Data Pengaduan oleh Masyarakat ke dalam Tabel -->
                <?php
                include '../config/koneksi.php';
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT a.*, b.* FROM tbl_pengaduan a INNER JOIN tbl_masyarakat b ON a.nik=b.nik 
                ORDER BY id_pengaduan DESC");
                while ($data = mysqli_fetch_array($query)) { ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['tgl_pengaduan'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['judul_laporan'] ?></td>
                    <td><img src="../assets/img/<?php echo $data['foto'] ?>" width="100"></td>
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
                        <!-- Section Button Modal-->
                        <!-- Modal Verifikasi -->
                    <?php 
                    if ($data['status'] != 'selesai') { ?>
                    
                    <a href="" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalVerifikasi<?php echo $data['id_pengaduan'] ?>">Verifikasi</a>               
                    <div class="modal fade" id="modalVerifikasi<?php echo $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Verifikasi :<?php echo $data['judul_laporan'] ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $data['id_pengaduan'] ?>">
                            <div class="row mb-3">
                                <label class="col-md-4">Status</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="status">
                                        <option value="proses">Proses</option>
                                        <option value="0">Tolak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="btn_verifikasi">Verifikasi</button>
                        </div>
                        </form>

                        <?php
                        if (isset($_POST['btn_verifikasi'])) {
                            $id_pengaduan = $_POST['id_pengaduan'];
                            $status = $_POST['status'];

                            $query = mysqli_query($koneksi, "UPDATE tbl_pengaduan SET status='$status' WHERE id_pengaduan='$id_pengaduan'");
                            echo "<script>
                            alert('Data berhasil diverifikasi');
                            window.location='index.php?page=pengaduan';
                            </script>";
                        }

                        ?>


                        </div>
                    </div>
                    </div>
                    <?php } ?>
                        <!-- Modal Tanggapi -->
                    <?php 
                    if ($data['status'] == 'proses') { ?>
                    <a href="" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalTanggapi<?php echo $data['id_pengaduan'] ?>">Tanggapi</a>               
                    <div class="modal fade" id="modalTanggapi<?php echo $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Verifikasi :<?php echo $data['judul_laporan'] ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $data['id_pengaduan'] ?>">
                            <div class="row mb-3">
                                <label class="col-md-4">Tanggal</label>
                                <div class="col-md-8">
                                  <input type="text" name="tgl_pengaduan" class="form-control" value="<?php echo $data['tgl_pengaduan']?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4">Judul Laporan</label>
                                <div class="col-md-8">
                                  <input type="text" name="judul_laporan" class="form-control" value="<?php echo $data['judul_laporan']?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4">Isi Laporan</label>
                                <div class="col-md-8">
                                  <textarea name="isi_laporan" class="form-control" readonly><?php echo $data['isi_laporan']?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4">Foto</label>
                                <div class="col-md-8">
                                <img src="../assets/img/<?php echo $data['foto'] ?>" width="100">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4">Isi Tanggapan</label>
                                <div class="col-md-8">
                                  <textarea name="tanggapan" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="btn_tanggapi">Tanggapi</button>
                        </div>
                        </form>

                        <?php
                        if (isset($_POST['btn_tanggapi'])) {
                            $id_pengaduan = $_POST['id_pengaduan'];
                            $id_petugas = $_SESSION['id_petugas'];
                            $tanggal = date("Y-m-d");
                            $tanggapan = htmlspecialchars($_POST['tanggapan']);

                            $query = mysqli_query($koneksi, "INSERT INTO tbl_tanggapan VALUES ('', '$id_pengaduan', '$tanggal', '$tanggapan', '$id_petugas')");
                            if ($tanggapan != NULL) {
                                $update = mysqli_query($koneksi, "UPDATE tbl_pengaduan SET status='selesai' WHERE id_pengaduan='$id_pengaduan'");
                
                            }
                            echo "<script>
                            alert('Data berhasil ditanggapi');
                            window.location='index.php?page=pengaduan';
                            </script>";
                        }

                        ?>
                        </div>
                    </div>
                    </div>
                    <?php } ?>
                        <!-- Modal Hapus -->
                        <a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?php echo $data['id_pengaduan'] ?>">Hapus</a>               
                    <div class="modal fade" id="modalHapus<?php echo $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Info</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="edit_data.php" method="POST">
                            <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $data['id_pengaduan'] ?>">
                            <p>Apakah anda yakin ingin menghapus data <br><?php echo $data['judul_laporan'] ?> ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" name="btn_hapus_pengaduan">Hapus</button>
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
