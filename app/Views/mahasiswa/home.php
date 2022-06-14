<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <link rel="icon" href="">
    <?php foreach ($style as $s) : ?>
        <link rel="stylesheet" href="/css/<?= $s ?>.css">
    <?php endforeach ?>
</head>

<body>
    <!--
    * ---------------------------------------------------------------------------------
    * Header Home
    * ---------------------------------------------------------------------------------
    -->
    <header class="header-home">
        <a href="">
            <img src="/img/headerHome/logoUnib.png" alt="unib-icon">
            <h1>Perpustakaan Fakultas Teknik <br> Universitas Bengkulu</h1>
        </a>
    </header>


    <!--
    * ---------------------------------------------------------------------------------
    * Selamat datang
    * ---------------------------------------------------------------------------------
    -->
    <section class="welcome">
        <h2>PERPUSTAKAAN BUKU</h2>
        <h2>ONLINE</h2>
        <p>Dengan klik mulai untuk datapat melihat data buku yang ada di Perpustakaan Fakultas Teknik Universitas Bengkulu<br>Silakan klik mulai untuk melihat koleksi buku kami</p>
        <a href="/cariBuku">
            <button type="button">MULAI</button>
        </a>
    </section>


    <!--
    * ---------------------------------------------------------------------------------
    * Footer home
    * ---------------------------------------------------------------------------------
    -->
    <footer class="footer-home">
        <p>BUKU POPULER</p>
        <div class="footer-book">
            <?php foreach ($buku as $data) : ?>
                <img src="/img/buku/<?= $data ?>.jpg" alt="book-list">
            <?php endforeach ?>
        </div>
    </footer>
</body>

</html>