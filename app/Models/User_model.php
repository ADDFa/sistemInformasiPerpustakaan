<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $primaryKey = 'username';
    protected $table = 'user';
    protected $allowedFields = ['username', 'password', 'role'];
}
