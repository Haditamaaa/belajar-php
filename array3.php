<?php
$mahasiswa = [
    ["Haditama", "007", "TI", "Haditama@gmail.com"],
    ["John", "008", "TI", "John@gmail.com"],
    ["Shel", "009", "TI", "Shel@gmail.com"],
    ["Era", "010", "TI", "Era@gmail.com"],
    ["Jazz", "011", "TI", "Jazz@gmail.com"],
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

    <?php foreach($mahasiswa as $mhs) : ?>
    <ul>
        <li>Nama : <?= $mhs[0]; ?></li>
        <li>NRP : <?= $mhs[1]; ?></li>
        <li>Jurusan : <?= $mhs[2]; ?></li>
        <li>Email : <?= $mhs[3]; ?></li>
    </ul>
    <?php endforeach?>
    <!-- <ul>
        <?php foreach($mahasiswa as $mhs) : ?>
            <li><?= $mhs; ?></li>
        <?php endforeach?>
    </ul> -->
</body>

</html>