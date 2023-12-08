<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddSessions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'          => 'VARCHAR',
                'constraint'    => '128',
                'null'          => false,
            ],
            'ip_address' => [
                'type'          => 'VARCHAR',
                'constraint'    => '45',
                'null'          => false,
            ],
            'timestamp' => [
                'type'          => 'TIMESTAMP',
                'default'       => new RawSql('CURRENT_TIMESTAMP'),
                'null'          => false,
            ],
            'data' => [
                'type'          => 'BLOB',
                'null'          => false,
            ],
        ]);

        $this->forge->addKey('id', true, true);
        $this->forge->createTable('sessions');
    }

    public function down()
    {
        $this->forge->dropTable('sessions');
    }
}
