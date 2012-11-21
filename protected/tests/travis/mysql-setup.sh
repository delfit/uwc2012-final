#!/bin/sh

sudo apt-get install mysql-server mysql-client
mysql -u root -p -e 'DROP SCHEMA IF EXISTS `uwc2012-final`; CREATE SCHEMA `uwc2012-final` CHARACTER SET utf8 COLLATE utf8_general_ci; DROP SCHEMA IF EXISTS `uwc2012-final_test`; CREATE SCHEMA `uwc2012-final_test` CHARACTER SET utf8 COLLATE utf8_general_ci; GRANT ALL ON `uwc2012-final`.* TO `uwc2012-final`@localhost IDENTIFIED BY "uwc2012-final"; GRANT ALL ON `uwc2012-final_test`.* TO `uwc2012-final`@localhost; FLUSH PRIVILEGES;'
mysql -u uwc2012-final -puwc2012-final uwc2012-final < ./protected/data/schema.mysql.sql
mysql -u uwc2012-final -puwc2012-final uwc2012-final_test < ./protected/data/schema.mysql.sql
