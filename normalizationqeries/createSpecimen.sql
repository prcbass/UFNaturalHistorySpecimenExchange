create table Specimen 
(occurenceID raw(16),
institutionCode varchar2(10), 
basisOfRecord varchar2(25), 
recordID integer,
recordSet varchar2(25), 
collectionCode varchar2(10), 
typeStatus varchar2(25), 
catalogNumber varchar2(20), 
institutionID integer;


select distinct I_BARCODEVALUE from IDIGBIOFLAT;
barcodeValue integer, 

select KINGDOM,PHYLUM,CLASS,TORDER,FAMILY,GENUS,SPECIFICEPITHET,INFRASPECIFICEPITHET 
from IDIGBIOFLAT where SPECIFICEPITHET is not null;