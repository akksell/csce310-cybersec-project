<?php
// Evan Burriola

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DocumentationMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
			"doc_num" => [
				"type" => "INT",
				"auto_increment" => true,
				"unsigned" => true,
                "unique" => true,
				"constraint" => 5
			],
			"app_num" => [
				"type" => "INT",
				"unsigned" => true,
				"constraint" => 5
			],
			"link" => [
				"type" => "VARCHAR",
				"constraint" => 255
            ],
            "doc_type" => [
                "type" => "VARCHAR",
                "constraint" => 30
            ]
		]);

		$this->forge->addPrimaryKey("doc_num");
        $this->forge->addForeignKey('app_num', 'application', 'app_num', 'CASCADE', 'CASCADE');
		$this->forge->createTable("documentation");
    }

    public function down()
    {
        $this->forge->dropTable('documentation');
    }
}
