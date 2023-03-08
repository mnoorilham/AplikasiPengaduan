<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pengaduan dan Tanggapan.xls");

?>

<center>
    <h3>LAPORAN PENGADUAN DAN TANGGAPAN <br> UKK REKAYASA PERANGKAT LUNAK</h3>
    <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">TANGGAL TANGGAPAN</th>
                    <th scope="col">NAMA PELAPOR</th>
                    <th scope="col">TANGGAL PENGADUAN</th>
                    <th scope="col">JUDUL LAPORAN</th>
                    <th scope="col">ISI LAPORAN </th>
                    <th scope="col">TANGGAPAN</th>
                    <th scope="col">NAMA PETUGAS</th>
                   
                </tr>
            </thead>
            <tbody>
                <!-- Tampilkan Data Pengaduan oleh Masyarakat ke dalam Tabel -->
                <?php
                include '../config/koneksi.php';
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT a.*, b.* , c.*, d.* FROM tbl_tanggapan a INNER JOIN tbl_pengaduan b ON a.id_pengaduan=b.id_pengaduan INNER JOIN tbl_petugas c ON a.id_petugas=c.id_petugas INNER JOIN tbl_masyarakat d ON d.nik=b.nik ");
                while ($data = mysqli_fetch_array($query)) { ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['tgl_pengaduan'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['tgl_tanggapan'] ?></td>
                    <td><?php echo $data['judul_laporan'] ?></td>
                    <td><?php echo $data['isi_laporan'] ?></td>
                    <td><?php echo $data['tanggapan'] ?></td>
                    <td><?php echo $data['nama_petugas'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
</center>