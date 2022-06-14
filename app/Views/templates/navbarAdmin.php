<section class="content">
    <div class="sidebar">
        <div class="side-title">
            <img src="/img/logoPerpusFt.png" alt="perpusFT-logo">
            <p>PERPUSTAKAAN<br>FT UNIB</p>
        </div>

        <!--
            * ---------------------------------------------------------------------------------
            * Navbar admin
            * ---------------------------------------------------------------------------------
            -->
        <nav class="side-content">
            <ul>
                <li>
                    <a href="/Admin/beranda" data-aktif="beranda">
                        <img src="/img/adminSidebar/home.png" alt="home">
                        <p>Beranda</p>
                    </a>
                </li>


                <li>
                    <a href="/dataBuku/1" data-aktif="1">
                        <img src="/img/adminSidebar/book.png" alt="input-book">
                        <p>Data Buku</p>
                    </a>
                </li>

                <li>
                    <a href="/anggota" data-aktif="anggota">
                        <img src="/img/adminSidebar/anggota.png" alt="anggota">
                        <p>Anggota</p>
                    </a>
                </li>

                <li>
                    <a href="/kartuAnggota" data-aktif="kartuAnggota">
                        <img src="/img/adminSidebar/kartuAnggota.png" alt="membership-card">
                        <p>Kartu Anggota</p>
                    </a>
                </li>

                <li>
                    <a href="/pinjamKembali" data-aktif="pinjamKembali">
                        <img src="/img/adminSidebar/pinjamKembaliBuku.png" alt="return-the-book">
                        <p>Pinjam Kembali Buku</p>
                    </a>
                </li>

                <?php if (session('status') == 2) : ?>
                    <li>
                        <a href="/laporan" data-aktif="laporan">
                            <img src="/img/adminSidebar/laporan.png" alt="return-the-book">
                            <p>Laporan</p>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
    </div>