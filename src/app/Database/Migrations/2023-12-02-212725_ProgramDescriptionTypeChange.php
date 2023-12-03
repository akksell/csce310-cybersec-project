<!-- Evan Burriola -->
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProgramDescriptionTypeChange extends Migration
{
    public function up()
    {
        $fields = array(
            'description' => array(
                    'name' => 'description',
                    'type' => 'VARCHAR',
                    'constraint' => 255
            ),
    );
    $this->forge->modifyColumn('program', $fields);
    }

    public function down()
    {
        $fields = array(
            'description' => array(
                    'name' => 'description',
                    'type' => 'TEXT'
            ),
    );
    $this->forge->modifyColumn('program', $fields);
    }
}
