<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserViewAndIndex extends Migration
{
    public function up()
    {
        $index =<<<SQL
            CREATE INDEX classification_index
            ON college_student (Classification);
        SQL;
        $view =<<<SQL
            CREATE VIEW profile
            AS SELECT
                u.*,
                cs.Gender,
                cs.Hispanic_Latino,
                cs.Race,
                cs.US_Citizen,
                cs.First_Generation,
                cs.DoB,
                cs.GPA,
                cs.Major,
                cs.Minor_1,
                cs.Minor_2,
                cs.Expected_Graduation,
                cs.School,
                cs.Classification,
                cs.Phone,
                cs.Student_Type
            FROM CyberSec.user u
            LEFT JOIN CyberSec.college_student cs
                ON u.UIN = cs.UIN;
        SQL;
        $this->db->query($index);
        $this->db->query($view);
    }

    public function down()
    {
        $index =<<<SQL
            ALTER TABLE college_student
            DROP INDEX classification_index;
        SQL;
        $view =<<<SQL
            DROP VIEW profile;
        SQL;
        $this->db->query($index);
        $this->db->query($view);
    }
}
