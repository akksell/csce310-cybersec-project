<?php
// Evan Burriola

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProgramMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
			"program_num" => [
				"type" => "INT",
				"auto_increment" => true,
				"unsigned" => true,
				"constraint" => 5
			],
			"name" => [
				"type" => "VARCHAR",
				"constraint" => 30,
				"null" => false
			],
			"description" => [
				"type" => "TEXT",
				"null" => true
			]
		]);

		$this->forge->addPrimaryKey("program_num");
		$this->forge->createTable("program");
    }

    public function down()
    {
        $this->forge->dropTable('program');
    }
}
