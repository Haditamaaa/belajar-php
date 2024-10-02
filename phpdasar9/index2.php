<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel atau query
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ambil data (fetch) mahasiswa dari object result
// mysqli_fetch_row() mengembalikan array numerik
// mysqli_fetch_assoc() mengembalikan array associative
// mysqli_fetch_array() mengebalikan keduanya
// mysqli_fetch_object() 

// $mhs = mysqli_fetch_row($result);
// var_dump($mhs);

// $mhs = mysqli_fetch_assoc($result);
// var_dump($mhs["jurusan"]);

// $mhs = mysqli_fetch_array($result);
// var_dump($mhs[1]);

// $mhs = mysqli_fetch_object($result);
// var_dump($mhs->nama);

// while ($mhs = mysqli_fetch_assoc($result)) {
//     var_dump($mhs);
// }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>DAFTAR MAHASISWA</h1>
    <img src="/img/example1.jpg" alt="">

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td>
                    <a href="#">ubah</a>
                    <a href="#">hapus</a>
                </td>
                <td><img src="img/<?php echo $row["gambar"]; ?>" width="50" alt=""></td>
                <td><?php echo $row["nrp"] ?></td>
                <td><?php echo $row["nama"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["jurusan"] ?></td>
            </tr>
            <?php $i++; ?>
        <?php endwhile; ?>
    </table>
</body>

</html>