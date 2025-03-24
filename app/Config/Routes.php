<?php
use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
//Pengmanggilan Data Log In
$routes->get('/', 'Home::index');
$routes->get('Login', 'LoginController::index');
$routes->post('/authenticate', 'LoginController::authenticate');

//Pemanggilan Data Log Out
$routes->get('/logout', 'LoginController::logout');

//Pemanggilan Data Dashboard
$routes->get('/dashboard', 'Admin\Dashboard::index');

// Pemanggilan Data Pegawai
$routes->get('/Pegawai', 'Admin\Pegawai::index');
$routes->get('/Pegawai/form/(:num)', 'Admin\Pegawai::form/$1'); // Tambahkan ini
$routes->get('/Pegawai/form', 'Admin\Pegawai::form'); // Untuk form tambah pegawai
$routes->post('/Pegawai/store', 'Admin\Pegawai::store');
$routes->post('/Pegawai/update/(:num)', 'Admin\Pegawai::update/$1');
$routes->get('/Pegawai/delete/(:num)', 'Admin\Pegawai::delete/$1');
$routes->setAutoRoute(true);

//Pemanggilan Data Perjalanan Dinas
$routes->get('/PerjalananDinas', 'Pegawai\PerjalananDinas::index');
$routes->post('/PerjalananDinas/store', 'Pegawai\PerjalananDinasController::store');
$routes->post('/PerjalananDinas/update/(:num)', 'Pegawai\PerjalananDinas::update/$1');
$routes->post('/PerjalananDinas/delete/(:num)', 'Pegawai\PerjalananDinas::delete/$1');

//Pemanggilan Data Akun
$routes->get('/akun', 'Admin\AkunController::index');
$routes->post('/akun/save/(:num)', 'Admin\AkunController::save/$1');
$routes->post('/akun/save', 'Admin\AkunController::save');
$routes->get('/akun/delete/(:num)', 'Admin\AkunController::delete/$1');

//Pemanggilan Data Pengajuan
$routes->get('/Pengajuan', 'Pegawai\PengajuanController::index'); // Menampilkan daftar pengajuan
$routes->get('/Pengajuan', 'Admin\PengajuanController::index');
$routes->get('/Pengajuan/create', 'Pegawai\PengajuanController::create'); // Menampilkan form untuk menambah pengajuan
$routes->post('/Pegawai/store', 'PengajuanController::store'); // Menyimpan pengajuan baru
$routes->get('/Pengajuan/edit/(:num)', 'Pegawai\PengajuanController::edit/$1'); // Menampilkan form untuk edit pengajuan
$routes->post('/Pengajuan/update/(:num)', 'Pegawai\PengajuanController::update/$1'); // Mengupdate data pengajuan
$routes->post('Pengajuan/delete/(:num)', 'Pegawai\PengajuanController::delete/$1');  // Route untuk hapus

//Pemanggilan Data Biaya
$routes->get('/Biaya', 'Pegawai\BiayaController::index');
$routes->post('/Biaya/store', 'Pegawai\BiayaController::store');
$routes->post('/Biaya/update/(:num)', 'Pegawai\BiayaController::update/$1');
$routes->get('/Biaya/delete/(:num)', 'Pegawai\BiayaController::delete/$1');