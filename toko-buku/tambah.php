<?php 
require 'fungsi.php';

if(isset($_POST["tambah"])) {

    if(tambah($_POST) > 0) {
        echo "<script>
            alert('Buku Berhasil Di Tambahkan!');
            document.location.href = 'index.php';
        </script>";
    } else
    echo "<script>
            alert('Buku Gagal Di Tambahkan!');
            document.location.href = 'index.php';
        </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Baru</title>
</head>
<body>
    <div class="container">
    <h1>Tambah Buku</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="input-box">
            <label for="isbn">ISBN :</label>
            <input type="text" name="isbn" id="isbn">
        </div>

        <div class="input-box">
            <label for="judul">Judul :</label>
            <input type="text" name="judul" id="judul">
        </div>

        <div class="input-box">
            <label for="penulis">Penulis :</label>
            <input type="text" name="penulis" id="penulis">
        </div>

        <div class="input-box">
            <label for="penerbit">Penerbit :</label>
            <input type="text" name="penerbit" id="penerbit">
        </div>

        <div class="input-box">
            <label for="deskripsi">Deskripsi :</label>
            <input type="text" name="deskripsi" id="deskripsi">
        </div>

        <div class="input-box">
            <label for="harga">Harga :</label>
            <input type="text" name="harga" id="harga">
        </div>

        <div class="input-box">
            <label for="cover">Cover :</label>
            <input type="file" name="cover" id="cover">
        </div>

        <button type="submit" name="tambah">Tambah</button>
    </form>
    </div>
</body>
</html>