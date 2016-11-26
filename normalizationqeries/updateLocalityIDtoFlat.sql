update IDIGBIOFLAT i set i.LOCALITYID = (
 select l.LOCALITYID from LOCALITY l WHERE
 NVL(i.continent,0)=NVL(l.continent,0)
 AND NVL(i.I_GEOPOINT,0)=NVL(l.I_GEOPOINT,0)
 AND NVL(i.verbatimLocality,0)=NVL(l.verbatimLocality,0)
 AND NVL(i.infraspecificEpithet,0)=NVL(l.infraspecificEpithet,0)
 AND NVL(i.waterbody,0)=NVL(l.waterbody,0)
 AND NVL(i.municipality,0)=NVL(l.municipality,0)
 AND NVL(i.country,0)=NVL(l.country,0)
 AND NVL(i.STATEPROVINCE,0)=NVL(l.state,0)
 AND NVL(i.MAXIMUMDEPTHINMETERS,0)=NVL(l.maximumDepth,0)
 AND NVL(i.MINIMUMDEPTHINMETERS,0)=NVL(l.minimumDepth,0)
 AND NVL(i.MAXIMUMELEVATIONINMETERS,0)=NVL(l.maximumElevation,0)
 AND NVL(i.MINIMUMELEVATIONINMETERS,0)=NVL(l.minimumElevation,0)
 AND i.PALEOCONTEXTID=l.PALEOCONTEXTID);
 
 COMMIT ALL;