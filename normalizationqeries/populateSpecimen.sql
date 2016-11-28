insert into SPECIMEN
(COREID,institutionCode,collectionCode,basisOfRecord,catalogNumber,TYPESTATUS,COLLECTIONEVENTID,DETERMINATIONID)
select 
  COREID,
  institutionCode,
  collectionCode,
  basisOfRecord,
  catalogNumber,
  TYPESTATUS,
  COLLECTIONEVENTID,
  DETERMINATIONID
FROM
  IDIGBIOFLAT;
  
COMMIT ALL;
  