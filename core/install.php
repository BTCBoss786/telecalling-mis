<?php
$leadsTbl = "CREATE TABLE `leads` (
	`ID` INT(11) NOT NULL AUTO_INCREMENT ,
	`callingDate` DATE NULL ,
	`callerName` VARCHAR(32) NULL ,
	`firmName` VARCHAR(48) NULL ,
	`firmLocation` VARCHAR(16) NULL ,
	`clientName` VARCHAR(32) NULL ,
	`mobileNo` VARCHAR(16) NULL ,
	`appointmentDate` DATE NULL ,
	`productType` VARCHAR(16) NULL ,
	`attendBy` VARCHAR(16) NULL ,
	`remark` TEXT NULL ,
	`status` VARCHAR(16) NULL ,
	PRIMARY KEY (`ID`)) ENGINE = InnoDB";
?>
