<?php

namespace App\Controllers;

class User extends BaseController
{
    public function home()
    {
        /*
        * -------------------------------------------------------------------------------------
        * Tampung data di variabel $data
        * -------------------------------------------------------------------------------------
        */
        $data = [
            'judul' => 'Home | Perpus FT UNIB',

            'style' => [
                'templates/cssReset',
                'mahasiswa/home'
            ],

            'script' => [],

            'buku' => ['ai', 'sejarahKebudIndonesia', 'dasarKonstruksi', 'pkn', 'matematikaDiskret', 'linux', 'kewirausahaan', 'kalkulusDasar']
        ];

        return view('mahasiswa/home', $data);
    }

    /* 
    * ------------------------------------------------------------------------------------
    * Halaman cari buku
    * ------------------------------------------------------------------------------------
    */
    public function cariBuku()
    {
        $data = [
            'judul' => 'Search | Perpus FT UNIB',

            'style' => [
                'templates/template',
                'mahasiswa/cariBuku',
                'templates/cssReset'
            ],

            'script' => [
                'flash/sweetalert2.all.min',
                'mahasiswa/cariBuku',
                'templates/templateSwal'
            ],

            'book' => [
                'ai', 'cpp', 'linux', 'matematikaDiskret', 'programmer', 'python'
            ]
        ];

        return view('mahasiswa/cariBuku', $data);
    }


    /* 
    * ------------------------------------------------------------------------------------
    * Method pencarian buku
    * ------------------------------------------------------------------------------------
    */
    public function cari()
    {
        // Tangkap kata kunci pencarian
        $keyword = $this->request->getPost()['searchBook'];

        // Cek apakah mahasiswa mencari melalui input atau tidak        
        if (isset($this->request->getPost()['search']) && $keyword) {
            // Hubungkan ke database            
            $db = \Config\Database::connect();

            // Ambil data dari database berdasarkan kata kunci            
            $dataBuku = $db->query(
                "SELECT * FROM book WHERE
                judul LIKE '%$keyword%' OR
                subjudul LIKE '%$keyword%' OR
                isbn LIKE '%$keyword%' OR
                penulis LIKE '%$keyword%' OR
                editor LIKE '%$keyword%' OR
                penerbit LIKE '%$keyword%' OR
                kotaTerbit LIKE '%$keyword%' OR
                subjek LIKE '%$keyword%' OR
                asalBuku LIKE '%$keyword%'
                "
            );

            // Fetch data buku            
            $dataBuku = $dataBuku->getResultArray();

            if ($dataBuku) {
                // Tampung data di variabel $data            
                $data = [
                    'judul' => 'Search | Perpus FT UNIB',

                    'style' => [
                        'templates/template',
                        'mahasiswa/cariBuku',
                        'templates/cssReset'
                    ],

                    'script' => [],

                    'dataBuku' => $dataBuku
                ];

                // Tampilkan halaman pencarian dan kirimkan data            
                return view('mahasiswa/cariBuku', $data);
            } else {
                // Jika buku tidak ditemukan, kembalikan ke halaman pencarian dan beri feedback                
                session()->setFlashdata(['hasil' => 'Buku tidak ditemukan']);

                return redirect()->to('cariBuku');
            }
        } else {
            return redirect()->to('cariBuku');
        }
    }

    /* 
    * ------------------------------------------------------------------------------------
    * Halaman detail
    * ------------------------------------------------------------------------------------
    */
    public function detail($id)
    {
        $data = [
            'judul' => 'Hubungi Kami | Perpus FT UNIB',

            'style' => [
                'templates/template',
                'templates/cssReset',
                'mahasiswa/detail'
            ],

            'script' => [],

            'dataBuku' => $this->buku->find($id)
        ];

        return view('mahasiswa/detail', $data);
    }

    /* 
    * ------------------------------------------------------------------------------------
    * Halaman kontak
    * ------------------------------------------------------------------------------------
    */
    public function hubungi()
    {
        // Tampung data di variabel $data
        $data = [
            'judul' => 'Hubungi Kami | Perpus FT UNIB',

            'style' => [
                'templates/template',
                'mhsAdmin/hubungi',
                'templates/cssReset'
            ],

            'script' => [
                'flash/sweetalert2.all.min',
                'mhsAdmin/hubungi',
                'templates/templateSwal'
            ]
        ];

        return view('mhsAdmin/hubungi', $data);
    }

    /* 
    * ------------------------------------------------------------------------------------
    * Method untuk mengirimkan kontak dari user ke admin
    * ------------------------------------------------------------------------------------
    */
    public function kirimPesan()
    {
        // Ambil input pesan dari user
        if (isset($this->request->getPost()['kirim'])) {
            $data = [
                'nama' => $this->request->getPost()['nama'],
                'email' => $this->request->getPost()['email'],
                'subjek' => $this->request->getPost()['subjek'],
                'pesan' => $this->request->getPost()['pesan'],
                'keterangan' => 'belumDibaca'
            ];

            // Masukkan pesan kedalam database dan kembalikan ke halaman contact
            // Berikan feedback pesan berhasil dikirimkan
            $this->pesan->insert($data);

            session()->setFlashdata(['berhasil' => 'Pesan berhasil terkirim']);
            return redirect()->to('hubungi');
        } else {
            echo 'gagal mengirim pesan';
        };
    }

    /* 
    * ------------------------------------------------------------------------------------
    * Halaman daftar buku
    * ------------------------------------------------------------------------------------
    */
    public function daftarBuku()
    {
        // Ambil data dari dalam database
        $daftarBuku = $this->buku->findAll();

        $data = [
            'judul' => 'Daftar Buku | Perpus FT UNIB',

            'style' => [
                'templates/template',
                'mhsAdmin/daftarBuku',
                'templates/cssReset'
            ],

            'script' => [],

            'daftarBuku' => $daftarBuku
        ];

        return view('mhsAdmin/daftarBuku', $data);
    }
}
