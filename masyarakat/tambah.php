<!-- CRUD Tambah Masyarakat -->
<?php
        include '../config/koneksi.php';
        $tanggal = date('Y-m-d');
        if (isset($_POST['btn_kirim'])){
            $nik = htmlspecialchars($_SESSION['nik']);
            $judul_laporan = htmlspecialchars($_POST['judul_laporan']);
            $isi_laporan = htmlspecialchars($_POST['isi_laporan']);
            $status = 0;
            $foto = $_FILES['foto']['name'];
            $tmp = $_FILES['foto']['tmp_name'];
            $lokasi = '../assets/img/';
            $nama_foto = rand(0,999).'-'.$foto;
          
            move_uploaded_file($tmp, $lokasi.$nama_foto);
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_pengaduan VALUES ('','$tanggal','$nik','$judul_laporan','$isi_laporan',
            '$nama_foto','$status')");

            echo "<script>
                alert('Data berhasil diajukan!');
                window.location=index.php;
            </script> 
            ";
        }
        ?>