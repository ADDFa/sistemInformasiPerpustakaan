<?php $this->extend('templates/template') ?>

<?php $this->section('konten') ?>
<!--
* ---------------------------------------------------------------------------------
* Halaman login
* ---------------------------------------------------------------------------------
-->
<section class="login">
    <div class="text">
        <h1>WELCOME</h1>
        <p>Selamat datang di Perpustakaan Fakultas Teknik Universitas Bengkulu, Silakan kepada pengunjung untuk dapat mengisi Username dan Password terlebih dahulu</p>
    </div>

    <div class="formLogin">
        <form action="/Login/cekLogin" method="post">
            <?php csrf_field() ?>
            <h1 data-info="<?= session('info') ?>" data-title="<?= session('title') ?>">Sign In to Perpus<br>FT UNIB</h1>
            <ul>
                <li>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off">
                </li>

                <li>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off">
                </li>

                <li>
                    <button type="submit" name="login">Sign In</button>
                </li>
            </ul>
        </form>

        <div>
            <!-- <span>Belum punya akun?</span> -->
            <!-- <span>Register disini</span> -->
        </div>
    </div>
</section>

<?php $this->endSection() ?>