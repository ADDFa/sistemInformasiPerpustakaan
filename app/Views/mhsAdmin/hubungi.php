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
* Halaman kontak
* ---------------------------------------------------------------------------------
-->

<div class="kontak">
    <!--
    * ---------------------------------------------------------------------------------
    * Tentang kami
    * ---------------------------------------------------------------------------------
    -->
    <div class="tentang-kami">
        <h1>Tentang Kami</h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis doloremque harum voluptatibus quasi, placeat perspiciatis dolores? Soluta iure, nisi error dicta beatae voluptatibus, consequatur eveniet aperiam necessitatibus culpa dolorem. Illum, iste est suscipit molestiae cum at quas perspiciatis non debitis repudiandae alias. Minus odio aperiam nihil laudantium sint facere eaque quas soluta explicabo. Labore quam optio placeat neque. Vel autem corporis aliquid nemo. Quae enim dignissimos delectus dolor numquam vel unde autem saepe, at maxime, animi ad explicabo maiores illum laudantium id doloremque rem veritatis a ut aspernatur incidunt facere nisi! Enim nostrum explicabo consequuntur tempora corporis repudiandae deserunt quidem.
        </p>

        <div class="info">
            <ul>
                <li>
                    <a href="https://goo.gl/maps/U4ZZEpbsAtV3EwTV7">
                        <img src="/img/kontak/lokasi.png" alt="lokasi">
                        <p>Jl. Jl. W.R Supratman, Kandang Limun, Bengkulu 38371A INDONESIA</p>
                    </a>
                </li>

                <li>
                    <a href="/contact">
                        <img src="img/kontak/email.png" alt="email">
                        <p>perpusftunib@gmail.com</p>
                    </a>
                </li>

                <li>
                    <a href="https://api.whatsapp.com/send?phone=6282374632340">
                        <img src="/img/kontak/whatsapp.png" alt="whatsapp">
                        <p>08xx xxxx xxxx</p>
                    </a>
                </li>
            </ul>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.2311664666004!2d102.27025531407007!3d-3.7597902443840554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e36b1c18941d9f3%3A0x1aecc8afb80fdf02!2sUniversitas%20Bengkulu!5e0!3m2!1sid!2sid!4v1639017754669!5m2!1sid!2sid" loading="lazy"></iframe>
        </div>
    </div>


    <!--
    * ---------------------------------------------------------------------------------
    * Hubungi kami
    * ---------------------------------------------------------------------------------
    -->
    <div class="hubungi-kami">
        <h1>Hubungi Kami</h1>
        <form action="/User/kirimPesan" method="POST">
            <?php csrf_field() ?>
            <ul>
                <li>
                    <label for="nama">Nama Anda</label>
                    <input type="text" name="nama" id="nama" required autocomplete="off">
                </li>

                <li>
                    <label for="email">Email Anda</label>
                    <input type="email" name="email" id="email" required autocomplete="off">
                </li>

                <li>
                    <label for="subjek">Subjek</label>
                    <input type="text" name="subjek" id="subjek" autocomplete="off">
                </li>

                <li>
                    <label for="pesan">Pesan</label>
                    <textarea name="pesan" id="pesan" cols="30" rows="3" required autocomplete="off"></textarea>
                </li>

                <li>
                    <button type="submit" name="kirim" data-berhasil="<?= session('berhasil') ?>">Kirim</button>
                </li>
            </ul>
        </form>
    </div>
</div>


<!--
* ---------------------------------------------------------------------------------
* Konten ditutup / akhir
* ---------------------------------------------------------------------------------
-->
<?php $this->endSection() ?>