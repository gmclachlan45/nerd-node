-- CREATE DATABASE nerdnode; --

use nerdnode;

DROP TABLE commentReport;
DROP TABLE postReport;
DROP TABLE comment;
DROP TABLE post;
DROP TABLE siteUser;

CREATE TABLE siteUser (
	id int AUTO_INCREMENT,
	username varchar(255),
	password varchar(255),
    email varchar(255),
    profilePicture varchar(255),
    isAdmin boolean,
    isDisabled boolean,
    PRIMARY KEY (id)
);

CREATE TABLE post (
	id int AUTO_INCREMENT,
	title varchar(255),    poster int,
    content TEXT(65535),
    likes int,
    sku varchar(255),
    PRIMARY KEY (id),
    FOREIGN KEY (poster) REFERENCES siteUser(id)
);

CREATE TABLE comment (
	id int AUTO_INCREMENT,
	originalPost int,
    parentComment int,
    likes int,
    content TEXT(65535),
    PRIMARY KEY (id),
    FOREIGN KEY (originalPost) REFERENCES post(id),
    FOREIGN KEY (parentComment) REFERENCES comment(id)
);

CREATE TABLE postReport (
	id int AUTO_INCREMENT,
	reporter int,
    reportedPost int,
    PRIMARY KEY (id),
    FOREIGN KEY (reporter) REFERENCES siteUser(id),
    FOREIGN KEY (reportedPost) REFERENCES post(id)
);

CREATE TABLE commentReport (
	id int AUTO_INCREMENT,
	reporter int,
    reportedComment int,
    PRIMARY KEY (id),
    FOREIGN KEY (reporter) REFERENCES siteUser(id),
    FOREIGN KEY (reportedComment) REFERENCES comment(id)
);

INSERT INTO siteUser
VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'default.png', true, false),
(2, 'user1', 'password', 'user1@gmail.com', 'default.png', false, false),
(3, 'user2', 'password', 'user2@gmail.com', 'default.png', false, false),
(4, 'user3', 'password', 'user3@gmail.com', 'default.png', false, false),
(5, 'user4', 'password', 'user4@gmail.com', 'default.png', false, false);

INSERT INTO post
VALUES
    (1, 'Title 1', 1, 'This is the main body of the post and you should know', 5222, 'post-one'),
    (2, 'Title 2', 2, 'This is the main SNOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOX and you should know', 20525, 'post-two'),
    (3, 'Title 3', 3, 'This is the main body of the post know', -253, 'post-thr'),
    (4, 'Title 3 again', 3, 'This is the m the post and you should know', 24, 'post-for');

INSERT INTO comment
VALUES
    (1, 1, NULL, 2555, 'LANDMASTER!'),
    (2, 1, 1, -5257, 'Personally, I prefer the air'),
    (3, 1, NULL, 0, 'Cringe + L + Ratio'),
    (4, 3, NULL, 222222, 'Try again\n and we will find a way');
