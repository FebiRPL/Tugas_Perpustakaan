<?php
    include "Koneksi.php";

    $idartikel = $_GET['id_artikel'];

    $sql= mysqli_query($Koneksi,"DELETE FROM artikel WHERE id_artikel ='$idartikel'");
    if ($sql) {
        echo "Data Berhasil di Delete
        <meta http-equiv='refresh' content='1; url=Artikel.php'>";
    } else {
        echo "Data Gagal: " .mysqli_error($Koneksi);
    }
?>