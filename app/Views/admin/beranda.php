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
* Halaman beranda admin
* ---------------------------------------------------------------------------------
-->
<div class="beranda">
    <div class="jumlahBuku">
        <img src="/img/adminBeranda/books.png" alt="jumlah-buku">
        <p><?= $jumlahData['totalBuku'] ?> Jumlah Buku</p>
        <a href="/dataBuku/1">
            <img src="/img/adminBeranda/moreThan.png" alt="Selengkapnya">
            <p>Selengkapnya</p>
        </a>
    </div>

    <div class="jumlahAnggota">
        <img src="/img/adminBeranda/members.png" alt="jumlah-buku">
        <p><?= $jumlahData['totalAnggota'] ?> Jumlah Anggota</p>
        <a href="/anggota">
            <img src="/img/adminBeranda/moreThan.png" alt="Selengkapnya">
            <p>Selengkapnya</p>
        </a>
    </div>

    <div class="bukuDipinjam">
        <img src="/img/adminBeranda/borrowBook.png" alt="jumlah-buku">
        <p><?= $jumlahData['totalBukuDipinjam'] ?> Buku Dipinjam</p>
        <a href="/pinjamKembali">
            <img src="/img/adminBeranda/moreThan.png" alt="Selengkapnya">
            <p>Selengkapnya</p>
        </a>
    </div>

    <div class="bukuDikembalikan">
        <img src="/img/adminBeranda/returnBook.png" alt="jumlah-buku">
        <p><?= $jumlahData['totalBukuDikembalikan'] ?> Buku Dikembalikan</p>
        <a href="/pinjamKembali">
            <img src="/img/adminBeranda/moreThan.png" alt="Selengkapnya">
            <p>Selengkapnya</p>
        </a>
    </div>
</div>
</section>

<!--
* ---------------------------------------------------------------------------------
* Konten ditutup / akhir
* ---------------------------------------------------------------------------------
-->
<?= $this->endSection() ?>