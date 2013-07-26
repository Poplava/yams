CREATE TABLE timeTracking
(
    issueId int not null,
    userId int not null,
    hoursSpent float not null,
    spentOn datetime not null,
    KEY (issueId),
    KEY (userId)
);
