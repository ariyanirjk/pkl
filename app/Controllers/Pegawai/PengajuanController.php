<?php

namespace App\Controllers\pegawai;

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
        return view('pegawai/Pengajuan', $data);
    }

    public function store()
    {
        // 1. Ambil ID pegawai terakhir dari tabel pengajuan (jika ada)
        $lastPengajuan = $this->PengajuanModel->orderBy('Id_Pegawai', 'DESC')->first();

        // 2. Generate ID pegawai baru
        if ($lastPengajuan) {
            // Jika sudah ada pengajuan sebelumnya
            $lastId = (int) substr($lastPengajuan['Id_Pegawai'], 4); // Ambil angka setelah "NIP-"
            $newId = $lastId + 1;
            $newIdPegawai = 'NIP-' . sprintf('%04d', $newId); // Format jadi NIP-0002, NIP-0003, dst.
        } else {
            // Jika ini adalah pengajuan pertama
            $newIdPegawai = 'NIP-0001';
        }

        $data = [
            'Id_Pegawai'       => $newIdPegawai, // Menggunakan ID yang baru digenerate
            'Lokasi'           => $this->request->getPost('Lokasi'),
            'Tgl_Pengajuan'    => $this->request->getPost('Tgl_Pengajuan'),
            'Tgl_Mulai'        => $this->request->getPost('Tgl_Mulai'),
            'Tgl_Selesai'      => $this->request->getPost('Tgl_Selesai'),
            'Status_Pengajuan' => $this->request->getPost('Status_Pengajuan'),
            'Keterangan'       => $this->request->getPost('Keterangan'),
            'Tgl_Persetujuan'  => $this->request->getPost('Tgl_Persetujuan')
        ];

        // Validasi Data (Sangat Disarankan)
        $validationRules = [
            'Lokasi'           => 'required',
            'Tgl_Pengajuan'    => 'required|valid_date',
            'Tgl_Mulai'        => 'required|valid_date',
            'Tgl_Selesai'      => 'required|valid_date',
            'Status_Pengajuan' => 'required',
            'Keterangan'       => 'permit_empty', // Boleh kosong
            'Tgl_Persetujuan'  => 'permit_empty|valid_date', // Boleh kosong
        ];

        if (!$this->validate($validationRules)) {
            log_message('error', 'Validasi Gagal: ' . print_r($this->validator->getErrors(), true));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors()); // Redirect kembali ke form
        }

        if (!$this->PengajuanModel->insert($data)) {
            // Menampilkan error jika gagal insert
            log_message('error', 'Gagal menyimpan data: ' . print_r($this->PengajuanModel->errors(), true));
            //print_r($this->PengajuanModel->errors()); // Jangan di-exit, tapi di-log
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
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