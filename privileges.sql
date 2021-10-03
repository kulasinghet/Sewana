# Privileges for `Client`@`localhost`
USE sewana;
CREATE USER 'Client'@'localhost' IDENTIFIED BY 'client123';
CREATE USER 'Manager'@'localhost' IDENTIFIED BY 'manager123';
CREATE USER 'Owner'@'localhost' IDENTIFIED BY 'owner123';
CREATE USER 'Employee'@'localhost' IDENTIFIED BY 'employee123';

GRANT USAGE ON *.* TO 'Client'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, REFERENCES ON `sewana`.`views` TO 'Client'@'localhost';

GRANT SELECT ON `sewana`.`property_requirement` TO 'Client'@'localhost';

GRANT SELECT ON `sewana`.`property` TO 'Client'@'localhost';

GRANT SELECT ON `sewana`.`client` TO 'Client'@'localhost';

GRANT SELECT ON `sewana`.`lease` TO 'Client'@'localhost';

GRANT SELECT, SHOW VIEW ON `sewana`.`current_property` TO 'Client'@'localhost';


# Privileges for `Employee`@`localhost`

GRANT USAGE ON *.* TO 'Employee'@'localhost';

GRANT SELECT ON `sewana`.* TO 'Employee'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, REFERENCES ON `sewana`.`property_requirement` TO 'Employee'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, REFERENCES ON `sewana`.`lease` TO 'Employee'@'localhost';

GRANT SELECT ON `sewana`.`property_owner` TO 'Employee'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE ON `sewana`.`newspaper` TO 'Employee'@'localhost';

GRANT SELECT, DELETE ON `sewana`.`views` TO 'Employee'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, REFERENCES ON `sewana`.`advertise` TO 'Employee'@'localhost';

GRANT SELECT ON `sewana`.`client` TO 'Employee'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, REFERENCES ON `sewana`.`property` TO 'Employee'@'localhost';


# Privileges for `Manager`@`localhost`

GRANT USAGE ON *.* TO 'Manager'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER, CREATE TEMPORARY TABLES, EXECUTE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EVENT, TRIGGER ON `sewana`.* TO 'Manager'@'localhost';


# Privileges for `Owner`@`localhost`

GRANT USAGE ON *.* TO 'Owner'@'localhost';

GRANT SELECT ON `sewana`.`company` TO 'Owner'@'localhost';

GRANT SELECT ON `sewana`.`property` TO 'Owner'@'localhost';

GRANT SELECT ON `sewana`.`views` TO 'Owner'@'localhost';

GRANT SELECT, REFERENCES ON `sewana`.`advertise` TO 'Owner'@'localhost';

GRANT SELECT ON `sewana`.`person` TO 'Owner'@'localhost';


# Privileges for `root`@`localhost`

GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' WITH GRANT OPTION;

GRANT PROXY ON ''@'' TO 'root'@'localhost' WITH GRANT OPTION;