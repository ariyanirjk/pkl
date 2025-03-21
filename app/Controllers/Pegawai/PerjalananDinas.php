<?php

namespace App\Controllers\User;

use App\Models\PengajuanModel;
use CodeIgniter\Controller;

class PengajuanDinasController extends Controller
{
    protected $PengajuanModel;
    protected $session;

    public function __construct()
    {
        $this->PengajuanModel = new PengajuanModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        // Pastikan user sudah login
        if (!$this->session->get('is_logged_in')) {
            // Redirect ke halaman login user
            return redirect()->to('/login');  // Ganti /login dengan URL yang benar
        }

        $id_pegawai = $this->session->get('id_pegawai'); // Ambil ID pegawai dari session
        $data['Pengajuan'] = $this->PengajuanModel->where('Id_Pegawai', $id_pegawai)->findAll(); // Ambil pengajuan hanya untuk user ini

        return view('User/PengajuanDinas/Index', $data);
    }

    public function new()  // Jika menggunakan route /PengajuanDinas/new
    {
        // Pastikan user sudah login
        if (!$this->session->get('is_logged_in')) {
            // Redirect ke halaman login user
            return redirect()->to('/login');
        }

        // Tampilkan view yang berisi form pengajuan dinas
        return view('User/PengajuanDinas/Form');
    }

    public function store()
    {
        // Pastikan user sudah login
        if (!$this->session->get('is_logged_in')) {
            // Redirect ke halaman login user
            return redirect()->to('/login');
        }

        $id_pegawai = $this->session->get('id_pegawai'); // Ambil ID pegawai dari session

        $data = [
            'Id_Pegawai'       => $id_pegawai, // Gunakan ID pegawai dari session
            'Lokasi'           => $this->request->getPost('Lokasi'),
            'Tgl_Pengajuan'    => $this->request->getPost('Tgl_Pengajuan'),
            'Tgl_Mulai'        => $this->request->getPost('Tgl_Mulai'),
            'Tgl_Selesai'      => $this->request->getPost('Tgl_Selesai'),
            'Status_Pengajuan' => 'Pending', // Set status default
            'Keterangan'       => $this->request->getPost('Keterangan'),
            'Tgl_Persetujuan'  => null // Default null karena belum disetujui
        ];

        if (!$this->PengajuanModel->insert($data)) {
            // Menampilkan error jika gagal insert
            session()->setFlashdata('error', 'Gagal menyimpan data.  Silakan coba lagi.');
            return redirect()->back()->withInput(); // Kembali ke form dengan data yang sudah diisi
        }

        session()->setFlashdata('success', 'Pengajuan berhasil disimpan dan menunggu persetujuan admin.');
        return redirect()->to('/User/PengajuanDinas');
    }
}