create table Institution
(institutionID VARCHAR2(105 BYTE), 
contactPhoneNumber integer, 
contactName varchar2(25), 
contactEmailAddress varchar2(25),
contactFirstName varchar2(25), 
contactLastname varchar2(25),
primary key (institutionID));

insert into Institution
(institutionID)
  select distinct NVL(INSTITUTIONCODE, 0)
from Specimen;