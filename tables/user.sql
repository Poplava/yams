CREATE TABLE user
(
    userId int not null auto_increment primary key,
    roleId int not null default 0,
    email varchar(255) not null,
    passwordHash char(32) not null,
    firstName varchar(255) not null,
    lastName varchar(255) not null,
    karma int default 0,
    avatarFile varchar(255),
    registeredOn datetime not null,
    UNIQUE KEY (email)
);
