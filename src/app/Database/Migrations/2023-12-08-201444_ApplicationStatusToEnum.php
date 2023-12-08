<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ApplicationStatusToEnum extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('application', 'status');

        $fields = [
			"status" => [
                "type" => "INT",
                "default" => 2
            ]
		];

        $this->forge->addColumn('application', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('application', 'status');

        $fields = [
			"status" => [
                "type" => "BINARY",
                "default" => 0
            ]
		];

        $this->forge->addColumn('application', $fields);
    }
}
