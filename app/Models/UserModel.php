<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Nama tabel di database Anda (sesuaikan)
    protected $primaryKey = 'id'; // Sesuaikan dengan primary key tabel

    // Fungsi untuk memeriksa login
    public function checkLogin($username, $password)
    {
        // Query ke database untuk memeriksa user
        $builder = $this->db->table($this->table);
        $builder->where('username', $username);
        $user = $builder->get()->getRowArray();

        // Cek apakah user ditemukan dan password valid
        if ($user && password_verify($password, $user['password'])) {
            return true; // Login berhasil
        }

        return false; // Login gagal
    }
}
