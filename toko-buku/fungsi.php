<?php
// koneksi database
$db = mysqli_connect("localhost", "root", "", "toko_buku");

function query($query) {
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $db;

    $isbn = htmlspecialchars($data["isbn"]);
    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $deskripsi = mysqli_real_escape_string($db, htmlspecialchars($data["deskripsi"]));
    $harga = htmlspecialchars($data["harga"]);

    $cover = upload();
    if( !$cover ) {
        return false;
    }

    $query = "INSERT INTO buku 
                (isbn, judul, penulis, penerbit, deskripsi, harga, cover)
                        VALUES ('$isbn', '$judul', '$penulis', '$penerbit', '$deskripsi', '$harga', '$cover')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function upload() {
    $nameFile = $_FILES['cover']['name'];
    $ukuranFile = $_FILES['cover']['size'];
    $error = $_FILES['cover']['error'];
    $tmpFile = $_FILES['cover']['tmp_name'];

    // cek apakah ada gambar yang di uplload
    if($error === 4) {
        echo "<script>
        alert('Upload Cover Terlebih Dahulu!');
        </script>";
        return false;
    } 

    // cek apakah file yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = strtolower(pathinfo($nameFile, PATHINFO_EXTENSION));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Yang Anda Upload Bukan Gambar!');
        </script>";
        return false;
    }

    // cek apakah ukuran file terlalu besar
    if($ukuranFile > 1000000) {
        echo "<script>
        alert('Gambar Terlalu Besar!');
        </script>";
        return false;
    }


    // upload gambar setelah lolos pengecekan
    move_uploaded_file($tmpFile, 'img/' . $nameFile);

    return $nameFile;
}