<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        return view('Dashboard'); // Menampilkan view dashboard
    }
}