<?= $this->extend('templates/templateAdmin'); ?>

<?= $this->section('kontenAdmin'); ?>

<!--
* ---------------------------------------------------------------------------------
* Halaman laporan
* ---------------------------------------------------------------------------------
-->

<div class="laporan" id="laporan">
    <h1>JUMLAH PENGUNJUNG PERPUSTAKAAN FAK. TEKNIK<br>SEMESTER Ganjil 2020/2021 (Jan - Juni 2021)</h1>

    <table>
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Program Studi</th>
                <th colspan="5">Jenis Koleksi</th>
            </tr>
            <tr>
                <th>Mahasiswa</th>
                <th>Dosen</th>
                <th>Karyawan</th>
                <th>Umum</th>
                <th>Jumlah</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td>Informatika</td>
                <td>40</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>40</td>
            </tr>

            <tr>
                <td>2</td>
                <td>Sipil</td>
                <td>80</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>80</td>
            </tr>

            <tr>
                <td>3</td>
                <td>Mesin</td>
                <td>14</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>14</td>
            </tr>

            <tr>
                <td>4</td>
                <td>Elektro</td>
                <td>22</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>22</td>
            </tr>

            <tr>
                <td>5</td>
                <td>Sistem Informasi</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>

            <tr>
                <td>6</td>
                <td>Arsitektur</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td></td>
                <td>Jumlah</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>156</td>
            </tr>
        </tfoot>
    </table>

    <button class="print">Print</button>
</div>
</section>

<?= $this->endSection(); ?>