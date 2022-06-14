<?php

namespace App\Models;

use CodeIgniter\Model;

class KartuAnggota_Model extends Model
{
    protected $table = 'kartuAnggota';
    protected $allowedFields = ['nama', 'npm', 'programStudi'];
}
