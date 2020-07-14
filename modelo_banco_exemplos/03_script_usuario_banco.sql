DROP USER IF EXISTS 'form_exemplo'@'%';
CREATE USER 'form_exemplo'@'%' IDENTIFIED BY '123456';
GRANT DELETE,EXECUTE,INSERT,SELECT,UPDATE ON form_exemplo.* TO 'form_exemplo'@'%';


DROP USER IF EXISTS 'form_exemplo'@'localhost';
CREATE USER 'form_exemplo'@'localhost' IDENTIFIED BY '123456';
GRANT DELETE,EXECUTE,INSERT,SELECT,UPDATE ON form_exemplo.* TO 'form_exemplo'@'localhost';


DROP USER IF EXISTS 'futf8'@'%';
CREATE USER 'futf8'@'%' IDENTIFIED BY '123456';
GRANT DELETE,EXECUTE,INSERT,SELECT,UPDATE ON futf8.* TO 'futf8'@'%';