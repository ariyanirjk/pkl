<?php
namespace App\Models;

use CodeIgniter\Model;

class BiayaModel extends Model
{
    protected $table = 'Biaya'; // Nama tabel di database
    protected $primaryKey = 'Id_Biaya';
    protected $allowedFields = ['Jenis_Biaya', 'Jumlah_Biaya'];
}
