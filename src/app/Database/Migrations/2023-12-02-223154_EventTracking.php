<?php
// Min Zhang

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EventTracking extends Migration
{
    public function up()
    {
        $this->forge->addField([

            "ET_Num" => [
                "type" => "INT",
                "auto_increment" => true,
                "unsigned" => true,
                "constraint" => 5
            ],
			"Event_ID" => [
				"type" => "INT",
				"unsigned" => true,
				"constraint" => 5
			],
            'UIN' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 9,
            ]
		]);

		$this->forge->addPrimaryKey("ET_Num");
        $this->forge->addForeignKey("UIN", "user", "UIN");
        $this->forge->addForeignKey("Event_ID", "event", "Event_ID");
		$this->forge->createTable("event_tracking");
    }

    public function down()
    {
        $this->forge->dropTable('event_tracking');
    }
}
