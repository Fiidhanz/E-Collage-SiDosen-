<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="../Admin/admin.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
include '../koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prodi = $_POST['prodi'];
    $matkul = $_POST['matkul'];
    $jumlah_sks = $_POST['jumlah_sks'];
    $jam_matkul = $_POST['jam_matkul'];
    $ruangan = $_POST['ruangan'];
    $kd_matkul = $_POST['kd_matkul'];
    $sql = "INSERT INTO tb_pengajar (prodi, matkul, jumlah_sks, jam_matkul, ruangan,kd_matkul) VALUES ('$prodi', '$matkul', '$jumlah_sks', '$jam_matkul', '$ruangan','$kd_matkul')";
    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data Berhasil Disimpan'); window.location.href='matkul.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
    $koneksi->close();
}
?>
    <div class="sidebar">
        <div class="logo-details">
            <img src="../Image/logosidosenpng.png" alt="logodosen" height="75" width="140" />
        </div>
        <ul class="nav-links">
            <li>
                <a href="admin.php">
                    <i class='fa fa-home'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="matkul.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Jadwal Pengajar</span>
                </a>
            </li>
            <li>
                <a href="mahasiswa.php" class="active">
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
                <h3>Jadwal Pengajar</h3>
            </div>
            <div class="profile-details">
                <span class="admin_name">Admin</span>
            </div>
        </nav>
        <div class="home-content">
            <div class="form-login">
                <form action="" method="POST">
                    <label for="prodi">Prodi</label>
                    <input class="input" type="text" name="prodi" id="prodi" required />

                    <label for="matkul">Mata Kuliah</label>
                    <input class="input" type="text" name="matkul" id="matkul" required />

                    <label for="jumlah_sks">Jumlah SKS</label>
                    <input class="input" type="number" name="jumlah_sks" id="jumlah_sks" required />

                    <label for="jam_matkul">Jam Mata Kuliah</label>
                    <input class="input" type="text" name="jam_matkul" id="jam_matkul" required />

                    <label for="ruangan">Ruangan</label>
                    <input class="input" type="text" name="ruangan" id="ruangan" required />
                    
                    <label for="kd_matkul">Kode Mata Kuliah</label>
                    <input class="input" type="text" name="kd_matkul" id="kd_matkul" required />

                    <button type="submit" class="btn btn-simpan" name="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <script>
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
