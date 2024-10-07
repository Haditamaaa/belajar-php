<?php
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek tombol submit
if (isset($_POST["submit"])) {
    // berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                location.href = 'index.php'
            </script>;
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                location.href = 'index.php'
            </script>;
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
    <style>
        /* Gaya untuk form */
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        /* Gaya untuk label */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        /* Gaya untuk input */
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Gaya untuk input yang fokus */
        input:focus,
        textarea:focus {
            border-color: #4a90e2;
            outline: none;
        }

        /* Gaya untuk tombol */
        button {
            background-color: #4a90e2;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        /* Gaya untuk tombol saat hover */
        button:hover {
            background-color: #357ABD;
        }

        h1 {
            text-align: center;
        }

        form img {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs["id"] ?>">
        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"] ?>">

        <label for="nama">Nama :</label>
        <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"] ?>">

        <label for="nrp">NRP :</label>
        <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"] ?>">

        <label for="email">Email :</label>
        <input type="text" name="email" id="email" required value="<?= $mhs["email"] ?>">

        <label for="jurusan">Jurusan :</label>
        <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"] ?>">

        <label for="gambar">Gambar :</label>
        <img src="img/<?= $mhs['gambar']; ?>" width="100" alt=""><br>
        <input type="file" name="gambar" id="gambar" required value="<?= $mhs["gambar"] ?>">

        <button type="submit" name="submit">Ubah Data</button>
    </form>
</body>

</html>