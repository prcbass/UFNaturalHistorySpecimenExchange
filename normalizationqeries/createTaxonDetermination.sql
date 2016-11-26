create table TaxonDetermination
	(determinationID raw(16) default sys_guid(), 
t_kingdom varchar2(12),
t_phylum varchar2(33),
t_class varchar2(26),
t_order varchar2(22),
t_family varchar2(38), 
t_genus varchar2(25), 
t_species varchar(45),
primary key (determinationID));

select max(length(INFRASPECIFICEPITHET)) from IDIGBIOFLAT;
/*
Mapping:
	T_kingdom -> kingdom
T_phylum -> phylum
T_class -> class
T_order -> torder
T_family -> family
T_genus -> genus
	institutionCode -> institutionCode
	collectionCode -> collectionCode
	catalogNumber -> catalogNumber
*/


