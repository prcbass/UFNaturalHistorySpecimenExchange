

select * from paleocontext where
EARLIESTEON is null 
and LATESTEON is null
and bed is null
and EARLIESTPERIOD is null
and LATESTPERIOD is null
and GEOLOGICALCONTEXTGROUP is null
and EARLIESTEPOCH is null
and LATESTEPOCH is null
and member is null
and EARLIESTAGE is null
and LATESTAGE is null
and formation is null
and LOWESTBIOSTRATIGRAPHICZONE is null
and EARLIESTERA is null
and LATESTERA is null
and LITHOSTRATIGRAPHICTERMS is null;

--update LOCALITY set PALEOCONTEXTID='422976DA1270C69DE050E380D9CD0A3E'
where PALEOCONTEXTID is null;

select * from IDIGBIOFLAT WHERE LOCALITYID is null;

--update LOCALITY set PALEOCONTEXTID=null where PALEOCONTEXTID='422976DA1270C69DE050E380D9CD0A3E';
