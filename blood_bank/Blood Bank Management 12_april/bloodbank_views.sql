use bloodbank;
CREATE USER 'employee'@'localhost' IDENTIFIED BY 'abc123';
CREATE USER 'donor'@'localhost' IDENTIFIED BY 'abc123';
CREATE USER 'applicant'@'localhost' IDENTIFIED BY 'abc123';


Create view donbank_v AS
select * from bloodbank.bloodrepo;

Create view req_v AS
select * from bloodbank.bloodrequest;

Create view branch_v AS
select * from bloodbank.branch;

Create view employee_v AS
select * from bloodbank.employee;


GRANT ALL ON bloodbank.donbank_v TO 'employee'@'localhost' IDENTIFIED BY 'abc123';
GRANT ALL ON bloodbank.req_v TO 'employee'@'localhost' IDENTIFIED BY 'abc123';
GRANT ALL ON bloodbank.branch_v TO 'employee'@'localhost' IDENTIFIED BY 'abc123';
GRANT ALL ON bloodbank.employee_v TO 'employee'@'localhost' IDENTIFIED BY 'abc123';
GRANT ALL ON bloodbank.donor TO 'employee'@'localhost' IDENTIFIED BY 'abc123';

GRANT SELECT ON bloodbank.donbank_v TO 'donor'@'localhost' IDENTIFIED BY 'abc123';
GRANT INSERT ON bloodbank.donor TO 'donor'@'localhost' IDENTIFIED BY 'abc123';
GRANT UPDATE ON bloodbank.donor TO 'donor'@'localhost' IDENTIFIED BY 'abc123';

GRANT SELECT ON bloodbank.req_v TO 'applicant'@'localhost' IDENTIFIED BY 'abc123';
GRANT INSERT ON bloodbank.req_v TO 'applicant'@'localhost' IDENTIFIED BY 'abc123';
GRANT UPDATE ON bloodbank.req_v TO 'applicant'@'localhost' IDENTIFIED BY 'abc123';
GRANT SELECT ON bloodbank.branch_v TO 'applicant'@'localhost' IDENTIFIED BY 'abc123';
GRANT SELECT ON bloodbank.donbank_v TO 'applicant'@'localhost' IDENTIFIED BY 'abc123';