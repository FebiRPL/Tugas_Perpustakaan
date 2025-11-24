<?php
include "Koneksi.php";

if (isset($_GET['id_artikel'])) {
    $idArtikel = $_GET['id_artikel'];
    $query = mysqli_query($Koneksi, "SELECT * FROM artikel WHERE id_artikel='$idArtikel'");
    $Data = mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <!-- Menambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="card-title">Edit Artikel</h2>
            </div>
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="mb-3">
                        <label for="id_artikel" class="form-label">Id Artikel :</label>
                        <input type="text" class="form-control" id="id" name="Id_Artikel" value="<?php echo $Data['id_artikel']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Artikel :</label>
                        <input type="text" class="form-control" id="judul" name="Judul_Artikel" value="<?php echo $Data['judul']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Isi" class="form-label">Isi Artikel :</label>
                        <input type="text" class="form-control" id="isi" name="Isi_Artikel" value="<?php echo $Data['isi']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Penulis" class="form-label">Penulis :</label>
                        <input type="text" class="form-control" id="penulis" name="Penulis_Artikel" value="<?php echo $Data['penulis']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Tgl" class="form-label">Tanggal Publish :</label>
                        <input type="text" class="form-control" id="tgl" name="Tgl_Publish" value="<?php echo $Data['tanggal_publish']; ?>">
                    </div>
                    <input type="hidden" name="id_artikel" value="<?php echo $Data['id_artikel']; ?>">
                    <button type="submit" name="Edit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['Edit'])) {
        $Id_Artikel = $_POST['Id_Artikel'];
        $Judul_Artikel = $_POST['Judul_Artikel'];
        $Isi_Artikel = $_POST['Isi_Artikel'];
        $Penulis_Artikel = $_POST['Penulis_Artikel'];
        $Tgl_Publish = $_POST['Tgl_Publish'];

        $query = mysqli_query($Koneksi, "UPDATE artikel SET
        judul='$Judul_Artikel',
        isi='$Isi_Artikel',
        penulis='$Penulis_Artikel'
        WHERE id_artikel='$Id_Artikel'");

        if ($query) {
            echo "<div class='alert alert-success mt-3'>Data berhasil diperbarui.
            <meta http-equiv='refresh' content='1; url=Artikel.php'></div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Gagal memperbarui data: " . mysqli_error($Koneksi) . "</div>";
        }
    }
    ?>

    <!-- Menambahkan Bootstrap JS dan dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>