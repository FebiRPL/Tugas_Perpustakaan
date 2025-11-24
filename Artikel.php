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
        <span class="logo-text">Perpustakaan Web</span>
    </div>
    <div id="menu-icon" class="menu-icon">
        <i class="ph-fill ph-list"></i>
    </div>
    <ul id="menu-list" class="hidden">
        <li><a href="Buku.php">Buku</a></li>
        <li><a href="Pengunjung.php">Pengunjung</a></li>
        <li><a href="Artikel.php">Artikel</a></li>
    </ul>
</nav>

<div class="container">
    <div class="header-bar">
        <h4>Artikel</h4>
        <a href="AddArtikel.php" class="btn-tambah">+ Tambah Artikel</a>
    </div>

    <div class="table-container">
        <table>
            <tr>
                <th>ID Artikel</th>
                <th>Judul Artikel</th>
                <th>Isi Artikel</th>
                <th>Penulis</th>
                <th>Tanggal Publish</th>
                <th>Aksi</th>
            </tr>

            <?php
            include "Koneksi.php";
            $query = mysqli_query($Koneksi, "SELECT * FROM artikel");
            while ($Data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $Data['id_artikel'] ?></td>
                    <td><?php echo $Data['judul'] ?></td>
                    <td><?php echo $Data['isi'] ?></td>
                    <td><?php echo $Data['penulis'] ?></td>
                    <td><?php echo $Data['tanggal_publish'] ?></td>
                    <td class="link">
                        <div class="action-button">
                            <a href="UpdateArtikel.php?id_artikel=<?php echo $Data['id_artikel']; ?>" class="btn-update"> Update </a>
                            <a href="DeleteArtikel.php?id_artikel=<?php echo $Data['id_artikel']; ?>" class="btn-Delete"> Delete </a>
                        </div>
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