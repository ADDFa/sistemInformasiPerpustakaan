<?php

namespace App\Models;

use CodeIgniter\Model;

class Book_Model extends Model
{
    protected $table = 'book';
    protected $allowedFields = [
        'judul',
        'subjudul',
        'isbn',
        'bahasa',
        'penulis',
        'editor',
        'edisiCetakan',
        'penerbit',
        'kotaTerbit',
        'tahunTerbit',
        'subjek',
        'seri',
        'asalBuku',
        'gambar',
        'jumlah'
    ];
}
