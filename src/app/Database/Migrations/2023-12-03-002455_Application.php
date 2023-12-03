<!-- Evan Burriola -->
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Application extends Migration
{
    public function up()
    {
        $this->forge->addField([
			"app_num" => [
				"type" => "INT",
				"auto_increment" => true,
				"unsigned" => true,
				"constraint" => 5
			],
			"program_num" => [
				"type" => "INT",
				"unsigned" => true,
				"constraint" => 5
			],
			"UIN" => [
                'type' => 'INT',
                'unsigned' => true,
                'unique' => true,
				'constraint' => 9
            ],
            "uncom_cert" => [
				"type" => "VARCHAR",
				"constraint" => 255
            ],
            "com_cert" => [
				"type" => "VARCHAR",
				"constraint" => 255
            ],
            "purpose_statement" => [
				"type" => "LONGTEXT",
            ],
		]);

		$this->forge->addPrimaryKey("app_num");
        $this->forge->addForeignKey('program_num', 'program', 'program_num', 'CASCADE', 'CASCADE');
		$this->forge->createTable("application");
    }

    public function down()
    {
        $this->forge->dropTable('application');
    }
}
