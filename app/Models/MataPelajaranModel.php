<?php

namespace App\Models;

use CodeIgniter\Model;

class MataPelajaranModel extends Model
{
    protected $table            = 'mata_pelajaran';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $allowedFields = [
        'kode',
        'nama',
        'kelompok',
        'deskripsi',
    ];

    protected $validationRules = [
        'nama'     => 'required|min_length[3]|max_length[100]',
        'kode'     => 'permit_empty|max_length[20]',
        'kelompok' => 'permit_empty|max_length[50]',
        'deskripsi' => 'permit_empty',
    ];

    protected $validationMessages = [
        'nama' => [
            'required'   => 'Nama mata pelajaran wajib diisi.',
            'min_length' => 'Nama mata pelajaran minimal 3 karakter.',
            'max_length' => 'Nama mata pelajaran maksimal 100 karakter.',
        ],
    ];
}
