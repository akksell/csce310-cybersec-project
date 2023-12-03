<!-- Evan Burriola -->
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProgramUniquePK extends Migration
{
    public function up()
    {
        $fields = array(
			"program_num" => [
				"type" => "INT",
				"auto_increment" => true,
				"unsigned" => true,
				"constraint" => 5,
                "unique" => true
			],
        );
        $this->forge->modifyColumn('program', $fields);
    }

    public function down()
    {
        $fields = array(
			"program_num" => [
				"type" => "INT",
				"auto_increment" => true,
				"unsigned" => true,
				"constraint" => 5
			],
        );
        $this->forge->modifyColumn('program', $fields);
    }
}
