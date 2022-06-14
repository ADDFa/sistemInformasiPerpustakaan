<?php

namespace App\Controllers;

use App\Models\User_model;

class Login extends BaseController
{
    public function __construct()
    {
        $this->user = new User_model();
    }

    /*
    * -------------------------------------------------------------------------------------
    * Method untuk melihat siapa yang sedang login
    * -------------------------------------------------------------------------------------
    */
    public function user($data)
    {
        switch ($data) {
            case '0':
                return redirect()->to('/username');
                break;

            case '1':
                return redirect()->to('/beranda');
                break;

            case '2':
                return redirect()->to('/beranda');
                break;

            default:
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Halaman Tidak Ditemukan');
                break;
        }
    }

    /*
    * -------------------------------------------------------------------------------------
    * Halaman login
    * -------------------------------------------------------------------------------------
    */
    public function halamanLogin()
    {
        $data = [
            'judul' => 'Login | Perpus FT UNIB',

            'style' => [
                'templates/template',
                'templates/cssReset',
                'login'
            ],

            'script' => [
                'flash/sweetalert2.all.min',
                'login',
                'templates/templateSwal'
            ]
        ];

        //  Cek apakah admin sudah login atau belum
        if (session()->get('login')) {
            return $this->user(session()->get('status'));
        }

        return view('login', $data);
    }

    /*
    * -------------------------------------------------------------------------------------
    * Method untuk registrasi
    * -------------------------------------------------------------------------------------
    */
    public function register()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $konfirmasi = $this->request->getPost('konfirmasiPassword');

        // cek apakah user telah menekan tombol login atau belum
        $register = $this->request->getPost('register');
        if (isset($register)) {
            // cek apakah username telah terdaftar atau belum
            if (!$this->user->where('username', $username)->find()) {
                // cek apakah password dan konfirmasi password telah sesuai atau belum
                if ($password == $konfirmasi) {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $data = [
                        'username' => $username,
                        'password' => $password
                    ];

                    // masukkan data kedalam tabel user
                    $this->user->insert($data);

                    // cek pakah user sudah menjadi anggota atau belum
                    // jika belum maka tambahkan data baru di tabel anggota
                    $dataAnggota = [
                        'npm' => $username,
                        'nama' => $this->request->getPost('nama'),
                        'programStudi' => $this->request->getPost('programStudi')
                    ];

                    if (!isset($this->anggota->where('npm', $username)->find()[0])) {
                        $this->anggota->insert($dataAnggota);
                    } else {
                        // jika sudah maka update data yang ada
                        $id = $this->anggota->where('npm', $username)->find()[0]['id'];
                        $this->anggota->update($id, $dataAnggota);
                    }

                    return redirect()->to('/login');
                } else {
                    session()->setFlashdata(['info' => 'Password dan Konfirmasi password tidak sama!', 'title' => 'Registrasi Gagal']);

                    return redirect()->to('/login');
                }
            } else {
                session()->setFlashdata(['info' => 'username telah terdaftar!', 'title' => 'Registrasi Gagal']);

                return redirect()->to('/login');
            }
        }
    }

    /*
    * -------------------------------------------------------------------------------------
    * Method untuk mengecek keberhasilan login
    * -------------------------------------------------------------------------------------
    */
    public function cekLogin()
    {
        // Cek apakah tombol login sudah ditekan atau belum
        if (isset($this->request->getPost()['login'])) {
            // Ambil data dari form login
            $username = strtolower($this->request->getPost()['username']);
            $password = $this->request->getPost()['password'];

            //  Ambil data dari database
            $dataUser = $this->user->find($username);

            // Cek apakah username terdaftar atau tidak
            // Jika tidak. Ada kemungkinan username yang dimasukkan salah
            if ($dataUser) {
                // Cek apakah password yang dimasukkan benar atau tidak
                if (password_verify($password, $dataUser['password'])) {
                    session()->set('login', true);
                    session()->set('status', $dataUser['status']);

                    return $this->user($dataUser['status']);
                } else {
                    session()->setFlashdata(['info' => 'Password Salah!', 'title' => 'Gagal Login']);

                    return redirect()->to('/login');
                }
            } else {
                session()->setFlashdata(['info' => 'Username Salah!', 'title' => 'Gagal Login']);

                return redirect()->to('/login');
            }
        } else {
            return redirect()->to('/login');
        }
    }

    /*
    * -------------------------------------------------------------------------------------
    * Method untuk logout admin
    * -------------------------------------------------------------------------------------
    */
    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}
