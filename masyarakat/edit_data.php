<?php
include '../config/koneksi.php';
session_start();

if (isset($_POST['btn_hapus'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan");
    $data = mysqli_fetch_array($query);
    
    if (is_file('../assets/img/'.$data['foto'])) {
        echo "sampai sinil";
        unlink('../assets/img/'.$data['foto']);
        mysqli_query($koneksi, "DELETE FROM tbl_pengaduan WHERE id_pengaduan='$id_pengaduan'");
       
        echo "<script>
        alert('Data berhasil dihapus!');
        window.location='../masyarakat/index.php';
    </script>";
       
    }
}else{
    echo "<script>
    alert('Gagal!');
    window.location='../masyarakat/index.php';
    </script>";
    
}
?>