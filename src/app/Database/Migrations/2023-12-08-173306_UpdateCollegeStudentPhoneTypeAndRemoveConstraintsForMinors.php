<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateCollegeStudentPhoneTypeAndRemoveConstraintsForMinors extends Migration
{
    public function up()
    {
        $removeNullMinor1 = <<<SQL
            ALTER TABLE college_student
            MODIFY Minor_1 VARCHAR(50);
        SQL;
        $removeNullMinor2 = <<<SQL
            ALTER TABLE college_student
            MODIFY Minor_2 VARCHAR(50);
        SQL;
        $changePhoneType = <<<SQL
            ALTER TABLE college_student
            MODIFY Phone VARCHAR(10) NOT NULL;
        SQL;
        $this->db->transStart();
        $this->db->query($removeNullMinor1);
        $this->db->query($removeNullMinor2);
        $this->db->query($changePhoneType);
        $this->db->transComplete();
    }

    public function down()
    {
        $addNullMinor1 = <<<SQL
            ALTER TABLE college_student
            MODIFY Minor_1 VARCHAR(50) NOT NULL;
        SQL;
        $addNullMinor2 = <<<SQL
            ALTER TABLE college_student
            MODIFY Minor_2 VARCHAR(50) NOT NULL;
        SQL;
        $changePhoneType = <<<SQL
            ALTER TABLE college_student
            MODIFY Phone INT NOT NULL;
        SQL;
        $this->db->transStart();
        $this->db->query($addNullMinor1);
        $this->db->query($addNullMinor2);
        $this->db->query($changePhoneType);
        $this->db->transComplete();
    }
}