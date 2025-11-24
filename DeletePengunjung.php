<?php
    include "Koneksi.php";

    $idpengunjung = $_GET['id_pengunjung'];

    $sql= mysqli_query($Koneksi,"DELETE FROM pengunjung WHERE id_pengunjung='$idpengunjung'");
    if ($sql) {
        echo "Data Berhasil di Delete
        <meta http-equiv='refresh' content='1; url=Pengunjung.php'>";
    } else {
        echo "Data Gagal: " .mysqli_error($Koneksi);
    }
?>