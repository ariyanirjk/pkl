<?php

namespace App\Controllers;

use App\Models\PengajuanModel;
use CodeIgniter\Controller;

class PengajuanController extends Controller
{
    protected $PengajuanModel;

    public function __construct()
    {
        $this->PengajuanModel = new PengajuanModel();
    }

    public function index()
    {
        $data['Pengajuan'] = $this->PengajuanModel->findAll();
        return view('Pengajuan', $data);
    }

    public function store()
{
    $data = [
        'Id_Pegawai'       => $this->request->getPost('Id_Pegawai'),
        'Lokasi'           => $this->request->getPost('Lokasi'),
        'Tgl_Pengajuan'    => $this->request->getPost('Tgl_Pengajuan'),
        'Tgl_Mulai'        => $this->request->getPost('Tgl_Mulai'),
        'Tgl_Selesai'      => $this->request->getPost('Tgl_Selesai'),
        'Status_Pengajuan' => $this->request->getPost('Status_Pengajuan'),
        'Keterangan'       => $this->request->getPost('Keterangan'),
        'Tgl_Persetujuan'  => $this->request->getPost('Tgl_Persetujuan')
    ];

    if (!$this->PengajuanModel->insert($data)) {
        // Menampilkan error jika gagal insert
        echo "Gagal menyimpan data: ";
        print_r($this->PengajuanModel->errors());
        exit();
    }

    return redirect()->to('/Pengajuan')->with('success', 'Data berhasil disimpan');
}



    public function update($Id_Pengajuan)
    {
        $data = [
            'Lokasi'           => $this->request->getPost('Lokasi'),
            'Tgl_Mulai'        => $this->request->getPost('Tgl_Mulai'),
            'Tgl_Selesai'      => $this->request->getPost('Tgl_Selesai'),
            'Status_Pengajuan' => $this->request->getPost('Status_Pengajuan'),
            'Keterangan'       => $this->request->getPost('Keterangan'),
            'Status_Persetujuan' => $this->request->getPost('Status_Pengajuan')
        ];

        if ($this->PengajuanModel->update($Id_Pengajuan, $data)) {
            return redirect()->to('/Pengajuan')->with('success', 'Data berhasil diperbarui');
        } else {
            return redirect()->to('/Pengajuan')->with('error', 'Gagal memperbarui data');
        }
    }

    public function delete($id_pengajuan)
    {
        if ($this->PengajuanModel->delete($id_pengajuan)) {
            return redirect()->to('/Pengajuan')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to('/Pengajuan')->with('error', 'Gagal menghapus data');
        }
    }
}
