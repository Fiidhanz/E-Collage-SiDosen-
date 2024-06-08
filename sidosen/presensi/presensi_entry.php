<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Halaman Tambah Mata Kuliah</title>
    <link rel="stylesheet" href="../Admin/admin.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
// Include file koneksi ke database
include '../koneksi.php';
// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data yang dikirimkan melalui form
    $kd_matkul = $_POST['kd_matkul'];
    $prodi = $_POST['prodi'];
    $kelas = $_POST['kelas'];
    $materi = $_POST['materi'];

    // Query untuk menyimpan data ke dalam tabel di database
    $sql = "INSERT INTO tb_presensi (kd_matkul, prodi, kelas, materi) VALUES ('$kd_matkul', '$prodi', '$kelas', '$materi')";
    
    // Jalankan query
    if ($koneksi->query($sql) === TRUE) {
        // Jika berhasil disimpan, tampilkan pesan sukses
        echo "<script>alert('Data Berhasil Disimpan'); window.location.href='presensi.php';</script>";
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    // Tutup koneksi ke database
    $koneksi->close();
}
?>


    <div class="sidebar">
        <div class="logo-details">
            <img src="../Image/logosidosenpng.png" alt="logodosen" height="75" width="140" />
          </div>
        <ul class="nav-links">
            <li>
                <a href="a../Admin/dmin.php">
                    <i class='fa fa-home'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../matkul/matkul.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Jadwal Pengajar</span>
                </a>
            </li>
            <li>
                <a href="../mahasiswa/mahasiswa.php" class="active">
                    <i class='bx bx-box'></i>
                    <span class="links_name">Penilaian Mahasiswa</span>
                </a>
            </li>
            <li>
                <a href="presensi.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Presensi Pengajar</span>
                </a>
            </li>
            <li class="log_out">
                <a href="../Index/login.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <h3>Presensi Mahasiswa</h3>
            </div>
            <div class="profile-details">
                <span class="admin_name">Admin</span>
            </div>
        </nav>
        <div class="home-content">
            <div class="form-login">
            <form action="presensi_entry.php" method="POST">
                    <label for="kd_matkul">Kode Mata Kuliah</label>
                    <input class="input" type="text" name="kd_matkul" id="kd_matkul" />
                    <label for="prodi">Prodi</label>
                    <input class="input" type="text" name="prodi" id="prodi"  />
                    <label for="kelas">Kelas</label>
                    <input class="input" type="text" name="kelas" id="kelas"/>
                    <label for="materi">Materi</label>
                    <input class="input" type="text" name="materi" id="materi" />

                    <button type="submit" class="btn btn-simpan" name="simpan" onclick="Simpan()"> Simpan </button>

                </form>
            </div>
        </div>

        <script>
            function Simpan() {
                alert("Data Berhasil Disimpan");
            }
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".sidebarBtn");
            sidebarBtn.onclick = function () {
                sidebar.classList.toggle("active");
                if (sidebar.classList.contains("active")) {
                    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else
                    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        </script>
</body>

</html>