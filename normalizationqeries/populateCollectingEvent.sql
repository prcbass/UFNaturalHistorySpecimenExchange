insert into CollectionEvent
(collectedBy, collectionDate, fieldNumber,LOCALITYID)
  select distinct RECORDEDBY, EVENTDATE, fieldNumber, LOCALITYID 
from idigbioflat;

select count(*) from COLLECTIONEVENT WHERE 
collectedby is null and collectiondate is null and FIELDNUMBER is null;
select count(*) from IDIGBIOFLAT where RECORDEDBY is null and 
EVENTDATE is null AND FIELDNUMBER IS NULL;

select count(*) from COLLECTIONEVENT where COLLECTIONDATE is null;
select count(*) from IDIGBIOFLAT WHERE EVENTDATE IS NULL;

select count(*) from (
select distinct RECORDEDBY, EVENTDATE, fieldNumber, LOCALITYID 
from idigbioflat);

select count(*) from COLLECTIONEVENT;