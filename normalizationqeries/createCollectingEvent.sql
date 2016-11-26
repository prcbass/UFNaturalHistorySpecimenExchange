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
LOCALITYID RAW(16),
primary key (collectionEventID));
