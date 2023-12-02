<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Classes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Class_ID' => [
                'type'              => 'INT',
                'unsigned'          => true,
                'unique'            => true,
                'constraint'        => 9,
                'auto_increment'    => true,
            ],
            'Name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ],
            'Description' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ]
        ]);
        $this->forge->addKey('Class_ID', true, true);
        $this->forge->createTable('classes');
    }

    public function down()
    {
        $this->forge->dropTable('classes');
    }
}
