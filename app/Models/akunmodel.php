<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'Id_Akun';
    protected $allowedFields = ['Username', 'Password', 'Role']; // Tambahkan Role
    protected $useTimestamps = true;
    protected $createdField  = 'created_At';
    protected $updatedField  = 'updated_At';

    public function findByUsername($username)
    {
        return $this->where('Username', $username)->first();
    }
}