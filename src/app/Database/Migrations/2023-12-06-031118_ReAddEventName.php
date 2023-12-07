<?php
// Min Zhang

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReAddEventName extends Migration
{
    public function up()
    {
        $fields = [
            "Event_Name" => [
                "type" => "VARCHAR",
                "constraint" => "30"
            ]
        ];
        $this->forge->addColumn('event', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('event', "Event_Name");
    }
}

