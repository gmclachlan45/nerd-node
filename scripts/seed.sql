-- CREATE DATABASE nerdnode; --

use nerdnode;
DROP TABLE postTag;
DROP TABLE userSession;
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
    poster int,
	originalPost int,
    parentComment int,
    likes int,
    content TEXT(65535),
    PRIMARY KEY (id),
    FOREIGN KEY (poster) REFERENCES siteUser(id),
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

CREATE TABLE userSession (
    id varchar(63),
    userId int,
    PRIMARY KEY (id),
    FOREIGN KEY (userId) REFERENCES siteUser(id)
);

CREATE TABLE postTag (
    id int AUTO_INCREMENT,
    tagName varchar(63),
    postId int,
    PRIMARY KEY (id),
    FOREIGN KEY (postId) REFERENCES post(id)
);

INSERT INTO siteUser
VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'default.png', true, false),
(2, 'user1', '5f4dcc3b5aa765d61d8327deb882cf99', 'user1@gmail.com', 'default.png', false, false),
(3, 'user2', '5f4dcc3b5aa765d61d8327deb882cf99', 'user2@gmail.com', 'default.png', false, false),
(4, 'user3', '5f4dcc3b5aa765d61d8327deb882cf99', 'user3@gmail.com', 'default.png', false, false),
(5, 'user4', '5f4dcc3b5aa765d61d8327deb882cf99', 'user4@gmail.com', 'default.png', false, false);

INSERT INTO post
VALUES
    (1, 'Title 1', 1, 'This is the main body of the post and you should know', 5222, 'post-one'),
    (2, 'Title 2', 2, 'This is the main SNOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOX and you should know', 20525, 'post-two'),
    (3, 'Title 3', 3, 'This is the main body of the post know', -253, 'post-thr'),
    (4, 'Title 3 again', 3, 'This is the m the post and you should know', 24, 'post-for');

INSERT INTO comment
VALUES
    (1,  2,1, NULL, 2555, 'LANDMASTER!'),
    (2,  3, 1, 1, -5257, 'Personally, I prefer the air'),
    (3,  2, 1, NULL, 0, 'Cringe + L + Ratio'),
    (4, 1, 3, NULL, 222222, 'Try again\n and we will find a way');
