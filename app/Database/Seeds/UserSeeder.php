<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'   => 'admin',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'nama'       => 'Super Administrator',
                'role'       => 'super_admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'guru',
                'password'   => password_hash('guru123', PASSWORD_DEFAULT),
                'nama'       => 'Guru',
                'role'       => 'guru',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('users')->truncate();
        $this->db->table('users')->insertBatch($data);
    }
}
