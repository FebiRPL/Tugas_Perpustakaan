<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <style>
        /* General Styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e0f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            color: #00796b;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #00796b;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 2px solid #00796b;
            border-radius: 8px;
            font-size: 16px;
            color: #333;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #004d40;
            outline: none;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .form-group .radio-group {
            display: flex;
            gap: 15px;
        }

        .form-group .radio-group label {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #333;
            font-weight: normal;
        }

        .form-group .radio-group input[type="radio"] {
            accent-color: #00796b;
        }

        /* Button Styling */
        .btn-submit {
            background-color: #00796b;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
        }

        .btn-submit:hover {
            background-color: #004d40;
            transform: translateY(-2px);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Message Styling */
        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 8px;
            font-size: 14px;
            text-align: center;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Buku</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <!-- id buku -->
            <div class="form-group">
                <label for="idbuku">ID Buku</label>
                <input type="text" id="idbuku" name="idbuku" required>
            </div>

            <!-- judul buku -->
            <div class="form-group">
                <label for="nama">Judul Buku</label>
                <input type="text" id="judul" name="judul" required>
            </div>


            <div class="form-group">
                <label for="nama">Pengarang</label>
                <input type="text" id="pengarang" name="pengarang" required>
            </div>

            <!-- Tahun Terbit -->
            <div class="form-group">
                <label for="alamat">Tahun Terbit</label>
                <input id="tahun" name="tahun" required>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" name="submit" class="btn-submit">Simpan Data</button>
        </form>

        <?php
        include "Koneksi.php";

        if (isset($_POST['submit'])) {
            $idbuku = $_POST['idbuku'];
            $Judul_Buku = $_POST['judul'];
            $Pengarang = $_POST['pengarang'];
            $tahun_terbit = $_POST['tahun'];

            // Cek apakah Id Buku sudah ada
            $query = mysqli_query($Koneksi, "SELECT * FROM buku WHERE id_buku ='$idbuku'");
            
            if (mysqli_num_rows($query) > 0) {
                echo '<div class="message error">
                        ID Buku sudah ada. Silakan gunakan Id Buku yang berbeda.
                      </div>';
            } else {
                // Insert data baru
                $query = mysqli_query($Koneksi, "INSERT INTO buku (id_buku, judul, pengarang, tahun_terbit)
                VALUES ('$idbuku', '$Judul_Buku', '$Pengarang', '$tahun_terbit')");

                if ($query) {
                    echo '<div class="message success">
                            Data berhasil disimpan! Redirecting...
                          </div>';
                    echo '<meta http-equiv="refresh" content="1; url=Buku.php">';
                } else {
                    echo '<div class="message error">
                            Gagal menyimpan data: ' . mysqli_error($Koneksi) . '
                          </div>';
                }
            }
        }
        ?>
    </div>
</body>
</html>
</body>
</html>