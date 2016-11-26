// For some reason, that I shall henceforth refere to as The Miracle of Oracle,
// precisely two records in the IDIGBIOFLAT table that never get a localityID
// It is always because the maxiumdepth is rounding. These queries help find and 
// fix.
 
select
  COREID,
  continent,
  I_GEOPOINT,
  verbatimLocality,
  infraspecificEpithet,
  waterbody,
  municipality,
  country,
  STATEPROVINCE,
  MAXIMUMDEPTHINMETERS,
  MINIMUMDEPTHINMETERS,
  MAXIMUMELEVATIONINMETERS,
  MINIMUMELEVATIONINMETERS,
  PALEOCONTEXTID
FROM
  IDIGBIOFLAT
WHERE
  LOCALITYID is null;
  
  0fe577be-8c0c-48d1-9b98-aa5bfedce355 201.1999969482 182.8999938965
  fd4e539f-02a1-43b1-a37c-86a839bdf01f 45.7000007629
  
  select * from locality where maximumdepth like '201.%';
  
  --update IDIGBIOFLAT set LOCALITYID = '4228C5EF889C3DCAE050E380D9CD0D20'
  where COREID='0fe577be-8c0c-48d1-9b98-aa5bfedce355';
  
  

  
  
  
  
  
  
  