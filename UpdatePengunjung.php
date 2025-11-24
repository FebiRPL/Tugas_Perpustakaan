z<?php
include "Koneksi.php";

if (isset($_GET['id_pengunjung'])) {
    $idpengunjung = $_GET['id_pengunjung'];
    $query = mysqli_query($Koneksi, "SELECT * FROM pengunjung WHERE id_pengunjung='$idpengunjung'");
    $Data = mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengunjung</title>
    <!-- Menambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="card-title">Edit Pengunjung</h2>
            </div>
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="mb-3">
                        <label for="id_Pengunjung" class="form-label">Id Pengunjung :</label>
                        <input type="text" class="form-control" id="id_pengunjung" name="IdPengunjung" value="<?php echo $Data['id_pengunjung']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama :</label>
                        <input type="text" class="form-control" id="nama" name="Nama" value="<?php echo $Data['nama']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat :</label>
                        <input type="text" class="form-control" id="alamat" name="Alamat" value="<?php echo $Data['alamat']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">No Hp :</label>
                        <input type="text" class="form-control" id="nohp" name="NoHp" value="<?php echo $Data['no_hp']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Kunjungan :</label>
                        <input type="text" class="form-control" id="tanggal" name="TanggalKunjungan" value="<?php echo $Data['tanggal_kunjungan']; ?>">
                    </div>
                    <input type="hidden" name="id_pengunjung" value="<?php echo $Data['id_pengunjung']; ?>">
                    <button type="submit" name="Edit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['Edit'])) {
        $Id_Pengunjung = $_POST['IdPengunjung'];
        $Nama = $_POST['Nama'];
        $Alamat = $_POST['Alamat'];
        $No_Hp = $_POST['NoHp'];
        $Tanggal = $_POST['TanggalKunjungan'];

        $query = mysqli_query($Koneksi, "UPDATE pengunjung SET
        nama='$Nama',
        alamat='$Alamat',
        no_hp='$No_Hp',
        tanggal_kunjungan='$Tanggal'
        WHERE id_pengunjung='$Id_Pengunjung'");

        if ($query) {
            echo "<div class='alert alert-success mt-3'>Data berhasil diperbarui.
            <meta http-equiv='refresh' content='1; url=Pengunjung.php'></div>";
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