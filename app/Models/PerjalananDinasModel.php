<?php

namespace App\Models;

use CodeIgniter\Model;

class PerjalananDinasModel extends Model
{
    protected $table            = 'perjalanan_dinas';
    protected $primaryKey       = 'Id_Perjalanan';
    protected $allowedFields    = ['Lokasi', 'Tgl_Mulai', 'Tgl_Selesai', 'status', 'Id_Pegawai', 'Id_Pengajuan'];

    // Untuk mendapatkan relasi dengan tabel pengajuan
    public function getPengajuan($idPengajuan = null)
    {
        // Jika idPengajuan diberikan, cari data pengajuan berdasarkan ID
        if ($idPengajuan === null) {
            return $this->db->table('pengajuan')->get()->getResult();
        }

        // Jika idPengajuan tidak null, cari berdasarkan ID
        return $this->db->table('pengajuan')->where('Id_Pengajuan', $idPengajuan)->get()->getRow();
    }
}
