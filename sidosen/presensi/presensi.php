<?php
include '../koneksi.php';
$query = "SELECT * FROM tb_presensi";
$result = $koneksi->query($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Presensi Mahasiswa</title>
    <link rel="stylesheet" href="../Admin/admin.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
<?php
  // You can add PHP code here to process data or display dynamic content
  // For example, retrieve user information from a session or database
?>
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
            <span class="links_name">Presensi Mahasiswa</span>
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
        
<!-- Home content -->
<div class="home-content">
            <button type="button" class="btn btn-tambah">
                <a href="presensi_entry.php">Tambah Data</a>
            </button>
            <table class="table-data">
                <thead>
                    <tr>
                        <th style="width: 20%">Kode Matkul</th>
                        <th style="width: 20%">Prodi</th>
                        <th style="width: 20%">Kelas</th>
                        <th style="width: 40%">Materi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data dari setiap baris
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["kd_matkul"] . "</td>";
                            echo "<td>" . $row["prodi"] . "</td>";
                            echo "<td>" . $row["kelas"] . "</td>";
                            echo "<td>" . $row["materi"] . "</td>";
                            // Tambahkan output untuk kolom lainnya sesuai kebutuhan
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                    }
                    // Tutup koneksi ke database
                    $koneksi->close();
                    ?>
                </tbody>
            </table>
        </div>
    <script>
        function konfirmasiHapus() {
            if (confirm("Apakah Yakin Data Ini Akan Dihapus?")) {
                alert("Data berhasil dihapus");
            } else {
                alert("Penghapusan data gagal");
            }
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