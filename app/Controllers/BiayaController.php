<?php

namespace App\Controllers;

use App\Models\BiayaModel;
use CodeIgniter\Controller;

class BiayaController extends Controller
{
    protected $BiayaModel;

    public function __construct()
    {
        $this->BiayaModel = new BiayaModel();
    }

    public function index()
    {
        $data['Biaya'] = $this->BiayaModel->findAll();
        return view('Biaya', $data);
    }

    // 🔹 Menyimpan Data Baru
    public function store()
    {
        $data = [
            'Jenis_Biaya'  => $this->request->getPost('Jenis_Biaya'),
            'Jumlah_Biaya' => $this->request->getPost('Jumlah_Biaya'),
        ];

        $this->BiayaModel->insert($data);
        return redirect()->to('/Biaya')->with('success', 'Data berhasil ditambahkan');
    }

    // 🔹 Mengupdate Data
    public function update($id)
    {
        $data = [
            'Jenis_Biaya'  => $this->request->getPost('Jenis_Biaya'),
            'Jumlah_Biaya' => $this->request->getPost('Jumlah_Biaya'),
        ];

        $this->BiayaModel->update($id, $data);
        return redirect()->to('/Biaya')->with('success', 'Data berhasil diperbarui');
    }

    // 🔹 Menghapus Data
    public function delete($id)
    {
        $this->BiayaModel->delete($id);
        return redirect()->to('/Biaya')->with('success', 'Data berhasil dihapus');
    }
}
