<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamKembali_Model extends Model
{
    protected $table = 'pinjamkembali';
    protected $allowedFields = ['judul', 'kodeBuku', 'npm', 'jumlah', 'total', 'tanggal', 'idBuku', 'idMhs', 'denda', 'status'];
}
