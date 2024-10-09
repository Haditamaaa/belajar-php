<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        .tambah-link {
            background-color: #4a90e2;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 60px;
            margin-right: 10px;
        }

        /* .logout-link {
            background-color: #4a90e2;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 20%;
        } */

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
            margin-bottom: 30px;
            /* background-color: red; */
        }

        table {
            text-align: center;
        }

        h1 {
            text-align: center;
            padding-bottom: 30px;
        }

        form input {
            margin-left: 30%;
            /* margin-bottom: 20px; */
        }

        .navi {
            margin-left: 30%;
            height: 10px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>DAFTAR MAHASISWA</h1>
        <form action="" method="post">
            <input type="text" id="keyword" name="keyword" size="30" autofocus placeholder="masukan keyword" autocomplete="off">
            <button type="submit" id="tombol-cari" name="cari">Cari</button>
            <a href="tambah.php" class="tambah-link">Tambah Data Mahasiswa</a>
            <a href="logout.php" class="logout-link">Logout</a>
        </form>
    </div>

    <div id="container">
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
                        <a href="ubah.php?id=<?php echo $row["id"]; ?>">ubah</a>
                        <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="js/script.js"></script>
</body>

</html>