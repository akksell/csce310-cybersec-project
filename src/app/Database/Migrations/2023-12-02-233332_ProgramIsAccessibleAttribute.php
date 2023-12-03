<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProgramIsAccessibleAttribute extends Migration
{
    public function up()
    {
        $fields = [
			"is_accessible" => [
                "type" => "BINARY",
                "default" => 1
            ]
		];

        $this->forge->addColumn('program', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('program', 'is_accessible');
    }
}
