DROP DATABASE ASL;

CREATE DATABASE ASL;

USE ASL;

source ./Schools.sql;
source ./Courses.sql;
source ./OfferedCourses.sql
source ./Businesses.sql;

source ./Users.sql;
source ./profile/Profiles.sql;
source ./profile/Admins.sql;
source ./profile/SchoolManagers.sql;
source ./profile/Teachers.sql;
source ./profile/Students.sql;
source ./profile/BusinessTutors.sql;

source ./StudentClasses.sql;

source ./StudentClassMemberships.sql;

source ./Activities.sql;
source ./Participations.sql;
