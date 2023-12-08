<?php
// Evan Burriola
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ApplicationStatus extends Migration
{
    public function up()
    {
        $fields = [
			"status" => [
                "type" => "BINARY",
                "default" => 0
            ]
		];

        $this->forge->addColumn('application', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('application', 'status');
    }
}
