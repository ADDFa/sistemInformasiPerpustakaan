<?php

namespace App\Controllers;

use App\Models\KartuAnggota_Model;
use App\Models\PinjamKembali_Model;
use App\Models\Peminjam_Model;

class Admin extends BaseController
{
    // Buat beberapa property yang dibutuhkan
    protected $user, $login, $kartuAnggota, $pinjamKembali, $peminjam;

    public function __construct()
    {
        $this->kartuAnggota = new KartuAnggota_Model();
        $this->pinjamKembali = new PinjamKembali_Model();
    }

    /*
    * -------------------------------------------------------------------------------------
    * Method untuk mengecek apakah admin sudah login atau belum
    * -------------------------------------------------------------------------------------
    */
    public function login($view, $data)
    {
        if (session()->get('login')) {
            return view($view, $data);
        } else {
            return redirect()->to('/login');
        }
    }

    /*
    * -------------------------------------------------------------------------------------
    * Halaman beranda admin
    * -------------------------------------------------------------------------------------
    */
    public function beranda()
    {
        // Ambil data dari database
        $totalAnggota = count($this->anggota->findAll());
        $totalBuku = count($this->buku->findAll());
        $totalBukuDipinjam = count($this->pinjamKembali->where('status', 'pinjam')->findAll());
        $totalBukuDikembalikan = count($this->pinjamKembali->where('status', 'kembali')->findAll());

        $jumlahData = [
            'totalAnggota' => $totalAnggota,
            'totalBuku' => $totalBuku,
            'totalBukuDipinjam' => $totalBukuDipinjam,
            'totalBukuDikembalikan' => $totalBukuDikembalikan
        ];

        // Tampung data di variabel $data
        $data = [
            'judul' => 'Beranda | Perpus FT UNIB',

            'style' => [
                'templates/templateAdmin',
                'admin/beranda',
                'templates/cssReset'
            ],

            'script' => [
                'templates/template'
            ],

            'jumlahData' => $jumlahData
        ];

        return $this->login('admin/beranda', $data);
    }

    /*
    * -------------------------------------------------------------------------------------
    * Halaman data buku
    * Method untuk mengambil data buku
    * -------------------------------------------------------------------------------------
    */
    public function getDataBuku($halamanAktif)
    {
        // Hitung jumlah data per halaman
        $jumlahData = count($this->buku->findAll());
        $jumlahHalaman = ceil($jumlahData / 7);

        $dataAwal = (7 * $halamanAktif) - 7;

        $data = [$this->buku->findAll(7, $dataAwal), $jumlahHalaman];

        return $data;
    }


    public function dataBuku($x)
    {
        $data = [
            'judul' => 'Data Buku Admin | Perpus FT UNIB',

            'style' => [
                'templates/templateAdmin',
                'templates/cssReset',
                'admin/dataBuku'
            ],

            'script' => [
                'flash/sweetalert2.all.min',
                'admin/dataBuku',
                'templates/template',
                'templates/templateSwal'
            ],

            'jumlahHalaman' => $this->getDataBuku($x)[1],

            'dataBuku' => $this->getDataBuku($x)[0]
        ];

        return $this->login('admin/dataBuku', $data);
    }


    /*
    * -------------------------------------------------------------------------------------
    * Method upload gambar
    * -------------------------------------------------------------------------------------
    */
    public function upload()
    {
        // ambil data-data gambar
        $gambarBuku = $this->request->getFile('gambarBuku');
        $namaFile = explode('.', $gambarBuku->getName());
        $namaFileLama = uniqid($namaFile[0]);
        $ekstensi = $namaFile[1];

        // cek ekstensi gambar valid
        switch ($ekstensi) {
            case 'jpg':
                $namaFileBaru = $namaFileLama . '.jpg';
                break;

            case 'jpeg':
                $namaFileBaru = $namaFileLama . '.jpeg';
                break;

            case 'png':
                $namaFileBaru = $namaFileLama . '.png';
                break;

            default:
                $namaFileBaru = 'Ekstensi Salah';
                break;
        }

        if ($namaFileBaru !== 'Ekstensi Salah') {
            $gambarBuku->move('img/buku', $namaFileBaru);
        }

        return $namaFileBaru;
    }

