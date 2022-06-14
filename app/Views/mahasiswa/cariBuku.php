<!--
* ---------------------------------------------------------------------------------
* Masukkan template dengan fungsi $this->extend('lokasiFolder/namaFile')
* ---------------------------------------------------------------------------------
-->
<?php $this->extend('templates/template') ?>


<!--
* ---------------------------------------------------------------------------------
* Konten dibuka / dimulai
* ---------------------------------------------------------------------------------
-->
<?php $this->section('konten') ?>

<section class="search-book">
    <!--
    * ---------------------------------------------------------------------------------
    * Form pencarian
    * ---------------------------------------------------------------------------------
    -->
    <h1>Online Public Access Catalog (OPAC)</h1>

    <form action="cari" method="POST">
        <?php csrf_field() ?>
        <div class="search">
            <input type="text" name="searchBook" autocomplete="off" placeholder="Cari Berdasarkan Judul Buku | Sub Judul | Pengarang | Penerbit | Dan lainnya" id="keyword" data-info="<?= session('hasil') ?>">
            <button type="submit" name="search">
                <img src="/img/search/search.png" alt="search" id="searchBook">
            </button>
        </div>
    </form>


    <!--
    * ---------------------------------------------------------------------------------
    * Gambar - gambar buku
    * ---------------------------------------------------------------------------------
    -->
    <div class="book">
        <?php if (isset($book)) : ?>
            <?php foreach ($book as $db) : ?>
                <a href="">
                    <img src="/img/search/<?= $db ?>.jpg" alt="<?= $db ?>">
                </a>
            <?php endforeach ?>
        <?php endif ?>
    </div>


    <!--
    * ---------------------------------------------------------------------------------
    * Tampilan hasil pencarian buku
    * ---------------------------------------------------------------------------------
    -->
    <?php if (isset($dataBuku)) : ?>
        <div class="dataBukuDicari">
            <ul>
                <?php foreach ($dataBuku as $d) : ?>
                    <li>
                        <img src="/img/buku/<?= $d['gambar'] ?>" alt="<?= $d['gambar'] ?>">
                        <div class="info">
                            <h5><?= $d['judul'] ?></h5>
                            <p><?= $d['penulis'] ?></p>
                            <p><?= $d['penerbit'] ?></p>
                            <p><?= $d['seri'] ?></p>
                            <a href="/detail/<?= $d['id'] ?>">Detail</a>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>
</section>


<!--
* ---------------------------------------------------------------------------------
* Konten ditutup / akhir
* ---------------------------------------------------------------------------------
-->
<?php $this->endSection() ?>