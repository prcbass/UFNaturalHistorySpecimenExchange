insert into Locality
(continent, I_GEOPOINT, verbatimLocality, infraspecificEpithet, waterbody, 
municipality, country, state, maximumDepth, minimumDepth, maximumElevation, 
minimumElevation,PALEOCONTEXTID)
  select distinct NVL(continent,0), NVL(I_GEOPOINT,0), NVL(verbatimLocality,0), NVL(infraspecificEpithet,0),
  NVL(waterbody,0), NVL(municipality,0), NVL(country,0), NVL(STATEPROVINCE,0), NVL(MAXIMUMDEPTHINMETERS,0), 
  NVL(MINIMUMDEPTHINMETERS,0), NVL(MAXIMUMELEVATIONINMETERS,0), NVL(MINIMUMELEVATIONINMETERS,0),PALEOCONTEXTID
from idigbioflat;