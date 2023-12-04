<?php
// Min Zhang

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Event extends Migration
{
    public function up()
    {
        $this->forge->addField([

			"Event_ID" => [
				"type" => "INT",
                "auto_increment" => true,
				"unsigned" => true,
				"constraint" => 5
			],
            'UIN' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 9,
            ],
            "Program_Num" => [
				"type" => "INT",
				"unsigned" => true,
				"constraint" => 5
			],
            "Start_Date" => [
                "type" => "DATE"
            ],
            "Start_Time" => [
                "type" => "TIME"
            ],
            "Location" => [
                "type" => "VARCHAR",
                "constraint" => 50
            ],
            "End_Date" => [
                "type" => "DATE"
            ],
            "End_Time" => [
                "type" => "TIME"
            ],
			"Event_Type" => [
				"type" => "VARCHAR",
				"constraint" => 50,
			]
		]);

		$this->forge->addPrimaryKey("Event_ID");
        $this->forge->addForeignKey("UIN", "user", "UIN");
        $this->forge->addForeignKey("Program_Num", "program", "program_num");
		$this->forge->createTable("event");
    }

    public function down()
    {
        $this->forge->dropTable('event');
    }
}
