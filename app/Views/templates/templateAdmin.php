<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <?php foreach ($style as $s) : ?>
        <link rel="stylesheet" href="/css/<?= $s ?>.css">
    <?php endforeach ?>
</head>

<body>
    <!--
    * ---------------------------------------------------------------------------------
    * Header template admin
    * ---------------------------------------------------------------------------------
    -->
    <header>
        <div class="unib-logo">
            <img src="/img/headerHome/logoUnib.png" alt="unib-icon">
            <h1>Universitas Bengkulu</h1>
        </div>
        <a href="/logout">Log Out</a>
    </header>

    <!--
    * ---------------------------------------------------------------------------------
    * Konten dan navbar
    * ---------------------------------------------------------------------------------
    -->
    <?= $this->include('templates/navbarAdmin'); ?>

    <!--
        * ---------------------------------------------------------------------------------
        * Masukkan konten dibawah dengan fungsi $this->renderSection('nama-konten')
        * ---------------------------------------------------------------------------------
        -->
    <?= $this->renderSection('kontenAdmin') ?>


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
            <a href="/beranda">Beranda</a>
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