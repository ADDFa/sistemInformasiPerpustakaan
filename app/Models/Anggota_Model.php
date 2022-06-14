<?php

namespace App\Models;

use CodeIgniter\Model;

class Anggota_Model extends Model
{
    protected $table = 'anggota';
    protected $allowedFields = ['nama', 'npm', 'programStudi', 'alamat', 'email'];
}
