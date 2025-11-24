<?php
include "Koneksi.php";

if (isset($_GET['id_buku'])) {
    $idbuku = $_GET['id_buku'];
    $query = mysqli_query($Koneksi, "SELECT * FROM buku WHERE id_buku='$idbuku'");
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
                <h2 class="card-title">Edit Buku</h2>
            </div>
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="mb-3">
                        <label for="id_buku" class="form-label">Id Buku :</label>
                        <input type="text" class="form-control" id="id_buku" name="id_buku" value="<?php echo $Data['id_buku']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Buku :</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $Data['judul']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang :</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?php echo $Data['pengarang']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun Terbit :</label>
                        <input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo $Data['tahun_terbit']; ?>">
                    </div>
                    <input type="hidden" name="id_buku" value="<?php echo $Data['id_buku']; ?>">
                    <button type="submit" name="Edit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['Edit'])) {
        $Id_buku = $_POST['id_buku'];
        $Judul_Buku = $_POST['judul'];
        $Pengarang = $_POST['pengarang'];
        $Tahun_terbit = $_POST['tahun'];

        $query = mysqli_query($Koneksi, "UPDATE buku SET
        judul='$Judul_Buku',
        pengarang='$Pengarang',
        tahun_terbit='$Tahun_terbit'
        WHERE id_buku='$Id_buku'");

        if ($query) {
            echo "<div class='alert alert-success mt-3'>Data berhasil diperbarui.
            <meta http-equiv='refresh' content='1; url=Buku.php'></div>";
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