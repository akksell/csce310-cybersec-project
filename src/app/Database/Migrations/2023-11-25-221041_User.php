<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'UIN' => [
                'type'              => 'INT',
                'unsigned'          => true,
                'unique'            => true,
                'auto_increment'    => false,
                'constraint'        => 9,
            ],
            'First_Name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '30',
            ],
            'M_Initial' => [
                'type'              => 'CHAR',
            ],
            'Last_Name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '30',
            ],
            'Username' => [
                'type'              => 'VARCHAR',
                'constraint'        => '20',
                'unique'            => true,
            ],
            'Password' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'User_Type' => [
                'type'              => 'VARCHAR',
                'constraint'        => '8',
            ],
            'Email' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'unique'            => true,
            ],
            'Discord_Name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '32',
                'unique'            => true,
            ],
        ]);
        $this->forge->addKey('UIN', true, true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
