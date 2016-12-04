create table UserAccount
(emailAddress varchar2(100),
passwordHash varchar2(255), 
firstName varchar2(25), 
lastName varchar2(25), 
phoneNumber varchar2(20), 
role varchar2(25), 
addr1 varchar2(25), 
addr2 varchar2(25), 
state varchar2(2), 
city varchar2(25), 
zipCode integer,
primary key (emailAddress));

Commit All;