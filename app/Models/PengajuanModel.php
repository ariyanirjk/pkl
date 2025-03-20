<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    // Nama tabel yang akan digunakan
    protected $table = 'pengajuan';
    
    // Kolom yang diizinkan untuk disimpan/diupdate
    protected $allowedFields    = [
        'Id_Pegawai',
        'Lokasi',
        'Tgl_Pengajuan',
        'Tgl_Mulai',
        'Tgl_Selesai',
        'Status_Pengajuan', // Sesuai dengan nama kolom di database
        'Keterangan',
        'Tgl_Persetujuan'
    ];
    
    // Menentukan primary key tabel
    protected $primaryKey       = 'Id_Pengajuan';
    
    // Menentukan tipe data untuk kolom tertentu (opsional)
    protected $useTimestamps    = false;  // Jika tidak menggunakan timestamp otomatis
    protected $dateFormat       = 'datetime';  // Format tanggal yang digunakan

    // Validasi input untuk memastikan data yang masuk sesuai
    protected $validationRules = [
        'Id_Pegawai'       => 'required|integer',
        'Lokasi'          => 'required|string|max_length[200]',
        'Tgl_Pengajuan'   => 'required|valid_date',
        'Tgl_Mulai'       => 'required|valid_date',
        'Tgl_Selesai'     => 'required|valid_date',
        'Status_Pengajuan' => 'required|string|max_length[100]',
        'Keterangan'      => 'required|string'
    ];

    // Menentukan pesan kesalahan untuk validasi jika dibutuhkan
    protected $validationMessages = [
        'Id_Pegawai'       => [
            'required' => 'Id Pegawai wajib diisi',
            'integer'  => 'Id Pegawai harus berupa angka'
        ],
        'Lokasi'          => [
            'required' => 'Lokasi wajib diisi',
            'string'   => 'Lokasi harus berupa teks',
            'max_length' => 'Lokasi maksimal 200 karakter'
        ],
        'Tgl_Pengajuan'   => [
            'required' => 'Tanggal Pengajuan wajib diisi',
            'valid_date' => 'Tanggal Pengajuan tidak valid'
        ],
        'Tgl_Mulai'       => [
            'required' => 'Tanggal Mulai wajib diisi',
            'valid_date' => 'Tanggal Mulai tidak valid'
        ],
        'Tgl_Selesai'     => [
            'required' => 'Tanggal Selesai wajib diisi',
            'valid_date' => 'Tanggal Selesai tidak valid'
        ],
        'Status_Pengajuan' => [
            'required' => 'Status Pengajuan wajib diisi',
            'string'   => 'Status Pengajuan harus berupa teks',
            'max_length' => 'Status Pengajuan maksimal 100 karakter'
        ],
        'Keterangan'      => [
            'required' => 'Keterangan wajib diisi',
            'string'   => 'Keterangan harus berupa teks'
        ],
    ];

    // Fungsi khusus untuk mendapatkan data berdasarkan status pengajuan
    public function getPengajuanByStatus($status)
    {
        return $this->where('Status_Pengajuan', $status)->findAll();
    }
}
