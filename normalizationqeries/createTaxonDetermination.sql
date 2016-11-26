create table TaxonDetermination
	(determinationID raw(16) default sys_guid(),
vernacularname varchar(122),
I_COMMONNAMES varchar(126),
t_kingdom varchar2(12),
t_phylum varchar2(33),
t_class varchar2(26),
t_order varchar2(22),
t_family varchar2(38), 
t_genus varchar2(25), 
t_species varchar(35),
t_subspecies varchar2(45),
primary key (determinationID));

select max(length(I_COMMONNAMES)) from IDIGBIOFLAT;

--drop table TAXONDETERMINATION;
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

commit all;

