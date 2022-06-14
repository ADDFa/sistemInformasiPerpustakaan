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


<!--
* ---------------------------------------------------------------------------------
* Halaman detail buku
* ---------------------------------------------------------------------------------
-->
<section class="detail-buku">
    <div>
        <a href="/cariBuku">Kembali</a>
    </div>

    <ul>
        <li>
            <label for="judul">Judul : </label>
            <input type="text" id="judul" disabled value="<?= strtoupper($dataBuku['judul']) ?>">
        </li>

        <li>
            <label for="subJudul">Sub Judul : </label>
            <input type="text" id="subJudul" disabled value="<?= strtoupper($dataBuku['subJudul']) ?>">
        </li>

        <li>
            <label for="isbn">ISBN : </label>
            <input type="text" id="isbn" disabled value="<?= strtoupper($dataBuku['isbn']) ?>">
        </li>

        <li>
            <label for="bahasa">Bahasa : </label>
            <input type="text" id="bahasa" disabled value="<?= strtoupper($dataBuku['bahasa']) ?>">
        </li>

        <li>
            <label for="penulis">Penulis : </label>
            <input type="text" id="penulis" disabled value="<?= strtoupper($dataBuku['penulis']) ?>">
        </li>

        <li>
            <label for="editor">Editor : </label>
            <input type="text" id="editor" disabled value="<?= strtoupper($dataBuku['editor']) ?>">
        </li>

        <li>
            <label for="edisiCetakan">Edisi Cetakan : </label>
            <input type="text" id="edisiCetakan" disabled value="<?= strtoupper($dataBuku['edisiCetakan']) ?>">
        </li>

        <li>
            <label for="penerbit">Penerbit : </label>
            <input type="text" id="penerbit" disabled value="<?= strtoupper($dataBuku['penerbit']) ?>">
        </li>

        <li>
            <label for="kotaTerbit">Kota Terbit : </label>
            <input type="text" id="kotaTerbit" disabled value="<?= strtoupper($dataBuku['kotaTerbit']) ?>">
        </li>

        <li>
            <label for="tahunTerbit">Tahun Terbit : </label>
            <input type="text" id="tahunTerbit" disabled value="<?= strtoupper($dataBuku['tahunTerbit']) ?>">
        </li>

        <li>
            <label for="subjek">Subjek : </label>
            <input type="text" id="subjek" disabled value="<?= strtoupper($dataBuku['subjek']) ?>">
        </li>

        <li>
            <label for="seri">Seri : </label>
            <input type="text" id="seri" disabled value="<?= strtoupper($dataBuku['seri']) ?>">
        </li>

        <li>
            <label for="asalBuku">Asal Buku : </label>
            <input type="text" id="asalBuku" disabled value="<?= strtoupper($dataBuku['asalBuku']) ?>">
        </li>
    </ul>

    <div class="gambar-buku">
        <img src="/img/buku/<?= $dataBuku['gambar'] ?>" alt="<?= $dataBuku['gambar'] ?>">
    </div>
</section>


<!--
* ---------------------------------------------------------------------------------
* Konten ditutup / akhir
* ---------------------------------------------------------------------------------
-->
<?php $this->endSection() ?>