    /*
    * -------------------------------------------------------------------------------------
    * Method untuk menyimpan buku kedalam database
    * -------------------------------------------------------------------------------------
    */
    public function saveBook($uri)
    {
        // cek apakah ada gambar yang diinput atau tidak
        if ($_FILES['gambarBuku']['error'] != 4) {
            // cek apakah ukuran gambar < 1MB atau tidak
            if ($_FILES['gambarBuku']['size'] > 1000500) {
                session()->setFlashdata(['title' => 'Upload Gagal', 'info' => 'Upload gambar dengan ukuran maks 1MB', 'icon' => 'error']);
                return redirect()->to('/dataBuku/1');
            }

            // cek apakah ekstensi gambar benar atau tidak
            if ($this->upload() === 'Ekstensi Salah') {
                session()->setFlashdata(['title' => 'Upload Gagal', 'info' => 'Upload gambar dengan ekstensi .jpg | .jpeg | .png', 'icon' => 'error']);
                return redirect()->to('/dataBuku/1');
            } else {
                $gambar = $this->upload();
            }
        } else {
            session()->setFlashdata(['title' => 'Upload Gagal', 'info' => 'Upload Gambar Terlebih Dahulu', 'icon' => 'error']);
            return redirect()->to('/dataBuku/1');
        }

        // Cek apakah admin melakukan penambahan buku
        if (isset($this->request->getPost()['simpan'])) {
            // Tampung data dari form input buku
            $jumlahBuku = (int)$this->request->getPost('jumlahBuku');

            $dataBuku = [
                'judul' => $this->request->getPost('title'),
                'subjudul' => $this->request->getPost('subJudul'),
                'isbn' => $this->request->getPost('isbn'),
                'bahasa' => $this->request->getPost('bahasa'),
                'penulis' => $this->request->getPost('penulis'),
                'editor' => $this->request->getPost('editor'),
                'edisiCetakan' => $this->request->getPost('edisiCetakan'),
                'penerbit' => $this->request->getPost('penerbit'),
                'kotaTerbit' => $this->request->getPost('kotaTerbit'),
                'tahunTerbit' => $this->request->getPost('tahunTerbit'),
                'subjek' => $this->request->getPost('subjek'),
                'seri' => $this->request->getPost('seri'),
                'asalBuku' => $this->request->getPost('asalBuku'),
                'jumlah' => $jumlahBuku,
                'gambar' => $gambar
            ];

            $this->buku->insert($dataBuku);
        }

        session()->setFlashdata(['title' => 'Berhasil', 'info' => 'Buku Berhasil Disimpan', 'icon' => 'success']);

        return redirect()->to('/dataBuku/' . $uri);
    }

    /*
    * -------------------------------------------------------------------------------------
    * Method untuk mengubah data buku
    * -------------------------------------------------------------------------------------
    */
    public function updateBuku($halamanAktif, $idBuku, $aksi = null)
    {
        if (isset($this->request->getPost()['simpan'])) {
            // Tampung data dari form input buku
            $dataBuku = [
                'judul' => $this->request->getPost('title'),
                'subjudul' => $this->request->getPost('subJudul'),
                'isbn' => $this->request->getPost('isbn'),
                'bahasa' => $this->request->getPost('bahasa'),
                'penulis' => $this->request->getPost('penulis'),
                'editor' => $this->request->getPost('editor'),
                'edisiCetakan' => $this->request->getPost('edisiCetakan'),
                'penerbit' => $this->request->getPost('penerbit'),
                'kotaTerbit' => $this->request->getPost('kotaTerbit'),
                'tahunTerbit' => $this->request->getPost('tahunTerbit'),
                'subjek' => $this->request->getPost('subjek'),
                'seri' => $this->request->getPost('seri'),
                'asalBuku' => $this->request->getPost('asalBuku'),
                'jumlah' => $this->request->getPost('jumlahBuku')
            ];

            session()->setFlashdata(['title' => 'Berhasil', 'info' => 'Data Berhasil Diubah', 'icon' => 'success']);

            $this->buku->update($idBuku, $dataBuku);

            return redirect()->to('/dataBuku/' . $halamanAktif);
        }
    }

    /*
    * -------------------------------------------------------------------------------------
    * Method untuk menghapus data buku
    * -------------------------------------------------------------------------------------
    */
    public function deleteBuku($halamanAktif, $idBuku)
    {
        $this->buku->delete($idBuku);

        session()->setFlashdata(['title' => 'Berhasil', 'info' => 'Data Berhasil Dihapus', 'icon' => 'success']);

        return redirect()->to('/dataBuku/' . $halamanAktif);
    }

    /*
    * -------------------------------------------------------------------------------------
    * Halaman data anggota perpustakaan
    * -------------------------------------------------------------------------------------
    */
    public function anggota()
    {
        $data = [
            'judul' => 'Anggota | Perpus FT UNIB',

            'style' => [
                'templates/templateAdmin',
                'templates/cssReset',
                'admin/anggota'
            ],

            'script' => [
                'flash/sweetalert2.all.min',
                'admin/anggota',
                'templates/template',
                'templates/templateSwal'
            ],

            'anggota' => $this->anggota->findAll(7, 0)
        ];

        return $this->login('admin/anggota', $data);
    }


