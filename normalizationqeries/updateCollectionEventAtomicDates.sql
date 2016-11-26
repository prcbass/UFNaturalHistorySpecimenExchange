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
collectionDate not like '____-00-%';


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
collectionDate not like '____-00-%';


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
(length(collectionDate) - (INSTR(collectionDate, '-', 1, 1)))) != '1--2';


--for year of dates likes 1978
update CollectionEvent
set yearCollected = TO_NUMBER(collectionDate)
where collectionDate like '____' and
collectionDate not like '-__-';


--for year of dates like 1977-02
update CollectionEvent
set yearCollected = TO_NUMBER(SUBSTR(collectionDate, 1, 4))
where collectionDate like '____-_' or
collectionDate like '____-__';


--for month of dates like 1977-02
update CollectionEvent
set monthCollected = TO_NUMBER(SUBSTR(collectionDate, 6, length(collectionDate) - 5))
where collectionDate like '____-_' or
collectionDate like '____-__';


--for year of dates like 1973-12-04 00:00:00.0
update CollectionEvent
set yearCollected = TO_NUMBER(SUBSTR(collectionDate, 1, (INSTR(collectionDate, '-', 1, 1)) - 1))
where collectionDate like '%:%' and 
collectionDate not like '%/%' and
collectionDate not like '%t%:%';


--for month of dates like 1973-12-04 00:00:00.0
update CollectionEvent
set monthCollected = TO_NUMBER(SUBSTR(collectionDate, INSTR(collectionDate, '-', 1, 1) + 1, 
(INSTR(collectionDate, '-', 1, 2) - 1) - (INSTR(collectionDate, '-', 1, 1))))
where collectionDate like '%:%' and 
collectionDate not like '%/%' and
collectionDate not like '%t%:%';


--for day of dates like 1973-12-04 00:00:00.0
update CollectionEvent
set dateCollected = TO_NUMBER(SUBSTR(collectionDate, INSTR(collectionDate, '-', 1, 2) + 1, 
((INSTR(collectionDate, ' ', 1, 1)) - 1) - INSTR(collectionDate, '-', 1, 2) + 1))
where collectionDate like '%:%' and 
collectionDate not like '%/%' and
collectionDate not like '%t%:%';
