<?php
include '../koneksi.php';
$query = "SELECT * FROM tb_penilaian";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Penilaian Mahasiswa</title>
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
        <li><a href="../Admin/admin.php"><i class='fa fa-home'></i><span class="links_name">Dashboard</span></a></li>
        <li><a href="../matkul/matkul.php"><i class='bx bx-grid-alt'></i><span class="links_name">Jadwal Pengajar</span></a></li>
        <li><a href="../mahasiswa/mahasiswa.php" class="active"><i class='bx bx-box'></i><span class="links_name">Penilaian Mahasiswa</span></a></li>
        <li><a href="../presensi/presensi.php"><i class='bx bx-list-ul'></i><span class="links_name">Presensi Mahasiswa</span></a></li>
        <li class="log_out"><a href="../Index/login.php"><i class='bx bx-log-out'></i><span class="links_name">Log out</span></a></li>
    </ul>
</div>
<div class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <h3>Penilaian Mahasiswa</h3>
        </div>
        <div class="profile-details"><span class="admin_name">Admin</span></div>
    </nav>
    <div class="home-content">
        <button type="button" class="btn btn-tambah">
            <a href="mahasiswa-entry.php">Tambah Data</a>
        </button>
        <table class="table-data">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Kode MatKul</th>
                    <th>Nilai 1</th>
                    <th>Nilai 2</th>
                    <th>Nilai Kuis 1</th>
                    <th>Nilai Kuis 2</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['nim']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['kd_matkul']; ?></td>
                    <td><?php echo $row['nilai1']; ?></td>
                    <td><?php echo $row['nilai2']; ?></td>
                    <td><?php echo $row['kuis1']; ?></td>
                    <td><?php echo $row['kuis2']; ?></td>
                    <td><?php echo $row['uts']; ?></td>
                    <td><?php echo $row['uas']; ?></td>
                    <td>
                    <button type="button" class="btn btnedit">
                        <a href="mahasiswa-edit.php?nim=<?php echo $row['nim']; ?>">Edit</a></button>
                        <button type="button" class="btn btnhapus">
                        <a href="mahasiswa-delete.php?nim=<?php echo $row['nim']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a></button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
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
