insert into CollectionEvent
(collectedBy, collectionDate, fieldNumber, institutionCode, collectionCode, 
LOCALITYID)
  select distinct RECORDEDBY, EVENTDATE, fieldNumber, institutionCode, 
  collectionCode, LOCALITYID 
from idigbioflat;