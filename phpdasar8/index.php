<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        .header a {
            background-color: #4a90e2;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 30%;
        }

        a {
            background-color: #4a90e2;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .header {
            margin-bottom: 20px;
        }

        table {
            text-align: center;
        }

        h1 {
            text-align: center;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>DAFTAR MAHASISWA</h1>
        <a href="tambah.php">Tambah Data Mahasiswa</a>
    </div>


    <table border="1" cellpadding="10" cellspacing="0" align="center">
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><img src="img/<?php echo $row["gambar"]; ?>" width="50" alt=""></td>
                <td><?php echo $row["nrp"] ?></td>
                <td><?php echo $row["nama"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["jurusan"] ?></td>
                <td>
                    <a href="#">ubah</a>
                    <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>