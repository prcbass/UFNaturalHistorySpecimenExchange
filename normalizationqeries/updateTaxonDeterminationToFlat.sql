--ALTER TABLE IDIGBIOFLAT ADD(DETERMINATIONID RAW(16));

UPDATE IDIGBIOFLAT i set i.DETERMINATIONID =
(SELECT 
  d.DETERMINATIONID 
FROM 
  TAXONDETERMINATION d 
WHERE
  NVL(d.T_KINGDOM,0)=NVL(i.KINGDOM,0)
  AND NVL(d.T_PHYLUM,0)=NVL(i.PHYLUM,0)
  AND NVL(d.T_CLASS,0)=NVL(i.CLASS,0)
  AND NVL(d.T_ORDER,0)=NVL(i.TORDER,0)
  AND NVL(d.T_FAMILY,0)=NVL(i.FAMILY,0)
  AND NVL(d.T_GENUS,0)=NVL(i.GENUS,0)
  AND NVL(d.T_SPECIES,0)=NVL(i.INFRASPECIFICEPITHET,0));
  
COMMIT ALL;