<?php $this->extend('templates/template') ?>

<?php $this->section('konten') ?>
<section class="daftar-buku-perpusFT">
    <div class="header">
        <h1>Daftar Buku Perpustakaan Fakultas Teknik Universitas Bengkulu</h1>
        <a href="/cariBuku">Kembali</a>
    </div>

    <table>
        <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun terbit</th>
            <th>Kota Terbit</th>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($daftarBuku as $d) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $d['judul'] ?></td>
                    <td><?= $d['penulis'] ?></td>
                    <td><?= $d['penerbit'] ?></td>
                    <td><?= $d['tahunTerbit'] ?></td>
                    <td><?= $d['kotaTerbit'] ?></td>
                </tr>
                <?php $i++ ?>
            <?php endforeach ?>
        </tbody>
    </table>
</section>
<?php $this->endSection() ?>