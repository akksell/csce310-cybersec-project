<?php
// Evan Burriola
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ApplicationView extends Migration
{
    public function up()
    {
        $sql = <<<SQL
            CREATE VIEW application_filter AS
                SELECT 
                    program.program_num,
                    program.name,
                    application.status,
                    application.app_num,
                    application.UIN
                FROM
                    program
                        JOIN
                    application ON application.program_num = program.program_num;
        SQL;
        $this->db->query($sql);
    }

    public function down()
    {
        $sql = <<<SQL
            DROP VIEW application_filter
        SQL;

        $this->db->query($sql);
    }
}
