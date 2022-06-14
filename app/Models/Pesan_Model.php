<?php

namespace App\Models;

use CodeIgniter\Model;

class Pesan_Model extends Model
{
    protected $table = 'pesan';
    protected $allowedFields = ['nama', 'email', 'subjek', 'pesan', 'keterangan'];
}
