<?php
include '../koneksi.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    
    // Query untuk menghapus data
    $sql = "DELETE FROM tb_penilaian WHERE nim='$nim'";
    
    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='mahasiswa.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
} else {
    echo "<script>alert('NIM tidak ditemukan'); window.location.href='mahasiswa.php';</script>";
}
?>
