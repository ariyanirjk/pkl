<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use CodeIgniter\Controller;

class Pegawai extends Controller
{
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }

    // Menampilkan daftar pegawai
    public function index()
    {
        $data['Pegawai'] = $this->pegawaiModel->findAll(); // Ambil semua data pegawai
        return view('Pegawai', $data);
    }

    // Menampilkan form tambah/edit pegawai
    public function form($id_pegawai = null)
{
    $data['Pegawai'] = null;
    $data['isEdit'] = false;

    if ($id_pegawai) {
        $pegawai = $this->pegawaiModel->find($id_pegawai);
        if (!$pegawai) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Pegawai dengan ID $id_pegawai tidak ditemukan.");
        }
        $data['Pegawai'] = $pegawai;
        $data['isEdit'] = true;
    }

    return view('Pegawaiform', $data);
}


    // Menyimpan data pegawai baru
    public function store()
{
    $this->pegawaiModel->insert([
        'Nama'              => $this->request->getPost('Nama'),
        'Jabatan'           => $this->request->getPost('Jabatan'),
        'No_Tlp'            => $this->request->getPost('No_Tlp'),
        'Status_Pengajuan'  => $this->request->getPost('Status_Pengajuan')
    ]);

    return redirect()->to('/pegawai')->with('success', 'Data pegawai berhasil ditambahkan!');
}

public function update($id_pegawai)
{
    $this->pegawaiModel->update($id_pegawai, [
        'Nama'              => $this->request->getPost('Nama'),
        'Jabatan'           => $this->request->getPost('Jabatan'),
        'No_Tlp'            => $this->request->getPost('No_Tlp'),
        'Status_Pengajuan'  => $this->request->getPost('Status_Pengajuan')
    ]);

    return redirect()->to('/pegawai')->with('success', 'Data pegawai berhasil diperbarui!');
}


    // Menghapus data pegawai berdasarkan ID
    public function delete($id_pegawai)
    {
        $pegawai = $this->pegawaiModel->find($id_pegawai);
        if (!$pegawai) {
            return redirect()->to('/Pegawai')->with('error', 'Pegawai tidak ditemukan!');
        }

        $this->pegawaiModel->delete($id_pegawai);

        return redirect()->to('/Pegawai')->with('success', 'Data pegawai berhasil dihapus!');
    }
}
