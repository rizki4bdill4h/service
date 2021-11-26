<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table      = 'auth_user';
    protected $allowedFields = ['name', 'email', 'password'];
    // protected $useTimestamps = true;
    public function authAll()
    {
        return $this->where('name');
    }
}
