<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table      = 'pegawai'; // Nama tabel di database
    protected $primaryKey = 'Id_Pegawai'; // Primary Key

    protected $allowedFields = [
        'Nama', 
        'Jabatan', 
        'No_Tlp', 
        'Status_Pengajuan'
    ]; // Kolom yang bisa diisi

    protected $useTimestamps = False;  // Gunakan timestamps
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $useSoftDeletes = False;  // Mengaktifkan soft delete
    protected $deletedField   = 'deleted_at';
}
