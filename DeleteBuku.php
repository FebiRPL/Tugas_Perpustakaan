<?php
    include "Koneksi.php";

    $idBuku = $_GET['id_buku'];

    $sql= mysqli_query($Koneksi,"DELETE FROM buku WHERE id_buku='$idBuku'");
    if ($sql) {
        echo "Data Berhasil di Delete
        <meta http-equiv='refresh' content='1; url=Buku.php'>";
    } else {
        echo "Data Gagal: " .mysqli_error($Koneksi);
    }
?>