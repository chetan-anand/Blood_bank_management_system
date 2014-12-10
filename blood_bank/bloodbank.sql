CREATE DATABASE bloodbank;
USE bloodbank;

###################################### employee #################################################################
CREATE TABLE `bloodbank`.`employee` (
  `sno_emp` INT NOT NULL AUTO_INCREMENT,
  `emp_id` INT NOT NULL,
  `emp_role` VARCHAR(45) NULL,
  `emp_salary` INT NULL,
  `emp_phone` BIGINT NULL,
  `emp_email` VARCHAR(45) NULL,
  `emp_address` VARCHAR(45) NULL,
  `emp_name` VARCHAR(45) NULL,
  `emp_area` VARCHAR(45) NULL,
  `emp_sex` VARCHAR(45) NULL,
  PRIMARY KEY (`sno_emp`),
  UNIQUE INDEX `emp_id_UNIQUE` (`emp_id` ASC)
);

ALTER TABLE `bloodbank`.`employee` 
DROP COLUMN `emp_id`,
CHANGE COLUMN `sno_emp` `emp_id` INT(11) NOT NULL AUTO_INCREMENT ,
DROP INDEX `emp_id_UNIQUE` ;

ALTER TABLE `bloodbank`.`employee` 
CHANGE COLUMN `emp_role` `emp_role` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `emp_salary` `emp_salary` INT(11) NOT NULL DEFAULT 1500 ,
CHANGE COLUMN `emp_address` `emp_address` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `emp_name` `emp_name` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `emp_area` `emp_area` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `emp_sex` `emp_sex` VARCHAR(45) NOT NULL ,
ADD COLUMN `emp_status` VARCHAR(45) BINARY NOT NULL AFTER `emp_sex`;


#################################################################################################################################

###################################### branch #################################################################
CREATE TABLE `bloodbank`.`branch` (
  `sno_branch` INT NOT NULL AUTO_INCREMENT,
  `br_id` INT NOT NULL,
  `br_name` VARCHAR(45) NULL,
  `br_address` VARCHAR(45) NULL,
  `br_phone` BIGINT NULL,
  `br_email` VARCHAR(45) NULL,
  `br_area` VARCHAR(45) NULL,
  `branchcol` VARCHAR(45) NULL,
  PRIMARY KEY (`sno_branch`),
  UNIQUE INDEX `br_id_UNIQUE` (`br_id` ASC));

ALTER TABLE `bloodbank`.`branch` 
DROP COLUMN `br_id`,
CHANGE COLUMN `sno_branch` `br_id` INT(11) NOT NULL AUTO_INCREMENT ,
DROP INDEX `br_id_UNIQUE` ;

ALTER TABLE `bloodbank`.`branch` 
DROP COLUMN `branchcol`;

ALTER TABLE `bloodbank`.`branch` 
CHANGE COLUMN `br_name` `br_name` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `br_address` `br_address` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `br_phone` `br_phone` BIGINT(20) NOT NULL ,
CHANGE COLUMN `br_area` `br_area` VARCHAR(45) NOT NULL ;




#################################################################################################################################


###################################### bloodrequest #################################################################

CREATE TABLE `bloodbank`.`bloodrequest` (
  `req_id` INT NOT NULL AUTO_INCREMENT,
  `req_name` VARCHAR(45) NULL,
  `req_phone` BIGINT NULL,
  `req_email` VARCHAR(45) NULL,
  `req_address` VARCHAR(45) NULL,
  `req_area` VARCHAR(45) NULL,
  `req_hospital` VARCHAR(45) NULL,
  `req_confirm` VARCHAR(45) NULL,
  `req_amount` VARCHAR(45) NULL,
  `req_blood_group` VARCHAR(45) NULL,
  PRIMARY KEY (`req_id`));


ALTER TABLE `bloodbank`.`bloodrequest` 
CHANGE COLUMN `req_name` `req_name` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `req_phone` `req_phone` BIGINT(20) NOT NULL ,
CHANGE COLUMN `req_address` `req_address` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `req_area` `req_area` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `req_hospital` `req_hospital` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `req_confirm` `req_confirm` VARCHAR(45) BINARY NOT NULL ,
CHANGE COLUMN `req_amount` `req_amount` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `req_blood_group` `req_blood_group` VARCHAR(45) NOT NULL ;




#################################################################################################################################


###################################### donor #################################################################

