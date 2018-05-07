#!/bin/bash

mysql -u root < ./setup.sql;

password="password"
password=$(php -r "echo password_hash('$password', PASSWORD_DEFAULT);")
echo "USE ASL; INSERT INTO Users VALUES(NULL, \"chenlijun1999@gmail.com\", \"$password\", \"admin\");" | mysql -u root
