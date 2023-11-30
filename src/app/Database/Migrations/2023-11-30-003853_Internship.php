<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Internship extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Intern_ID' => [
                'type'              => 'INT',
                'unsigned'          => true,
                'unique'            => true,
                'constraint'        => 9,
                'auto_increment'    => false,
            ],
            'Name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ],
            'Description' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'Is_Gov' => [
                'type'              => 'BINARY',
            ]
        ]);
        $this->forge->addKey('Intern_ID', true, true);
        $this->forge->createTable('internship');
    }

    public function down()
    {
        $this->forge->dropTable('intership');
    }
}
