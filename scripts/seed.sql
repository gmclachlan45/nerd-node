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
	username varchar(255) UNIQUE,
	password varchar(255),
    email varchar(255) UNIQUE,
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
    reported boolean,
    sku varchar(255),
    PRIMARY KEY (id),
    FOREIGN KEY (poster) REFERENCES siteUser(id) ON DELETE CASCADE
);

CREATE TABLE comment (
	id int AUTO_INCREMENT,
    poster int,
	originalPost int,
    parentComment int,
    likes int,
    reported boolean,
    content TEXT(65535),
    PRIMARY KEY (id),
    FOREIGN KEY (poster) REFERENCES siteUser(id),
    FOREIGN KEY (originalPost) REFERENCES post(id) ON DELETE CASCADE,
    FOREIGN KEY (parentComment) REFERENCES comment(id) ON DELETE CASCADE
);

CREATE TABLE postReport (
	id int AUTO_INCREMENT,
	reporter int,
    reportedPost int,
    PRIMARY KEY (id),
    FOREIGN KEY (reporter) REFERENCES siteUser(id) ON DELETE CASCADE,
    FOREIGN KEY (reportedPost) REFERENCES post(id) ON DELETE CASCADE
);

CREATE TABLE commentReport (
	id int AUTO_INCREMENT,
	reporter int,
    reportedComment int,
    PRIMARY KEY (id),
    FOREIGN KEY (reporter) REFERENCES siteUser(id) ON DELETE CASCADE,
    FOREIGN KEY (reportedComment) REFERENCES comment(id) ON DELETE CASCADE
);

CREATE TABLE userSession (
    id varchar(63),
    userId int,
    PRIMARY KEY (id),
    FOREIGN KEY (userId) REFERENCES siteUser(id) ON DELETE CASCADE
);

CREATE TABLE postTag (
    id int AUTO_INCREMENT,
    tagName varchar(63),
    postId int,
    PRIMARY KEY (id),
    FOREIGN KEY (postId) REFERENCES post(id) ON DELETE CASCADE
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
    (1, 'Code Improvement Books', 2, 'Just finished reading "Clean Code" by Robert C. Martin. What other books do you recommend for improving coding skills?', 20525, false,'code-improvement'),
    (2, 'After Grad Suggestions', 3, 'Debating between pursuing a master''s degree or entering the workforce after undergrad. What factors should I consider?', -253, false,'grad-work-force'),
    (3, 'Algorithm Help!!!', 3, 'Struggling with understanding algorithms. Any recommended resources or study techniques?', 24,false, 'algorithm-help'),
    (4, 'Yes I know, I just asked for Algorithm help, but I also have a huge project Idea.', 3, 'Just completed a deep dive into machine learning algorithms, and I''m blown away by the potential applications in various industries! From predictive analytics to natural language processing, the possibilities seem endless. However, I''m struggling to decide which specific area to focus on for my next project. Should I delve deeper into neural networks and explore deep learning techniques, or should I explore reinforcement learning for more interactive applications? I''d love to hear from fellow enthusiasts about their experiences and recommendations. Additionally, if anyone has any project ideas or resources they could share, I''d greatly appreciate it. Let''s discuss and collaborate on pushing the boundaries of machine learning together!', 24,false, 'ml-algorithm'),
        (5, 'SPAM SPAM', 2, 'SPAM SPAMSPAM SPAMSPAM SPAMSPAM SPAMSPAM SPAMSPAM SPAMSPAM SPAMSPAM SPAMSPAM SPAMSPAM SPAMSPAM SPAMSPAM SPAM', 20525, true,'code-improvement');

INSERT INTO comment
VALUES
    (1,  2,1, NULL, 2555,false, 'LANDMASTER!'),
    (2,  3, 1, 1, -5257,false, 'Personally, I prefer the air'),
    (3,  2, 1, NULL, 0,false, 'Cringe + L + Ratio'),
    (4,  2, 1, NULL, -1000,true, 'SPAMSP AMSPAMSP AMSPAMSPAMS PAMSPAM SPAMSPAMSPA MSPAMSPAMSPA MSPAMSPAM SPAMSPAMSPAMSPAMS PAMSPAM'),
    (5, 1, 3, NULL, 222222,false, 'Try again\n and we will find a way');
