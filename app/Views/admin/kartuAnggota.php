<!--
* ---------------------------------------------------------------------------------
* Masukkan template dengan fungsi $this->extend('lokasiFolder/namaFile')
* ---------------------------------------------------------------------------------
-->
<?= $this->extend('templates/templateAdmin') ?>

<!--
* ---------------------------------------------------------------------------------
* Konten dibuka / dimulai
* ---------------------------------------------------------------------------------
-->
<?= $this->section('kontenAdmin') ?>

<!--
* ---------------------------------------------------------------------------------
* Halaman kartu anggota
* ---------------------------------------------------------------------------------
-->
<div class="kartu-anggota" data-info="<?= session('info') ?>" data-title="<?= session('title') ?>" data-icon="<?= session('icon') ?>">
    <h1>Kartu Anggota Perpustakaan <br>FT UNIB</h1>

    <div class="kartu">
        <div class="header-kartu">
            <img src="/img/headerHome/logoUnib.png" alt="logo">

            <div>
                <h2>PERPUSTAKAAN FT UNIB</h2>
                <p>KARTU ANGGOTA</p>
            </div>
        </div>

        <form class="konten-kartu" method="POST" action="/Admin/saveKartuAnggota">
            <div class="identitas">
                <input type="text" name="nama" placeholder="NAMA ANGGOTA PERPUSTAKAAN" autocomplete="off">
                <input type="text" name="npm" placeholder="NPM" autocomplete="off">
                <input type="text" name="prodi" placeholder="S1 - TEKNIK INFORMATIKA" autocomplete="off">
            </div>

            <img src="/img/fotoUser/profil.png" alt="Foto User">
            <input type="file" name="fotoProfil">

            <button type="submit" name="simpanKartuAnggota">Tambah Kartu Anggota</button>
        </form>

        <div class="footer-kartu">
            <p>PEMINJAMAN DAN PENGEMBALIAN BUKU MEMERLUKAN KARTU INI</p>
        </div>
    </div>
</div>
</section>

<!--
* ---------------------------------------------------------------------------------
* Konten ditutup / akhir
* ---------------------------------------------------------------------------------
-->
<?= $this->endSection() ?>