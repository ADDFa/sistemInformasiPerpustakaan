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
* Tabel anggota
* ---------------------------------------------------------------------------------
-->
<div class="anggota" data-title="<?= session('title') ?>" data-info="<?= session('info') ?>" data-icon="<?= session('icon') ?>">
    <h1>Daftar Anggota Perpustakaan</h1>
    <button class="tambah">
        <img src="/img/icon/plus.png" alt="tambah">
        <p>Tambah</p>
    </button>

    <div class="daftarAnggota">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Program Studi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($anggota as $a) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $a['nama'] ?></td>
                        <td><?= $a['npm'] ?></td>
                        <td><?= $a['programStudi'] ?></td>
                        <td class="data-anggota" data-anggota="<?= $a['nama'] . '--pisah--' . $a['npm'] . '--pisah--' . $a['programStudi'] . '--pisah--' . $a['alamat'] . '--pisah--' . $a['email'] . '--pisah--' ?>">
                            <a class="detail">
                                <img src="/img/icon/info.png" alt="Detail">
                            </a>

                            <a class="ubah" data-id="<?= $a['id'] ?>">
                                <img src="/img/icon/pencil.png" alt="Ubah">
                            </a>

                            <a class="hapus" data-uriHapus="/Admin/hapusAnggota/<?= $a['id'] ?>">
                                <img src="/img/icon/remove.png" alt="Delete">
                            </a>
                            <a href="/Admin/hapusAnggota/<?= $a['id'] ?>" id="hapus" style="display: none;"></a>
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
        <form action="/Admin/tambahAnggota" method="POST">
            <?php csrf_field() ?>
            <ul>
                <li>
                    <img src="/img/icon/close.png" alt="close">
                </li>

                <li>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" required autocomplete="off">
                </li>

                <li>
                    <label for="npm">NPM</label>
                    <input type="text" id="npm" name="npm" required autocomplete="off">
                </li>

                <li>
                    <label for="programStudi">Program Studi</label>
                    <input type="text" id="programStudi" name="programStudi" required autocomplete="off">
                </li>

                <li>
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" required autocomplete="off">
                </li>

                <li>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required autocomplete="off">
                </li>

                <li>
                    <button type="submit" class="simpanAnggota" name="submit">Simpan</button>
                </li>
            </ul>
        </form>
    </div>
</div>
</section>

<!--
* ---------------------------------------------------------------------------------
* Konten ditutup / akhir
* ---------------------------------------------------------------------------------
-->
<?= $this->endSection() ?>