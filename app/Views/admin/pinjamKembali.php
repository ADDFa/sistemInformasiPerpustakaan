<!--
* ---------------------------------------------------------------------------------
* Masukkan template dengan fungsi $this->extend('lokasiFolder/namaFile')
* ---------------------------------------------------------------------------------
-->
<?php $this->extend('templates/templateAdmin') ?>

<!--
* ---------------------------------------------------------------------------------
* Konten dibuka / dimulai
* ---------------------------------------------------------------------------------
-->
<?= $this->section('kontenAdmin') ?>

<!--
* ---------------------------------------------------------------------------------
* Halaman pinjam kembali buku
* ---------------------------------------------------------------------------------
-->
<div class="buku" data-title="<?= session('title') ?>" data-info="<?= session('info') ?>" data-icon="<?= session('icon') ?>">
    <h1>Daftar Buku Dipinjam</h1>

    <!--
    * ---------------------------------------------------------------------------------
    * Tombol pilihan
    * Apakah akan menampilkan data buku dipinjam atau
    * Menampilkan data buku dikembalikan
    * ---------------------------------------------------------------------------------
    -->
    <div class="tombol-pilih">
        <div class="pinjam-kembali">
            <a>Dipinjamkan</a>
            <a>Dikembalikan</a>
        </div>

        <a class="tambah">
            <p>Tambah Peminjaman</p>
        </a>
    </div>

    <div class="pencarian">
        <form action="/Admin/pinjamKembali" method="POST">
            <label for="keyword">Cari</label>
            <input type="text" name="keyword" id="keyword" placeholder="Cari berdasarkan Judul | Kode Buku">
        </form>
    </div>

    <!--
    * ---------------------------------------------------------------------------------
    * Halaman tambah peminjaman dan pengembalian
    * ---------------------------------------------------------------------------------
    -->
    <div class="tambah-pinjam-kembali" style="display: none;">
        <form action="/Admin/tambahPinjamKembali/pinjam" method="POST">
            <?php csrf_field() ?>
            <ul>
                <li>
                    <img src="/img/icon/close.png" alt="close">
                </li>

                <li>
                    <label for="kodeBuku">Kode Buku</label>
                    <input type="text" name="kodeBuku" id="kodeBuku" autocomplete="off" required>
                </li>

                <li>
                    <label for="npm">NPM Peminjam</label>
                    <input type="text" name="npm" id="npm" autocomplete="off" required>
                </li>

                <li>
                    <label for="tanggal">Tanggal Dipinjam</label>
                    <input type="date" name="tanggal" id="tanggal" autocomplete="off" required>
                </li>

                <li class="total">
                    <label for="total">Total Dipinjam</label>
                    <input type="number" name="total" id="total" autocomplete="off" required>
                </li>

                <li>
                    <button type="submit">Tambahkan</button>
                </li>
            </ul>
        </form>
    </div>

    <!--
    * ---------------------------------------------------------------------------------
    * Tempat daftar buku
    * ---------------------------------------------------------------------------------
    -->
    <div class="daftarBuku">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>NPM Mahasiswa</th>
                    <th>Tanggal</th>
                    <th>Jumlah Buku</th>
                    <th class="total-pinjam-kembali">Total Dipinjam</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody class="daftarBukuDipinjam">
                <?php $i = 1 ?>
                <?php foreach ($bukuDipinjam as $buku) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $buku['judul'] ?></td>
                        <td><?= $buku['npm'] ?></td>
                        <th><?= date('d-M-Y', strtotime($buku['tanggal'])) ?></th>
                        <td><?= $buku['jumlah'] ?> Buah</td>
                        <td><?= $buku['total'] ?> Buah</td>
                        <td>
                            <a href="/Admin/kembalikanBukuDipinjam/<?= $buku['id'] ?>">
                                <img src="/img/icon/return.png" alt="Detail" title="Kembalikan Buku">
                            </a>

                            <a class="hapus" data-uriHapus="/Admin/hapusBukuPinjamKembali/<?= $buku['id'] ?>">
                                <img src="/img/icon/remove.png" alt="Delete">
                            </a>
                            <a href="/Admin/hapusBukuPinjamKembali/<?= $buku['id'] ?>" style="display: none;"></a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </tbody>

            <tbody class="daftarBukuDikembalikan" style="display: none;" id="kembali">
                <?php $j = 1 ?>
                <?php foreach ($bukuDikembalikan as $buku) : ?>
                    <tr>
                        <td><?= $j ?></td>
                        <td><?= $buku['judul'] ?></td>
                        <td><?= $buku['npm'] ?></td>
                        <td><?= date('d-M-Y', strtotime($buku['tanggal'])) ?></td>
                        <td><?= $buku['jumlah'] ?> Buah</td>
                        <td><?= $buku['total'] ?> Buah</td>
                        <td>
                            <a class="hapus" data-uriHapus="/Admin/hapusBukuPinjamKembali/<?= $buku['id'] ?>">
                                <img src="/img/icon/remove.png" alt="Delete">
                            </a>
                            <a href="/Admin/hapusBukuPinjamKembali/<?= $buku['id'] ?>" style="display: none;"></a>
                        </td>
                    </tr>
                    <?php $j++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
</section>

<!--
* ---------------------------------------------------------------------------------
* Konten ditutup / akhir
* ---------------------------------------------------------------------------------
-->
<?= $this->endSection() ?>