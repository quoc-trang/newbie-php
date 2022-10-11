create table feedback(
    id integer primary key auto_increment,
    name varchar(100) not null,
    email varchar(100) not null,
    body TEXT,
    date datetime
);
insert into feedback(name, email, body, date) values 
('wilson', 'wilson@gmail.com', 'beter perfomence will get more', current_timestamp());
insert into feedback(name, email, body, date) values 
('barney', 'barney@gmail.com', 'legendary', current_timestamp());
insert into feedback(name, email, body, date) values 
('ted', 'ted@gmail.com', 'ted west side', current_timestamp());
