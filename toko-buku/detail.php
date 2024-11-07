<?php 
require 'fungsi.php';

$id = intval($_GET["id"]);

$result = mysqli_query($db, "SELECT * FROM buku WHERE id = $id ");
$buku = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku - <?= htmlspecialchars($buku["judul"]); ?></title>
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>
    <div class="container">
        <div class="wraper">
            <div class="book-image">
                <img src="img/<?= htmlspecialchars($buku["cover"]); ?>" alt="<?= htmlspecialchars($buku["judul"]); ?>">
            </div>
            <div class="book-details">
                <h1><?= htmlspecialchars($buku["judul"]); ?></h1>
                <p class="author"><?= htmlspecialchars($buku["penulis"]); ?></p>
                <p class="price">Rp<?= number_format($buku["harga"],0, ',', '.'); ?></p>
                <div class="description">
                    <h3>Deskripsi</h3>
                    <p><?= htmlspecialchars(substr($buku["deskripsi"], 0, 150)); ?>...</p>
                    <a href="javascript:void(0)" class="read-more" onclick="openModal()">Baca Selengkapnya ^</a>
                </div>
                <div class="book-info">
                    <h3>Detail Buku</h3>
                    <p>Penerbit: <?= htmlspecialchars($buku["penerbit"]); ?></p>
                    <p>ISBN: <?= htmlspecialchars($buku["isbn"]); ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2>Deskripsi Lengkap</h2>
            <div class="modal-body">
                <p><?= nl2br(htmlspecialchars($buku["deskripsi"])); ?></p>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk membuka modal
        function openModal() {
            document.getElementById("myModal").style.display = "flex";
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        // Menutup modal ketika klik di luar konten modal
        window.onclick = function(event) {
            let modal = document.getElementById("myModal");
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>
