<!-- CRUD Hapus Pengaduan di Halaman Admin -->
<?php
include '../config/koneksi.php';
if (isset($_POST['btn_hapus_pengaduan'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan WHERE id_pengaduan='$id_pengaduan'");
    $data = mysqli_fetch_array($query);
    
    if (is_file('../assets/img/'.$data['foto'])) {
        unlink('../assets/img/'.$data['foto']);
        mysqli_query($koneksi, "DELETE FROM tbl_pengaduan WHERE id_pengaduan='$id_pengaduan'");
       
        echo "<script>
        alert('Data berhasil dihapus!');
        window.location='index.php?page=pengaduan';
        </script>";
       
    }
}


if (isset($_POST['btn_hapus_tanggapan'])) {
    $id_tanggapan = $_POST['id_tanggapan'];
    $query = mysqli_query($koneksi, "DELETE FROM tbl_tanggapan WHERE id_tanggapan='$id_tanggapan'");
   
   if ($query) {
        echo "<script>
        alert('Data berhasil dihapus!');
        window.location='index.php?page=tanggapan';
        </script>";
    }

}
if (isset($_POST['btn_hapus_masyarakat'])) {
        $nik = $_POST['nik'];
        $query = mysqli_query($koneksi, "DELETE FROM tbl_masyarakat WHERE nik='$nik'");
       
    if ($query) {
        echo "<script>
        alert('Data berhasil dihapus!');
        window.location='index.php?page=masyarakat';
        </script>";
        }
}
if (isset($_POST['btn_hapus_petugas'])) {
            $id_petugas = $_POST['id_petugas'];
            $query = mysqli_query($koneksi, "DELETE FROM tbl_petugas WHERE id_petugas='$id_petugas'");
           
    if ($query) {
        echo "<script>
        alert('Data berhasil dihapus!');
        window.location='index.php?page=petugas';
        </script>";
        }
}else{
    echo "<script>
    alert('Terjadi Kesalahan!');
    window.location='index.php';
    </script>";  
};
?>