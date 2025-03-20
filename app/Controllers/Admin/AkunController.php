<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

use App\Models\AkunModel;

class AkunController extends Controller
{
    protected $akunModel;

    public function __construct()
    {
        $this->akunModel = new AkunModel();
    }

    public function index()
    {
        $data['akun'] = $this->akunModel->findAll();
        return view('admin/akun', $data);
    }

    public function save($id_akun = null)
    {
        $rules = [
            'Username' => 'required|min_length[3]|max_length[20]',
            'Password' => $id_akun ? 'permit_empty|min_length[6]|max_length[20]' : 'required|min_length[6]|max_length[20]',
            'role' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'Username' => $this->request->getPost('Username'),
            'Role' => $this->request->getPost('role')
            ];

        if ($this->request->getPost('Password')) {
            $data['Password'] = password_hash($this->request->getPost('Password'), PASSWORD_DEFAULT);
        }

        if ($id_akun) {
            $this->akunModel->update($id_akun, $data);
        } else {
            $this->akunModel->insert($data);
        }

        return redirect()->to('/akun')->with('success', 'Data akun berhasil disimpan.');
    }

    public function delete($id_akun)
    {
        if ($this->akunModel->find($id_akun)) {
            $this->akunModel->delete($id_akun);
            return redirect()->to('/akun')->with('success', 'Data akun berhasil dihapus.');
        }
        return redirect()->to('/akun')->with('error', 'Akun tidak ditemukan.');
    }
}
