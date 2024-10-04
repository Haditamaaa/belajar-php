<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    // data elemen tiap form
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // upload
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // query insert data
    $query =  "INSERT INTO mahasiswa VALUES (' ', '$nama', '$nrp', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    // data elemen tiap form
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data['gambarLama']);

    // cek user pilih gambar atau tidk
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        // upload
        $gambar = upload();
    }

    // query insert data
    $query =  "UPDATE mahasiswa SET nama = '$nama', nrp = '$nrp', email = '$email', jurusan = '$jurusan', gambar = '$gambar' WHERE id = $id ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nrp LIKE '%$keyword%' ";

    return query($query);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek gambar terupload atau tidak
    if ($error ===  4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu')
        </script>";
        return false;
    }

    // cek yang terupload adalah gambar
    $ekstensigambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namaFile);
    $ekstensigambar = strtolower(end($ekstensigambar));

    if (!in_array($ekstensigambar, $ekstensigambarValid)) {
        echo "<script>
        alert('data yang di upload bukan gambar!')
        </script>";
        return false;
    }

    // cek ukuran file
    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar!')
        </script>";
        return false;
    }

    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensigambar;

    // lolos pengecekan gambar siap upload
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);



    return $namaFileBaru;
}

// // cek data berhasil (+/-)
// if (mysqli_affected_rows($conn)) {
//     echo "berhasil";
// } else {
//     echo "gagal";
//     echo "<br>";
//     echo mysqli_error($conn);
// }
