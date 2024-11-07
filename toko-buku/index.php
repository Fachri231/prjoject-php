<?php 
require 'fungsi.php';

$buku = query("SELECT * FROM buku");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="daftar-buku">
<h1>Daftar Buku</h1>


    <div class="buku-container">
        <?php foreach($buku as $buku): ?>
        <div class="container">
            <a href="detail.php?id=<?= $buku["id"]; ?>">
                <div class="wrap-img">
                    <img src="img/<?= $buku["cover"]; ?>" alt="<?= $buku["judul"]; ?>">
                </div>
                <p class="penulis"><?= $buku["penulis"]; ?></p>
                <p class="judul"><?= $buku["judul"]; ?></p>
                <div class="harga">
                    <p>Rp.<?= number_format($buku["harga"], 0, ',', '.') ?></p>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>

</body>
</html>
