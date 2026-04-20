<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHalamanDinamis extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'halaman' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'konten' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gambar_icon' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('halaman_dinamis');
    }

    public function down()
    {
        $this->forge->dropTable('halaman_dinamis');
    }
}
