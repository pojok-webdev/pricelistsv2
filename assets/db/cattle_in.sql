drop table if exists cattle_in;
create table cattle_in (id int primary key auto_increment,cattletype_id int,arrivaldate datetime,weight decimal(5,2),age decimal(5,2),staff_id int,vendor_id int,createdate timestamp default current_timestamp );
