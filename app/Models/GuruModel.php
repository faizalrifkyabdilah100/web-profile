<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table            = 'guru';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $allowedFields = [
        'nip',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'jabatan',
        'mata_pelajaran',
        'no_telepon',
        'alamat',
        'foto',
    ];

    protected $validationRules = [
        'nama'           => 'required|min_length[3]|max_length[100]',
        'nip'            => 'permit_empty|max_length[20]',
        'jenis_kelamin'  => 'required|in_list[L,P]',
        'tempat_lahir'   => 'permit_empty|max_length[50]',
        'tanggal_lahir'  => 'permit_empty|valid_date',
        'jabatan'        => 'permit_empty|max_length[50]',
        'mata_pelajaran' => 'permit_empty|max_length[100]',
        'no_telepon'     => 'permit_empty|max_length[15]',
        'alamat'         => 'permit_empty',
    ];

    protected $validationMessages = [
        'nama' => [
            'required'   => 'Nama guru wajib diisi.',
            'min_length' => 'Nama guru minimal 3 karakter.',
            'max_length' => 'Nama guru maksimal 100 karakter.',
        ],
        'jenis_kelamin' => [
            'required' => 'Jenis kelamin wajib dipilih.',
            'in_list'  => 'Jenis kelamin tidak valid.',
        ],
    ];
}