    /*
    * -------------------------------------------------------------------------------------
    * Method untuk menambahkan anggota kedalam database
    * -------------------------------------------------------------------------------------
    */
    public function tambahAnggota()
    {
        // Cek apakah admin melakukan penambahan data atau tidak
        if (isset($this->request->getPost()['submit'])) {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'npm' => $this->request->getPost('npm'),
                'programStudi' => $this->request->getPost('programStudi'),
                'alamat' => $this->request->getPost('alamat'),
                'email' => $this->request->getPost('email')
            ];


            // cek apakah anggota sudah terdaftar atau belum
            if (!isset($this->anggota->where('npm', $this->request->getPost('npm'))->find()[0])) {
                session()->setFlashdata(['title' => 'Berhasil Menambahkan', 'info' => 'Mahasiswa Berhasil Ditambahkan', 'icon' => 'success']);

                $this->anggota->insert($data);
            } else {
                session()->setFlashdata(['title' => 'Gagal Menambahkan', 'info' => 'Mahasiswa Telah Terdaftar', 'icon' => 'warning']);
            }
        }

        return redirect()->to('/anggota');
    }

    /*
    * -------------------------------------------------------------------------------------
    * Method untuk menyimpan perubahan data anggota perpustakaan kedalam database
    * -------------------------------------------------------------------------------------
    */
    public function ubahAnggotaSave($id)
    {
        if (isset($this->request->getPost()['submit'])) {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'npm' => $this->request->getPost('npm'),
                'programStudi' => $this->request->getPost('programStudi'),
            ];

            $anggota = [
                'alamat' => $this->request->getPost('alamat'),
                'email' => $this->request->getPost('email')
            ];

            // gabungkan data  anggota
            $anggota = $data + $anggota;
            // ambil id kartu anggota berdasarkan NPM
            $idKartu = $this->kartuAnggota->where('npm', $this->request->getPost('npm'))->find()[0]['id'];

            $this->anggota->update($id, $anggota);
            $this->kartuAnggota->update($idKartu, $data);
        }

        session()->setFlashdata(['title' => 'Berhasil', 'info' => 'Data Berhsil Diubah', 'icon' => 'success']);

        return redirect()->to('/anggota');
    }

    /*
    * -------------------------------------------------------------------------------------
    * Method untuk menghapus data anggota perpustakaan
    * -------------------------------------------------------------------------------------
    */
    public function hapusAnggota($hapusId)
    {
        $npm = $this->anggota->find($hapusId)['npm'];

        $this->anggota->delete($hapusId);

        // cek apakah kartu anggota ada, dan jika ada maka kartu anggota juga dihapus
        if (isset($this->kartuAnggota->where('npm', $npm)->find()[0])) {
            $idKartuAnggota = $this->kartuAnggota->where('npm', $npm)->find()[0]['id'];
            $this->kartuAnggota->delete($idKartuAnggota);
        }

        session()->setFlashdata(['title' => 'Berhasil', 'info' => 'Data Berhasil Dihapus', 'icon' => 'success']);

        return redirect()->to('anggota');
    }

    /*
    * -------------------------------------------------------------------------------------
    * Halaman kartu anggota
    * -------------------------------------------------------------------------------------
    */
    public function kartuAnggota()
    {
        $data = [
            'judul' => 'Kartu Anggota | Perpus FT UNIB',

            'style' => [
                'templates/templateAdmin',
                'templates/cssReset',
                'admin/kartuAnggota'
            ],

            'script' => [
                'flash/sweetalert2.all.min',
                'templates/template',
                'admin/kartuAnggota',
                'templates/templateSwal'
            ]
        ];

        return $this->login('admin/kartuAnggota', $data);
    }

    /*
    * -------------------------------------------------------------------------------------
    * Method untuk menambah kartu anggota
    * -------------------------------------------------------------------------------------
    */
    public function saveKartuAnggota()
    {
        // cek apakah tombol tambah anggota sudah ditekan atau belum
        if (isset($this->request->getPost()['simpanKartuAnggota'])) {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'npm' => $this->request->getPost('npm'),
                'programStudi' => $this->request->getPost('prodi')
            ];

            // cek apakah kartu anggota telah ada atau belum
            // jika belum ada maka tambahkan data baru di tabel kartu anggota
            if (!isset($this->kartuAnggota->where('npm', $this->request->getPost('npm'))->find()[0])) {
                session()->setFlashdata(['title' => 'Berhasil', 'info' => 'Kartu Anggota Berhasil Ditambahkan', 'icon' => 'success']);

                $this->kartuAnggota->insert($data);

                // cek apakah data anggota sudah ada atau belum
                // jika belum maka tambahkan data baru
                if (!isset($this->anggota->where('npm', $this->request->getPost('npm'))->find()[0])) {
                    $this->anggota->insert($data);
                } else {
                    // jika sudah maka update data yang ada
                    $id = $this->anggota->where('npm', $this->request->getPost('npm'))->find()[0]['id'];
                    $this->anggota->update($id, $data);
                }
            } else {
                session()->setFlashdata(['title' => 'Gagal Menambahkan', 'info' => 'Kartu Anggota Telah Ada', 'icon' => 'warning']);
            }
        }

        return redirect()->to('/kartuAnggota');
    }


    /*
    * -------------------------------------------------------------------------------------
    * Halaman pinjam kembali buku
    * -------------------------------------------------------------------------------------
    */
    public function pinjamKembali()
    {
        $bukuDipinjam = $this->pinjamKembali->where('status', 'pinjam')->orderBy('id', 'DESC')->findAll(5, 0);
        $bukuDikembalikan = $this->pinjamKembali->where('status', 'kembali')->orderBy('id', 'DESC')->findAll(5, 0);

        $keyword = $this->request->getPost('keyword');

        if ($keyword) {
            // pencarian untuk data buku dipinjam
            $this->pinjamKembali->like('judul', $keyword);
            $this->pinjamKembali->orLike('kodeBuku', $keyword);
            $this->pinjamKembali->notLike('status', 'kembali');
            $bukuDipinjam = $this->pinjamKembali->get()->getResultArray();

            // pencarian untuk data buku dikembalikan
            $this->pinjamKembali->like('judul', $keyword);
            $this->pinjamKembali->orLike('kodeBuku', $keyword);
            $this->pinjamKembali->notLike('status', 'pinjam');
            $bukuDikembalikan = $this->pinjamKembali->get()->getResultArray();
        }

        $data = [
            'judul' => 'Pinjam Kembali | Perpus FT UNIB',

            'style' => [
                'templates/templateAdmin',
                'templates/cssReset',
                'admin/pinjamKembali'
            ],

            'script' => [
                'flash/sweetalert2.all.min',
                'admin/pinjamKembali',
                'templates/template',
                'templates/templateSwal'
            ],

            'bukuDipinjam' => $bukuDipinjam,

            'bukuDikembalikan' => $bukuDikembalikan
        ];

        return $this->login('admin/pinjamKembali', $data);
    }

    public function tambahPinjamKembali($status)
    {
        // Tangkap data yang dikirimkan
        $kodeBuku = $this->request->getPost('kodeBuku');
        $npm = $this->request->getPost('npm');
        $total = (int)$this->request->getPost('total');
        $tanggal = $this->request->getPost('tanggal');

        // Cek apakah data buku dan npm ada didalam tebel
        if ($this->buku->where('isbn', $this->request->getPost('kodeBuku'))->find() != []) {
            if ($this->kartuAnggota->where('npm', $this->request->getPost('npm'))->find() != []) {
                $dataBuku = $this->buku->where('isbn', $kodeBuku)->find()[0];
                $dataMhs = $this->kartuAnggota->where('npm', $npm)->find()[0];

                $data = [
                    'judul' => $dataBuku['judul'],
                    'kodeBuku' => $kodeBuku,
                    'jumlah' => (int)$dataBuku['jumlah'],
                    'tanggal' => $tanggal,
                    'idBuku' => (int)$dataBuku['id'],
                    'idMhs' => (int)$dataMhs['id'],
                    'npm' => $npm,
                    'total' => $total,
                    'status' => $status
                ];

                $dataBukuDidatabase = $this->pinjamKembali->where(['idMhs' => $dataMhs['id'], 'idBuku' => $dataBuku['id'], 'status' => 'pinjam'])->find();

                // cek apakah mahasiswa dengan id = x sudah meminjam buku tersebut atau belum jika belum, maka tambahkan data kedatabase
                if (empty($dataBukuDidatabase)  && $status === 'pinjam') {
                    // cek apakah jumlah buku dipinjam < julmah buku
                    if ((int)$dataBuku['jumlah'] >= (int)$total) {
                        $this->pinjamKembali->insert($data);
                    } else {
                        session()->setFlashdata(['title' => 'Gagal Menambahkan', 'info' => 'Jumlah buku tidak cukup', 'icon' => 'warning']);

                        return redirect()->to('/pinjamKembali');
                    }
                } elseif ($dataBukuDidatabase !== []) {
                    session()->setFlashdata(['title' => 'Gagal Menambahkan', 'info' => 'Mahasiswa dengan NPM ' . $npm . ' sudah meminjam buku ' . $dataBuku['judul'], 'icon' => 'warning']);

                    return redirect()->to('/pinjamKembali');
                } elseif ($dataBukuDidatabase) {
                    $this->pinjamKembali->insert($data);

                    return redirect()->to('/pinjamKembali');
                } elseif (!empty($dataBukuDidatabase) && $status === 'kembali') {
                    $id = $dataBukuDidatabase[0]['id'];

                    // ambil waktu dipinjam dan dikembalikan
                    $waktuDipinjam = strtotime($this->pinjamKembali->where('id', $id)->find()[0]['tanggal']);
                    $waktuDikembalikan = time() + 3600;

                    // kalkulasikan waktu tersebut diatas untuk mendapatkan hari berlangsungnya pengembalian sejak hari peminjaman
                    $hariDikembalikan = ($waktuDipinjam - $waktuDikembalikan);
                    $hariDikembalikan = (int)floor(abs($hariDikembalikan / 3600) / 24);

                    // lakukan pengkondisian jika pengembalian telah melewati batas peminjaman
                    ((int)$hariDikembalikan > 7) ? $denda = ($hariDikembalikan - 7) * 2000 : $denda = 0;

                    $this->pinjamKembali->update($id, ['status' => 'kembali', 'tanggal' => $tanggal, 'denda' => (float)$denda]);
                } elseif (empty($dataBukuDidatabase) && $status === 'kembali') {
                    session()->setFlashdata(['title' => 'Gagal Menambahkan', 'info' => 'Mahasiswa dengan NPM' . $npm . ' tidak meminjam buku ' . $dataBuku['judul'], 'icon' => 'warning']);

                    return redirect()->to('/pinjamKembali');
                } else {
                    session()->setFlashdata(['title' => 'Gagal Menambahkan', 'info' => 'Kesalahan Tidak Diketahui', 'icon' => 'error']);

                    return redirect()->to('/pinjamKembali');
                }
            } else {
                session()->setFlashdata(['title' => 'Gagal Menambahkan', 'info' => 'Mahasiswa belum memiliki kartu anggota', 'icon' => 'warning']);

                return redirect()->to('/pinjamKembali');
            }
        } else {
            session()->setFlashdata(['title' => 'Gagal Menambahkan', 'info' => 'Data Buku tidak ditemukan', 'icon' => 'warning']);
        }

        return redirect()->to('/pinjamKembali');
    }

    public function kembalikanBukuDipinjam($id)
    {
        // ambil waktu dipinjam dan dikembalikan
        $waktuDipinjam = strtotime($this->pinjamKembali->where('id', $id)->find()[0]['tanggal']);
        $waktuDikembalikan = time() + 3600;

        // kalkulasikan waktu tersebut diatas untuk mendapatkan hari berlangsungnya pengembalian sejak hari peminjaman
        $hariDikembalikan = ($waktuDipinjam - $waktuDikembalikan);
        $hariDikembalikan = (int)floor(abs($hariDikembalikan / 3600) / 24);

        // lakukan pengkondisian jika pengembalian telah melewati batas peminjaman
        ((int)$hariDikembalikan > 7) ? $denda = ($hariDikembalikan - 7) * 2000 : $denda = 0;

        $this->pinjamKembali->update($id, ['status' => 'kembali', 'tanggal' => date('Y-m-d', (time() + 3600)), 'denda' => (float)$denda]);

        // if ();

        session()->setFlashdata(['title' => 'Berhasil', 'info' => 'Buku Telah Dikembalikan', 'icon' => 'success']);

        return redirect()->to('/pinjamKembali');
    }

    public function hapusBukuPinjamKembali($id)
    {
        $status = $this->pinjamKembali->find($id)['status'];

        $this->pinjamKembali->delete($id);

        session()->setFlashdata(['title' => 'Berhasil', 'info' => 'Data Berhasil Dihapus', 'icon' => 'success']);

        if ($status === 'kembali') {
            return redirect()->to('/pinjamKembali#kembali');
        }

        return redirect()->to('/pinjamKembali');
    }

    public function laporan()
    {
        $data = [
            'judul' => 'Laporan | Perpus FT UNIB',

            'style' => [
                'templates/templateAdmin',
                'templates/cssReset',
                'admin/laporan'
            ],

            'script' => [
                'templates/template',
                'admin/laporan'
            ]
        ];

        return $this->login('admin/laporan', $data);
    }
}
