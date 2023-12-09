<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToUser extends Migration
{
    public function up()
    {
        $sql = <<<SQL
            ALTER TABLE user
            ADD COLUMN Status VARCHAR(20) NOT NULL DEFAULT 'active';
        SQL;
        $this->db->query($sql);
    }

    public function down()
    {
        $sql = <<<SQL
            ALTER TABLE user
            DROP COLUMN Status;
        SQL;
        $this->db->query($sql);
    }
}
