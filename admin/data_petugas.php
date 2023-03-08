<!-- Tampilan Halaman Data Petugas pada Halaman Admin-->
<div class="container">
<div class="row mt-3">
<h4 class="text-left mt-3">Data Petugas</h4>
    <hr>
        <div class="card">
            <div class="card-body">
                <!-- Modal Form Tambah Petugast -->
            <a href="" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</a>   
            <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Petugas : </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="POST">
                            <div class="row mb-3">
                                <label class="col-md-4">Nama Lengkap</label>
                                <div class="col-md-8">
                                    <input type="text" name="nama_petugas" class="form-control" placeholder="Masukan Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4">Username</label>
                                <div class="col-md-8">
                                    <input type="text" name="username" class="form-control" placeholder="Masukan Username" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4">Password</label>
                                <div class="col-md-8">
                                    <input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4">No Telpon</label>
                                <div class="col-md-8">
                                    <input type="number" name="telp" class="form-control" placeholder="Masukan No Telp" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="btn_tambah_petugas">Simpan</button>
                            </div>
                            </form>
                        </div>

                        <?php
                       include '../config/koneksi.php';

                       if (isset($_POST['btn_tambah_petugas'])) {
                           $nama = $_POST['nama_petugas'];
                           $username = $_POST['username'];
                           $password = md5($_POST['password']);
                           $telp = $_POST['telp'];
                           $level = 'petugas';
                       
                           $query = mysqli_query($koneksi, "INSERT INTO tbl_petugas VALUES(
                               '','$nama','$username','$password','$telp','$level'
                           )");
                       
                           if ($query) {
                               header('location:index.php?page=petugas');
                           }
                       };

                        ?>


                        </div>
                    </div>
                    </div>
            </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">NO TELPON</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <!-- Tampilkan Data Petugas ke dalam Tabel -->
                <?php
                include '../config/koneksi.php';
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT* FROM tbl_petugas");
                while ($data = mysqli_fetch_array($query)) { ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_petugas'] ?></td>
                    <td><?php echo $data['username'] ?></td>
                    <td><?php echo $data['telp'] ?></td>
                    <td>
                         <!-- Modal Hapus -->
                         <a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?php echo $data['id_petugas'] ?>">Hapus</a>               
                        <div class="modal fade" id="modalHapus<?php echo $data['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Info</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="edit_data.php" method="POST">
                            <input type="hidden" name="id_petugas" class="form-control" value="<?php echo $data['id_petugas'] ?>">
                            <p>Apakah anda yakin ingin menghapus data <br><?php echo $data['nama_petugas'] ?> ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" name="btn_hapus_petugas">Hapus</button>
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
