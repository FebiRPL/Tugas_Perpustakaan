<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengunjung</title>

    <link rel="stylesheet" href="style.css?v=2">
    <script src="js.js"></script>

</head>
<body>
<nav>
      <div class="logo-wrapper">
        <img src="building.png" alt="my-avatar"/>
        <span class="logo-text" >Perpustakaan Web</span>
      </div>
      <div id="menu-icon" class="menu-icon">
        <i class="ph-fill ph-list"></i>
      </div>
      <ul id="menu-list" class="hidden">
        <li>
          <a href="Buku.php">Buku</a>
        </li>
        <li>
          <a href="Pengunjung.php">Pengunjung</a>
        </li>
        <li>
          <a href="Artikel.php">Artikel</a>
        </li>
      </ul>
    </nav>

    <div class="container">
    <div class="header-bar">
        <h4>Pengunjung</h4>
        <a href="AddPengunjung.php" class="btn-tambah">+ Tambah Pengunjung</a>
    </div>


        <table>
            <tr>
                <th>ID Pengunjung</th>
                <th>Nama </th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Tanggal Kunjungan</th>
                <th>Opsi</th>
            </tr>

            <?php
                include "Koneksi.php";
                $query = mysqli_query($Koneksi, "SELECT * FROM pengunjung");
                while ($Data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $Data['id_pengunjung'] ?></td>
                        <td><?php echo $Data['nama'] ?></td>
                        <td><?php echo $Data['alamat'] ?></td>
                        <td><?php echo $Data['no_hp'] ?></td>
                        <td><?php echo $Data['tanggal_kunjungan'] ?></td>
                        <td class="link">
                          <div class="action-button">
                            <a href="UpdatePengunjung.php?id_pengunjung=<?php echo $Data['id_pengunjung']; ?>" class="btn-update">Update</a>
                            <a href="DeletePengunjung.php?id_pengunjung=<?php echo $Data['id_pengunjung']; ?>" class="btn-Delete">Delete</a>
                          </div>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</body>
</html>