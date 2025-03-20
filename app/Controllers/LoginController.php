<?php

namespace App\Controllers;

use App\Models\AkunModel; // Pastikan untuk menggunakan model yang benar
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('LoginView'); // Menampilkan view login
    }

    public function authenticate()
    {
        $username = $this->request->getPost('signin-username'); // Mengambil username dari input
        $password = $this->request->getPost('signin-password'); // Mengambil password dari input

        // Validasi input
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'signin-username' => 'required|min_length[3]|max_length[50]',
            'signin-password' => 'required|min_length[6]'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->to('/Login')->withInput()->with('errors', $this->validator->getErrors());
        }

        $akunModel = new AkunModel();
        $akun = $akunModel->findByUsername($username);

        if ($akun && password_verify($password, $akun['Password'])) {
            session()->set('loggedIn', true);
            session()->set('userId', $akun['Id_Akun']);
            session()->set('username', $akun['Username']);
            session()->set('role', $akun['Role']);
         // Arahkan pengguna berdasarkan peran (role) menggunakan if-else
            if ($akun['Role'] == 'Admin') {
                return redirect()->to('/dashboard');
            } elseif ($akun['Role'] == 'User') {
                return redirect()->to('/dashboard');
            }
        } else {
            return redirect()->to('/Login')->withInput()->with('error', 'Username atau Password salah.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/Login');
    }
}