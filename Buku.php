<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>

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
        <h4>Buku</h4>
        <a href="AddBuku.php" class="btn-tambah">+ Tambah Buku</a>
    </div>

<div class="table-wrapper">
        <table>
            <tr>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>Opsi</th>
            </tr>

            <?php
                include "Koneksi.php";
                $query = mysqli_query($Koneksi, "SELECT * FROM buku");
                while ($Data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $Data['id_buku'] ?></td>
                        <td><?php echo $Data['judul'] ?></td>
                        <td><?php echo $Data['pengarang'] ?></td>
                        <td><?php echo $Data['tahun_terbit'] ?></td>
                        <td class="link">
                            <a href="UpdateBuku.php?id_buku=<?php echo $Data['id_buku']; ?>" class="btn-update">Update</a>
                            <a href="DeleteBuku.php?id_buku=<?php echo $Data['id_buku']; ?>" class="btn-Delete">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>
        </div>
    </div>
</body>
</html>