CREATE TABLE `donor` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(45) DEFAULT NULL,
  `d_address` varchar(45) DEFAULT NULL,
  `d_area` varchar(45) DEFAULT NULL,
  `d_blood_group` varchar(45) DEFAULT NULL,
  `donorcol` varchar(45) DEFAULT NULL,
  `d_nationality` varchar(45) DEFAULT NULL,
  `d_email` varchar(45) DEFAULT NULL,
  `d_phone` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`d_id`)
);

ALTER TABLE `bloodbank`.`donor` 
DROP COLUMN `donorcol`,
CHANGE COLUMN `d_name` `d_name` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `d_address` `d_address` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `d_area` `d_area` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `d_blood_group` `d_blood_group` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `d_nationality` `d_nationality` VARCHAR(45) NOT NULL DEFAULT 'INDIAN' ,
CHANGE COLUMN `d_phone` `d_phone` BIGINT(20) NOT NULL ;

ALTER TABLE `bloodbank`.`donor` 
DROP COLUMN `donorcol`,
CHANGE COLUMN `d_name` `d_name` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `d_address` `d_address` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `d_area` `d_area` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `d_blood_group` `d_blood_group` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `d_nationality` `d_nationality` VARCHAR(45) NOT NULL DEFAULT 'INDIAN' ,
CHANGE COLUMN `d_phone` `d_phone` BIGINT(20) NOT NULL ;


#################################################################################################################################


###################################### bloodrepo #################################################################

CREATE TABLE `bloodrepo` (
  `blood_id` int(11) NOT NULL AUTO_INCREMENT,
  `blood_group` varchar(45) DEFAULT NULL,
  `blood_amout` int(11) DEFAULT NULL,
  `blood_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`blood_id`)
);

ALTER TABLE `bloodbank`.`bloodrepo` 
CHANGE COLUMN `blood_group` `blood_group` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `blood_amout` `blood_amout` INT(11) NOT NULL ,
CHANGE COLUMN `blood_price` `blood_price` INT(11) NOT NULL DEFAULT 100 ;



####################################################  Relations #######################################################






use bloodbank;

###################################### br_emp_rel #################################################################

create table br_emp_rel(
	br_id INT,
	emp_id INT,
	
	CONSTRAINT pk_1 PRIMARY KEY (emp_id),
	
	CONSTRAINT fk_1 FOREIGN KEY	(br_id) 
	REFERENCES branch(br_id) ON DELETE CASCADE,
	
	CONSTRAINT fk_2 FOREIGN KEY	(emp_id)
	REFERENCES employee(emp_id) ON DELETE CASCADE
);

#################################################################################################################################


###################################### br_don_rel #################################################################


create table br_don_rel(
	br_id INT,
	d_id INT,
	
	CONSTRAINT pk_2 PRIMARY KEY (d_id),
	
	CONSTRAINT fk_3 FOREIGN KEY	(br_id)
	REFERENCES branch(br_id) ON DELETE CASCADE,
	
	CONSTRAINT fk_4 FOREIGN KEY	(d_id)
	REFERENCES donor(d_id) ON DELETE CASCADE
);

#################################################################################################################################


###################################### don_repo_rel #################################################################

create table don_repo_rel(
	d_id INT,
	blood_id INT,

	CONSTRAINT pk_3 PRIMARY KEY (blood_id),
	
	CONSTRAINT fk_5 FOREIGN KEY	(d_id)
	REFERENCES donor(d_id) ON DELETE CASCADE,

	CONSTRAINT fk_6 FOREIGN KEY	(blood_id)
	REFERENCES bloodrepo(blood_id) ON DELETE CASCADE
);

#################################################################################################################################


###################################### br_req_rel #################################################################

create table br_req_rel(
	br_id INT(11),
	req_id INT(11),
	
	CONSTRAINT pk_4 PRIMARY KEY (req_id),
	
	CONSTRAINT fk_7 FOREIGN KEY	(br_id)
	REFERENCES branch(br_id) ON DELETE CASCADE,

	CONSTRAINT fk_8 FOREIGN KEY	(req_id)
	REFERENCES bloodrequest(req_id) ON DELETE CASCADE
);

#################################################################################################################################

################################################# login #######################################################################


CREATE TABLE `bloodbank`.`login` (
  `user` VARCHAR(45) NOT NULL,
  `password` BLOB NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  UNIQUE INDEX `user_UNIQUE` (`user` ASC),
  PRIMARY KEY (`id`));

#########################################################################################################################