create database if not exists online_diary;
use online_diary;
CREATE TABLE user (
    id int not null primary key auto_increment,
    avatar varchar(255) not null,
    email varchar(255),
    userName varchar(255) not null,
    password varchar(255) not null,
    createdAt datetime not null,
    updatedAt datetime not null
);
CREATE TABLE diary (
    id int not null primary key auto_increment,
    image varchar(255),
    content text,
    status int not null,
    createdAt datetime not null,
    updatedAt datetime not null,
    userID int not null,
    constraint fk_diary_user foreign key (userID) references user(id),
    CHECK (image IS NOT NULL OR content IS NOT NULL)
);
CREATE TABLE comment (
    id int not null primary key auto_increment,
    image varchar(255),
    content text,
    createdAt datetime not null,
    updatedAt datetime not null,
    userID int not null,
    diaryID int not null,
    constraint fk_comment_user foreign key (userID) references user(id),
    constraint fk_comment_diary foreign key (diaryID) references diary(id),
    CHECK (image IS NOT NULL OR content IS NOT NULL)
);