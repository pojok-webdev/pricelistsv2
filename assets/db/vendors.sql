drop table if exists vendors;
create table vendors (id int primary key auto_increment,name varchar(200),address text,active varchar(1) default "1", createdate timestamp default current_timestamp);
insert into vendors (name,address) values ('Pasar Krian','Krian');
insert into vendors (name,address) values ('Pak Farid','Krian');
insert into vendors (name,address) values ('Abah Iyunk','Surabaya');
insert into vendors (name,address) values ('Pak Deny','Surabaya');
insert into vendors (name,address) values ('Pak Bin','Cemeng');
