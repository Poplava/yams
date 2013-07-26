CREATE TABLE relatedIssue
(
    issueId1 int not null,
    issueId2 int not null,
    UNIQUE KEY (issueId1, issueId2)
);
