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
* Tabel buku
* ---------------------------------------------------------------------------------
-->
<div class="buku" data-title="<?= session('title') ?>" data-info="<?= session('info') ?>" data-icon="<?= session('icon') ?>">
    <h1>Daftar Buku Perpustakaan FT UNIB</h1>
    <button class="tambah">
        <img src="/img/icon/plus.png" alt="tambah">
        <p>Tambah</p>
    </button>

    <div class="halaman"></div>

    <div class="daftarBuku">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $server = explode('/', $_SERVER["REQUEST_URI"])[2] ?>
                <?php ($server) == 1 ? $i = 1 : $i = ($server - 1) * 10 + 1 ?>
                <?php foreach ($dataBuku as $d) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $d['judul'] ?></td>
                        <td><?= $d['penulis'] ?></td>
                        <td><?= $d['penerbit'] ?></td>
                        <td><?= $d['tahunTerbit'] ?></td>
                        <td data-buku="<?= $d['judul'] . '--pisah--' . $d['subJudul'] . '--pisah--' . $d['isbn'] . '--pisah--' . $d['bahasa'] . '--pisah--' . $d['penulis'] . '--pisah--' . $d['editor'] . '--pisah--' . $d['edisiCetakan'] . '--pisah--' . $d['penerbit'] . '--pisah--' . $d['kotaTerbit']  . '--pisah--' . $d['tahunTerbit'] . '--pisah--' . $d['subjek'] . '--pisah--' . $d['seri'] . '--pisah--' . $d['asalBuku'] . '--pisah--' . $d['jumlah'] ?>" class="data-buku">

                            <a class="detail">
                                <img src="/img/icon/info.png" alt="Detail">
                            </a>

                            <a class="ubah" data-id="<?= $d['id'] ?>">
                                <img src="/img/icon/pencil.png" alt="Ubah">
                            </a>

                            <a class="hapus" data-uriHapus="/Admin/deleteBuku/<?= $server . '/' . $d['id'] ?>">
                                <img src="/img/icon/remove.png" alt="Delete">
                            </a>
                            <a href="/Admin/deleteBuku/<?= $server . '/' . $d['id'] ?>" style="display: none;"></a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!--
    * ---------------------------------------------------------------------------------
    * Popup tambah anggota
    * ---------------------------------------------------------------------------------
    -->
    <div class="form formToggle">
        <form action="/inputBuku/<?= explode('/', $_SERVER["REQUEST_URI"])[2] ?>" method="POST" enctype="multipart/form-data">
            <?php csrf_field() ?>
            <ul>
                <li>
                    <img src="/img/icon/close.png" alt="close">
                </li>

                <li>
                    <label for="title">Judul</label>
                    <input type="text" name="title" id="title" autocomplete="off" required>
                </li>

                <li>
                    <label for="subJudul">Sub Judul</label>
                    <input type="text" name="subJudul" id="subJudul" autocomplete="off">
                </li>

                <li>
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" id="isbn" autocomplete="off">
                </li>

                <li>
                    <label for="bahasa">Bahasa</label>
                    <input type="text" name="bahasa" id="bahasa" autocomplete="off">
                </li>

                <li>
                    <label for="penulis">Penulis</label>
                    <input type="text" name="penulis" id="penulis" autocomplete="off" required>
                </li>

                <li>
                    <label for="editor">Editor</label>
                    <input type="text" name="editor" id="editor" autocomplete="off">
                </li>

                <li>
                    <label for="edisiCetakan">Edisi Cetakan</label>
                    <input type="text" name="edisiCetakan" id="edisiCetakan" autocomplete="off">
                </li>

                <li>
                    <label for="penerbit">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" autocomplete="off" required>
                </li>

                <li>
                    <label for="kotaTerbit">Kota Terbit</label>
                    <input type="text" name="kotaTerbit" id="kotaTerbit" autocomplete="off" required>
                </li>

                <li>
                    <label for="tahunTerbit">Tahun Terbit</label>
                    <input type="text" name="tahunTerbit" id="tahunTerbit" autocomplete="off" required>
                </li>

                <li>
                    <label for="subjek">Subjek</label>
                    <input type="text" name="subjek" id="subjek" autocomplete="off">
                </li>

                <li>
                    <label for="seri">Seri</label>
                    <input type="text" name="seri" id="seri" autocomplete="off">
                </li>

                <li>
                    <label for="asalBuku">Asal Buku</label>
                    <input type="text" name="asalBuku" id="asalBuku" autocomplete="off">
                </li>

                <li>
                    <label for="jumlahBuku">Jumlah Buku</label>
                    <input type="number" name="jumlahBuku" id="jumlahBuku" autocomplete="off">
                </li>

                <li class="input-file">
                    <input class="nama-file" value="Input Gambar Buku" type="text" disabled>
                    <p>Pilih File</p>
                    <input type="file" name="gambarBuku">
                </li>

                <li>
                    <button type="submit" class="simpanBuku none" name="simpan">SIMPAN</button>
                </li>
            </ul>
        </form>
    </div>

    <!--
    * ---------------------------------------------------------------------------------
    * Popup detail anggota
    * ---------------------------------------------------------------------------------
    -->
    <div class="aksi-buku" data-detail="<?= (isset($detail)) ? $detail : '' ?>"></div>
</div>
</section>

<!--
* ---------------------------------------------------------------------------------
* Konten ditutup / akhir
* ---------------------------------------------------------------------------------
-->
<?= $this->endSection() ?>