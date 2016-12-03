--NOTE, this query does not contain NVL selection and is therefore outdated. 

create table CollectionEvent
(collectionEventID raw(16) default sys_guid(), 
collectedBy varchar2(215), 
monthCollected integer, 
dateCollected integer,
yearCollected integer,
collectionDate varchar2(35),
fieldNumber varchar2(210),
institutionCode varchar2(105), 
collectionCode varchar2(70), 
catalogNumber varchar2(65),
primary key (collectionEventID));


insert into CollectionEvent
(collectedBy, collectionDate, fieldNumber, institutionCode, collectionCode, 
catalogNumber)
  select distinct RECORDEDBY, EVENTDATE, fieldNumber, institutionCode, 
  collectionCode, catalogNumber 
from idigbioflat;


--for year of correctly formatted date
update CollectionEvent
set yearCollected = TO_NUMBER(SUBSTR(collectionDate, 1, (INSTR(collectionDate, '-', 1, 1)) - 1))
where collectionDate like '____-%_-%_' and
collectionDate not like '%/%' and
collectionDate not like '%:%' and
collectionDate not like '____-0-0' and
collectionDate not like '____-0-00' and 
collectionDate not like '____-00-0' and 
collectionDate not like '____-00-00' and
collectionDate not like '____-%-00' and 
collectionDate not like '____-0-%' and 
collectionDate not like '____-00-%'


--for month of correctly formatted date
update CollectionEvent
set monthCollected = TO_NUMBER(SUBSTR(collectionDate, INSTR(collectionDate, '-', 1, 1) + 1, 
(INSTR(collectionDate, '-', 1, 2) - 1) - (INSTR(collectionDate, '-', 1, 1))))
where collectionDate like '____-%_-%_' and
collectionDate not like '%/%' and
collectionDate not like '%:%' and
collectionDate not like '____-0-0' and
collectionDate not like '____-0-00' and 
collectionDate not like '____-00-0' and 
collectionDate not like '____-00-00' and
collectionDate not like '____-%-00' and 
collectionDate not like '____-0-%' and 
collectionDate not like '____-00-%'


--for date of correctly formatted date
update CollectionEvent
set dateCollected = TO_NUMBER(SUBSTR(collectionDate, INSTR(collectionDate, '-', 1, 2) + 1, 
(length(collectionDate) - (INSTR(collectionDate, '-', 1, 1)))))
where collectionDate like '____-%_-%_' and
collectionDate not like '%/%' and
collectionDate not like '%:%' and
collectionDate not like '____-0-0' and
collectionDate not like '____-0-00' and 
collectionDate not like '____-00-0' and 
collectionDate not like '____-00-00' and
collectionDate not like '____-%-00' and 
collectionDate not like '____-0-%' and 
collectionDate not like '____-00-%' and
SUBSTR(collectionDate, INSTR(collectionDate, '-', 1, 2) + 1, 
(length(collectionDate) - (INSTR(collectionDate, '-', 1, 1)))) != '1--2'


--for year of dates likes 1978
update CollectionEvent
set yearCollected = TO_NUMBER(collectionDate)
where collectionDate like '____' and
collectionDate not like '-__-'


--for year of dates like 1977-02
update CollectionEvent
set yearCollected = TO_NUMBER(SUBSTR(collectionDate, 1, 4))
where collectionDate like '____-_' or
collectionDate like '____-__'


--for month of dates like 1977-02
update CollectionEvent
set monthCollected = TO_NUMBER(SUBSTR(collectionDate, 6, length(collectionDate) - 5))
where collectionDate like '____-_' or
collectionDate like '____-__'


--for year of dates like 1973-12-04 00:00:00.0
update CollectionEvent
set yearCollected = TO_NUMBER(SUBSTR(collectionDate, 1, (INSTR(collectionDate, '-', 1, 1)) - 1))
where collectionDate like '%:%' and 
collectionDate not like '%/%' and
collectionDate not like '%t%:%'


--for month of dates like 1973-12-04 00:00:00.0
update CollectionEvent
set monthCollected = TO_NUMBER(SUBSTR(collectionDate, INSTR(collectionDate, '-', 1, 1) + 1, 
(INSTR(collectionDate, '-', 1, 2) - 1) - (INSTR(collectionDate, '-', 1, 1))))
where collectionDate like '%:%' and 
collectionDate not like '%/%' and
collectionDate not like '%t%:%'


--for day of dates like 1973-12-04 00:00:00.0
update CollectionEvent
set dateCollected = TO_NUMBER(SUBSTR(collectionDate, INSTR(collectionDate, '-', 1, 2) + 1, 
((INSTR(collectionDate, ' ', 1, 1)) - 1) - INSTR(collectionDate, '-', 1, 2) + 1))
where collectionDate like '%:%' and 
collectionDate not like '%/%' and
collectionDate not like '%t%:%'