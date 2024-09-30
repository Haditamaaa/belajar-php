<?php
// $mahasiswa = [
//     ["Haditama", "007", "TI", "Haditama@gmail.com"],
//     ["John", "008", "TI", "John@gmail.com"],
//     ["Shel", "009", "TI", "Shel@gmail.com"],
//     ["Era", "010", "TI", "Era@gmail.com"],
//     ["Jazz", "011", "TI", "Jazz@gmail.com"],
// ];

// Array Associative 
// key-nya adalah string yang kita buat sendiri (bukan index)
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
    <title>Daftar Mahasiswa</title>
</head>

<body>

    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs) : ?>
    <ul>
        <li>
            <img src="img/<?= $mhs["gambar"]; ?>" style="width: 100px; height: 100px; border-radius: 50%">
        </li>
        <li>Nama : <?= $mhs["nama"]; ?></li>
        <li>NRP : <?= $mhs["nrp"]; ?></li>
        <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
        <li>Email : <?= $mhs["email"]; ?></li>
    </ul>
    <?php endforeach ?>
    <!-- <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <li><?= $mhs; ?></li>
        <?php endforeach ?>
    </ul> -->
</body>

</html>