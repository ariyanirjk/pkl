<?php

namespace App\Controllers;

use App\Models\PerjalananDinasModel;
use App\Models\PengajuanModel; // Menambahkan model Pengajuan
use CodeIgniter\Controller;

class PerjalananDinas extends Controller
{
    protected $PerjalananDinasModel;
    protected $PengajuanModel; // Menambahkan properti untuk model Pengajuan

    public function __construct()
    {
        $this->PerjalananDinasModel = new PerjalananDinasModel();
        $this->PengajuanModel = new PengajuanModel(); // Inisialisasi model Pengajuan
    }

    public function index()
{
    $data['perjalanan'] = $this->PerjalananDinasModel->asArray()->findAll(); // Ambil semua data perjalanan dinas
    $data['pengajuan'] = $this->PerjalananDinasModel->getPengajuan(); // Ambil semua data pengajuan untuk dropdown
    return view('PerjalananDinas', $data); // Pastikan view yang digunakan sudah sesuai
}


public function store()
{
    $this->PerjalananDinasModel->insert([
        'Lokasi'        => $this->request->getPost('Lokasi'),
        'Tgl_Mulai'     => $this->request->getPost('Tgl_Mulai'),
        'Tgl_Selesai'   => $this->request->getPost('Tgl_Selesai'),
        'status'        => $this->request->getPost('status')
    ]);

    return redirect()->to('/PerjalananDinas')->with('success', 'Data perjalanan berhasil ditambahkan!');
}

public function update($id_perjalanan)
{
    $this->PerjalananDinasModel->update($id_perjalanan, [
        'Lokasi'        => $this->request->getPost('Lokasi'),
        'Tgl_Mulai'     => $this->request->getPost('Tgl_Mulai'),
        'Tgl_Selesai'   => $this->request->getPost('Tgl_Selesai'),
        'status'        => $this->request->getPost('status')
    ]);

    return redirect()->to('/PerjalananDinas')->with('success', 'Data perjalanan berhasil diperbarui!');
}


    public function delete($Id_Perjalanan)
    {
        // Hapus data perjalanan dinas berdasarkan ID
        $this->PerjalananDinasModel->delete($Id_Perjalanan);

        return redirect()->to('/PerjalananDinas')->with('success', 'Data berhasil dihapus!');
    }
}
