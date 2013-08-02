CREATE TABLE issue
(
    issueId int not null auto_increment primary key,
    parentId int,
    issueTypeId tinyint not null,
    issueStatusId tinyint not null,
    assigneeUserId int,
    authorUserId int not null,
    title varchar(255) not null,
    description text,
    createdOn datetime not null,
    updatedOn datetime not null,
    percentDone tinyint default 0
);
