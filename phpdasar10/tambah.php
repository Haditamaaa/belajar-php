<?php
require 'functions.php';
// cek tombol submit
if (isset($_POST["submit"])) {
    // berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                location.href = 'index.php'
            </script>;
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
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
    <title>Tambah Data Mahasiswa</title>
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
    </style>
</head>

<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post">
        <label for="nama">Nama :</label>
        <input type="text" name="nama" id="nama" required>

        <label for="nrp">NRP :</label>
        <input type="text" name="nrp" id="nrp" required>

        <label for="email">Email :</label>
        <input type="text" name="email" id="email" required>

        <label for="jurusan">Jurusan :</label>
        <input type="text" name="jurusan" id="jurusan" required>

        <label for="gambar">Gambar :</label>
        <input type="text" name="gambar" id="gambar" required>

        <button type="submit" name="submit">Tambah Data</button>
    </form>
</body>

</html>