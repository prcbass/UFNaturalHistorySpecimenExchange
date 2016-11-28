create table Specimen 
(COREID VARCHAR2(36),
SPECIMENID raw(16) default sys_guid(),
institutionCode varchar2(105), 
collectionCode varchar2(69),
basisOfRecord varchar2(25),   
catalogNumber varchar2(63), 
TYPESTATUS varchar2(422),
COLLECTIONTEVENTID RAW(16),
DETERMINATIONID RAW(16),
primary key (SPECIMENID));

insert into