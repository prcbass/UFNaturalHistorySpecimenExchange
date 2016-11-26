update IDIGBIOFLAT i set i.COLLECTIONEVENTID = 
(select c.COLLECTIONEVENTID from CollectionEvent c where
NVL(i.RECORDEDBY,0)=NVL(c.collectedBy,0)
AND NVL(i.EVENTDATE,0)=NVL(c.collectionDate,0)
AND NVL(i.fieldNumber,0)=NVL(c.fieldNumber,0)
AND i.LOCALITYID=c.LOCALITYID);

COMMIT ALL;

select count(distinct COLLECTIONEVENTID) from IDIGBIOFLAT;
select count(COLLECTIONEVENTID) from COLLECTIONEVENT;



--select count(*) from IDIGBIOFLAT where COLLECTIONEVENTID is null;