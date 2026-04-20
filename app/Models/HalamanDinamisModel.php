<?php

namespace App\Models;

use CodeIgniter\Model;

class HalamanDinamisModel extends Model
{
    protected $table            = 'halaman_dinamis';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['halaman', 'kategori', 'judul', 'konten', 'gambar_icon'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
