<?php
// Include file koneksi.php
include '../koneksi.php';

// Cek apakah request adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data yang dikirimkan melalui POST
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kd_matkul = $_POST['kd_matkul'];
    $nilai1 = $_POST['nilai1'];
    $nilai2 = $_POST['nilai2'];
    $kuis1 = $_POST['kuis1'];
    $kuis2 = $_POST['kuis2'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];

    // Query untuk mengupdate data mahasiswa
    $sql = "UPDATE tb_penilaian SET 
                nama='$nama', 
                kd_matkul='$kd_matkul', 
                nilai1='$nilai1', 
                nilai2='$nilai2', 
                kuis1='$kuis1', 
                kuis2='$kuis2', 
                uts='$uts', 
                uas='$uas' 
            WHERE nim='$nim'";

    // Melakukan query update
    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil diupdate'); window.location.href='mahasiswa.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    // Menutup koneksi database
    $koneksi->close();
}

// Cek apakah parameter nim terdapat pada URL
if (isset($_GET['nim'])) {
    // Mengambil nilai nim dari parameter URL
    $nim = $_GET['nim'];

    // Query untuk mengambil data mahasiswa berdasarkan nim
    $query = "SELECT * FROM tb_penilaian WHERE nim='$nim'";
    $result = $koneksi->query($query);

    // Memeriksa apakah data mahasiswa dengan nim yang diberikan ada
    if ($result->num_rows > 0) {
        // Mengambil data mahasiswa dari hasil query
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="../Admin/admin.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="../Image/logosidosenpng.png" alt="logodosen" height="75" width="140" />
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
                <h2>Edit Data Mahasiswa</h2>
                <form action="mahasiswa-edit.php" method="POST">
                    <input type="hidden" name="nim" value="<?php echo $row['nim']; ?>">

                    <label for="nama_mahasiswa">Nama</label>
                    <input class="input" type="text" name="nama" id="nama_mahasiswa" value="<?php echo $row['nama']; ?>" required />

                    <label for="kd_matkul">Kode Matkul</label>
                    <input class="input" type="text" name="kd_matkul" id="kd_matkul" value="<?php echo $row['kd_matkul']; ?>" required />

                    <label for="nilai1">Nilai 1</label>
                    <input class="input" type="number" name="nilai1" id="nilai1" value="<?php echo $row['nilai1']; ?>" required />

                    <label for="nilai2">Nilai 2</label>
                    <input class="input" type="number" name="nilai2" id="nilai2" value="<?php echo $row['nilai2']; ?>" required />

                    <label for="kuis1">Nilai Kuis 1</label>
                    <input class="input" type="number" name="kuis1" id="kuis1" value="<?php echo $row['kuis1']; ?>" required />

                    <label for="kuis2">Nilai Kuis 2</label>
                    <input class="input" type="number" name="kuis2" id="kuis2" value="<?php echo $row['kuis2']; ?>" required />

                    <label for="uts">UTS</label>
                    <input class="input" type="number" name="uts" id="uts" value="<?php echo $row['uts']; ?>" required />

                    <label for="uas">UAS</label>
                    <input class="input" type="number" name="uas" id="uas" value="<?php echo $row['uas']; ?>" required />

                    <button type="submit" class="btn btn-simpan" name="simpan">Update</button>
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
            } else {
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        }
    </script>
</body>
</html>

<?php
    } else {
        echo "<script>alert('Data mahasiswa tidak ditemukan'); window.location.href='mahasiswa.php';</script>";
    }
} else {
    echo "<script>alert('NIM tidak disediakan'); window.location.href='mahasiswa.php';</script>";
}
?>
