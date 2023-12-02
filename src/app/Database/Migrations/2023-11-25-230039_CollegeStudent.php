<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CollegeStudent extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'UIN' => [
                'type'              => 'INT',
                'unsigned'          => true,
                'unique'            => true,
                'constraint'        => 9,
                'auto_increment'    => false,
            ],
            'Gender' => [
                'type'              => 'VARCHAR',
                'constraint'        => '10',
            ],
            'Hispanic_Latino' => [
                'type'              => 'BINARY',
            ],
            'Race' => [
                'type'              => 'VARCHAR',
                'constraint'        => '15',
            ],
            'US_Citizen' => [
                'type'              => 'BINARY',
            ],
            'First_Generation' => [
                'type'              => 'BINARY',
            ],
            'DoB' => [
                'type'              => 'DATE',
            ],
            'GPA' => [
                'type'              => 'FLOAT',
            ],
            'Major' => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ],
            'Minor_1' => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ],
            'Minor_2' => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ],
            'Expected_Graduation' => [
                'type'              => 'SMALLINT',
            ],
            'School' => [
                'type'              => 'VARCHAR',
                'constraint'        => '75',
            ],
            'Classification' => [
                'type'              => 'VARCHAR',
                'constraint'        => '15',
            ],
            'Phone' => [
                'type'              => 'INT',
                'unsigned'          => true,
            ],
            'Student_Type' => [
                'type'              => 'VARCHAR',
                'constraint'        => '40',
            ]
        ]);
        $this->forge->addKey('UIN', true, true);
        $this->forge->createTable('college_student');
    }

    public function down()
    {
        $this->forge->dropTable('college_student');
    }
}
