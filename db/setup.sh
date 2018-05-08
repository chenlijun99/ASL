#!/bin/bash

mysql -u root < ./setup.sql;

password="password"
password=$(php -r "echo password_hash('$password', PASSWORD_DEFAULT);")
echo \
"USE ASL;
INSERT INTO Users VALUES(NULL, \"admin@admin.com\", \"$password\", \"admin\"); \
INSERT INTO Profiles VALUES(\"AAAAAAAAAAAAAAAA\", \"admin\", \"admin\", 1);" | mysql -u root
