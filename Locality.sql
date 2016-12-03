--NOTE, this query does not contain NVL selection and is therefore outdated. 

create table Locality 
(localityID raw(16) default sys_guid(), 
continent varchar2(25), 
latitude number(38,5), 
longitude number(38,5),
I_GEOPOINT varchar2(55),
verbatimLocality varchar2(1255), 
infraspecificEpithet varchar2(45), 
waterbody varchar2(65), 
municipality varchar2(75), 
country varchar2(35), 
state varchar2(40), 
maximumDepth number(38,4), 
minimumDepth number(38,4), 
maximumElevation number(38,4),
minimumElevation number(38,4), 
collectionEventID integer,
primary key (localityID));


insert into Locality
(continent, I_GEOPOINT, verbatimLocality, infraspecificEpithet, waterbody, 
municipality, country, state, maximumDepth, minimumDepth, maximumElevation, 
minimumElevation)
  select distinct continent, I_GEOPOINT, verbatimLocality, infraspecificEpithet,
  waterbody, municipality, country, STATEPROVINCE, MAXIMUMDEPTHINMETERS, 
  MINIMUMDEPTHINMETERS, MAXIMUMELEVATIONINMETERS, MINIMUMELEVATIONINMETERS
from idigbioflat

--then call getLatLong.php script to populate Latitude/Longitude columns