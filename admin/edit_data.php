<!-- CRUD Hapus Pengaduan di Halaman Admin -->
<?php
include '../config/koneksi.php';
if (isset($_POST['btn_hapus'])) {
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
}else{
    echo "<script>
    alert('Gagal!');
    window.location='index.php?page=pengaduan';
    </script>";
    
}
?>