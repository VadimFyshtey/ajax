INSERT INTO `db1`.`S` (`image`, `name`) SELECT SUBSTR(`longimage`, 17), CONCAT(`firstname`, ' ', `lastname`) FROM `db2`.`K`
