USE CyberSec;

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