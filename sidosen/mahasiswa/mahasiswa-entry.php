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
    <div class="sidebar">
        <div class="logo-details">
            <img src="logosidosenpng.png" alt="logodosen" height="75" width="140" />
        </div>
        <ul class="nav-links">
            <li>
                <a href="../Admin/admin.php">
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
                <a href="../presensi/presensi.php">
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
                <h3>Penilaian Mahasiswa</h3>
            </div>
            <div class="profile-details">
                <span class="admin_name">Admin</span>
            </div>
        </nav>
        <div class="home-content">
            <div class="form-login">
                <form action="mahasiswa-entry.php" method="POST">
                    <label for="nim_mahasiswa">NIM</label>
                    <input class="input" type="number" name="nim" id="nim_mahasiswa" required />

                    <label for="nama_mahasiswa">Nama</label>
                    <input class="input" type="text" name="nama" id="nama_mahasiswa" required />

                    <label for="kd_matkul">Kode Matkul</label>
                    <input class="input" type="text" name="kd_matkul" id="kd_matkul" required />

                    <label for="Nilai1">Nilai 1</label>
                    <input class="input" type="number" name="Nilai1" id="Nilai1" required />

                    <label for="Nilai2">Nilai 2</label>
                    <input class="input" type="number" name="Nilai2" id="Nilai2" required />

                    <label for="kuis1">Nilai Kuis 1</label>
                    <input class="input" type="number" name="kuis1" id="kuis1" required />

                    <label for="kuis2">Nilai Kuis 2</label>
                    <input class="input" type="number" name="kuis2" id="kuis2" required />

                    <label for="uts">UTS</label>
                    <input class="input" type="number" name="uts" id="uts" required />

                    <label for="uas">UAS</label>
                    <input class="input" type="number" name="uas" id="uas" required />
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

<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kd_matkul = $_POST['kd_matkul'];
    $nilai1 = $_POST['Nilai1'];
    $nilai2 = $_POST['Nilai2'];
    $kuis1 = $_POST['kuis1'];
    $kuis2 = $_POST['kuis2'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];

    $sql = "INSERT INTO tb_penilaian (nim, nama, kd_matkul, nilai1, nilai2, kuis1, kuis2, uts, uas) VALUES ('$nim', '$nama', '$kd_matkul', '$nilai1', '$nilai2', '$kuis1', '$kuis2', '$uts', '$uas')";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data Berhasil Disimpan'); window.location.href='mahasiswa.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}
?>
