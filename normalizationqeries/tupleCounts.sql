select 
  (select count(*) from IDIGBIOFLAT) as FlatCount,
  (select count(*) from COLLECTIONEVENT) as COLLECTIONEVENTCOUNT,
  (select count(*) from LOCALITY) as LOCALITYCOUNT,
  (select count(*) from PALEOCONTEXT) as PALEOCONTEXTCOUNT,
  (select count(*) from TAXONDETERMINATION) as DETERMINATIONCOUNT
from
  WHBTEST;