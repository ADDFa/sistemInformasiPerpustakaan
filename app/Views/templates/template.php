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
    * Header template mahasiswa
    * ---------------------------------------------------------------------------------
    -->
    <header class="header-home">
        <a href="/">
            <img src="/img/headerHome/logoUnib.png" alt="unib-icon">
            <h1>Perpustakaan Fakultas Teknik <br> Universitas Bengkulu</h1>
        </a>

        <div class="menu">
            <!-- <a href="/login">Login</a> -->
            <a href="/cariBuku">Cari Buku</a>
            <a href="/daftarBuku">Daftar Buku</a>
        </div>
    </header>


    <!--
    * ---------------------------------------------------------------------------------
    * Masukkan konten dibawah dengan fungsi $this->renderSection('nama-konten')
    * ---------------------------------------------------------------------------------
    -->
    <?= $this->renderSection('konten') ?>


    <!--
    * ---------------------------------------------------------------------------------
    * Footer template admin
    * ---------------------------------------------------------------------------------
    -->
    <footer>
        <div class="unib">
            <a href="https://unib.ac.id" target="_blank">Universitas Bengkulu</a>
        </div>

        <div class="contact">
            <a href="/">Home</a>
            <a href="/hubungi">Hubungi Kami</a>
            <a href="/daftarBuku">Daftar Buku</a>
        </div>
    </footer>

    <!--
    * ---------------------------------------------------------------------------------
    * Java script
    * ---------------------------------------------------------------------------------
    -->
    <?php foreach ($script as $sc) : ?>
        <script src="/js/<?= $sc ?>.js"></script>
    <?php endforeach ?>
</body>

</html>