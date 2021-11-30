create database Infinity;
use Infinity;

create table user (
    user_id             int         auto_increment primary key,
    user_username       varchar(50) not null unique,
    user_password       varchar(50) not null,
    user_last_access    datetime    not null   
);



create table score (
    score_id            int             auto_increment primary key ,
    score_user_username varchar(50)     not null,
    score_user_id       int             not null,
    points              bigint          not null
);


insert into score(
    score_user_username, score_user_id, points
)
values(
    'ItzSeb', 2, 1
);

select * from score order by points desc; 