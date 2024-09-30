<?php
// GET
$mahasiswa = [
    [
        "nama" => "Haditama",
        "nrp" => "007",
        "email" => "Haditama@gmail.com",
        "jurusan" => "TI",
        "gambar" => "example2.jpg"
    ],
    [
        "nama" => "John",
        "nrp" => "006",
        "email" => "John@gmail.com",
        "jurusan" => "TI",
        "gambar" => "example3.jpg"
    ],
    [
        "nama" => "Shel",
        "nrp" => "005",
        "email" => "Shel@gmail.com",
        "jurusan" => "TI",
        "gambar" => "example4.jpg"
    ],
    [
        "nama" => "Era",
        "nrp" => "004",
        "email" => "Era@gmail.com",
        "jurusan" => "TI",
        "gambar" => "example5.jpg"
    ],
    [
        "nama" => "Jazz",
        "nrp" => "003",
        "email" => "Jazz@gmail.com",
        "jurusan" => "TI",
        "gambar" => "example6.jpg"
    ],

];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <!-- <li><img src="img/<?= $mhs["gambar"]; ?>" alt=""></li> -->
            <!-- <li> <?= $mhs["nama"]; ?></li> -->
            <a href="get2.php?nama=<?= $mhs["nama"]; ?>&nrp= <?= $mhs["nrp"]; ?> &email=<?= $mhs["email"]; ?> &jurusan=<?= $mhs["jurusan"]; ?>&gambar=<?= $mhs["gambar"]; ?>"><?= $mhs["nama"]; ?></a>
        </ul>
    <?php endforeach ?>
</body>

</html>