<?php
use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
//Pengmanggilan Data Log In
$routes->get('/', 'Home::index');
$routes->get('LoginView', 'LoginController::index');
$routes->post('LoginView/authenticate', 'LoginController::authenticate');

//Pemanggilan Data Log Out
$routes->get('logout', 'LoginController::logout');

//Pemanggilan Data Dashboard
$routes->get('dashboard', 'admin\Dashboard::index');


// Pemanggilan Data Pegawai
$routes->get('Pegawai', 'admin\Pegawai::index');
$routes->get('Pegawai/form/(:num)', 'Pegawai::form/$1'); // Tambahkan ini
$routes->get('Pegawai/form', 'Pegawai::form'); // Untuk form tambah pegawai
$routes->post('Pegawai/store', 'Pegawai::store');
$routes->post('Pegawai/update/(:num)', 'Pegawai::update/$1');
$routes->get('Pegawai/delete/(:num)', 'Pegawai::delete/$1');
$routes->setAutoRoute(true);

//Pemanggilan Data Perjalanan Dinas
$routes->get('PerjalananDinas', 'pegawai\PerjalananDinas::index');
$routes->post('/PerjalananDinas/store', 'PerjalananDinas::store');
$routes->post('/PerjalananDinas/update/(:num)', 'PerjalananDinas::update/$1');
$routes->post('/PerjalananDinas/delete/(:num)', 'PerjalananDinas::delete/$1');

//Pemanggilan Data Akun
$routes->get('akun', 'admin\AkunController::index');
$routes->post('akun/save/(:num)', 'AkunController::save/$1');
$routes->post('akun/save', 'AkunController::save');
$routes->get('akun/delete/(:num)', 'AkunController::delete/$1');

//Pemanggilan Data Pengajuan
$routes->get('/Pengajuan', 'pegawai\PengajuanController::index'); // Menampilkan daftar pengajuan
$routes->get('/Pengajuan/create', 'PengajuanController::create'); // Menampilkan form untuk menambah pengajuan
$routes->post('/Pengajuan/store', 'PengajuanController::store'); // Menyimpan pengajuan baru
$routes->get('/Pengajuan/edit/(:num)', 'PengajuanController::edit/$1'); // Menampilkan form untuk edit pengajuan
$routes->post('/Pengajuan/update/(:num)', 'PengajuanController::update/$1'); // Mengupdate data pengajuan
$routes->post('Pengajuan/delete/(:num)', 'PengajuanController::delete/$1');  // Route untuk hapus

//Pemanggilan Data Biaya
$routes->get('/Biaya', 'pegawai\BiayaController::index');
$routes->post('/Biaya/store', 'BiayaController::store');
$routes->post('/Biaya/update/(:num)', 'BiayaController::update/$1');
$routes->get('/Biaya/delete/(:num)', 'BiayaController::delete/$1');