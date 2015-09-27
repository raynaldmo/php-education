# Forum database for Chapter 7
CREATE DATABASE forum CHARACTER SET utf8 COLLATE utf8_general_ci;
USE forum;

CREATE TABLE forums (
forum_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(60) NOT NULL,
PRIMARY KEY (forum_id),
UNIQUE (name)
) ENGINE = INNODB;

CREATE TABLE messages (
message_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
parent_id INT UNSIGNED NOT NULL DEFAULT 0,
forum_id TINYINT UNSIGNED NOT NULL,
user_id MEDIUMINT UNSIGNED NOT NULL,
subject VARCHAR(100) NOT NULL,
body LONGTEXT NOT NULL,
date_entered DATETIME NOT NULL,
PRIMARY KEY (message_id),
INDEX (parent_id),
INDEX (forum_id),
INDEX (user_id),
INDEX (date_entered)
) ENGINE = MYISAM;

CREATE TABLE users (
user_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
username VARCHAR(30) NOT NULL,
pass CHAR(40) NOT NULL,
first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(40) NOT NULL,
email VARCHAR(60) NOT NULL,
PRIMARY KEY (user_id),
UNIQUE (username),
UNIQUE (email),
INDEX login (pass, email)
) ENGINE = INNODB;


INSERT INTO forums (name) VALUES
('MySQL'), ('PHP'), ('Sports'),
('HTML'), ('CSS'), ('Kindling');
INSERT INTO forums (name) VALUES ('Modern Dance');

INSERT INTO users (username, pass, first_name, last_name, email) VALUES
('troutster', SHA1('mypass'), 'Larry', 'Ullman', 'lu@example.com'),
('funny man', SHA1('monkey'), 'David', 'Brent', 'db@example.com'),
('Gareth', SHA1('asstmgr'), 'Gareth', 'Keenan', 'gk@example.com');

INSERT INTO users (username, pass, first_name, last_name, email) VALUES
('tim', SHA1( 'psych' ) , 'Tim', 'Canterbury', 'tc@example.com'),
('finchy', SHA1('jerk'), 'Chris', 'Finch', 'cf@example.com');

SELECT * FROM forums;
SELECT user_id, username FROM users;

INSERT INTO messages (parent_id, forum_id, user_id, subject, body, date_entered) VALUES
(0, 1, 1, 'Question about normalization.', 'I''m confused about normalization. For the second normal form (2NF), I read...', UTC_TIMESTAMP()),
(0, 1, 2, 'Database Design', 'I''m creating a new database and am having problems with the structure. How many tables should I have?...', UTC_TIMESTAMP()),
(2, 1, 2, 'Database Design', 'The number of tables your database includes...', UTC_TIMESTAMP()),
(0, 1, 3, 'Database Design', 'Okay, thanks!', UTC_TIMESTAMP()),
(0, 2, 3, 'PHP Errors', 'I''m using the scripts from Chapter 3 and I can''t get the first calculator example to work. When I submit the form...', UTC_TIMESTAMP());

INSERT INTO messages (parent_id, forum_id, user_id, subject, body, date_entered) VALUES
(5, 2, 1, 'PHP Errors', 'What version of PHP are you using?', UTC_TIMESTAMP()),
(6, 2, 3, 'PHP Errors', 'Version 5.2', UTC_TIMESTAMP()),
(7, 2, 1, 'PHP Errors', 'In that case, try the debugging steps outlined in Chapter 7.', UTC_TIMESTAMP()),
(0, 3, 2, 'Chicago Bulls', 'Can the Bulls really win it all this year?', UTC_TIMESTAMP()),
(9, 3, 1, 'Chicago Bulls', 'I don\'t know, but they sure look good!', UTC_TIMESTAMP()),
(0, 5, 3, 'CSS Resources', 'Where can I found out more information about CSS?', UTC_TIMESTAMP()),
(11, 5, 1, 'CSS Resources', 'Read Elizabeth Castro''s excellent book on (X)HTML and CSS. Or search Google on "CSS".', UTC_TIMESTAMP()),
(0, 4, 3, 'HTML vs. XHTML', 'What are the differences between HTML and XHTML?', UTC_TIMESTAMP()),
(13, 4, 1, 'HTML vs. XHTML', 'XHTML is a cross between HTML and XML. The differences are largely syntactic. Blah, blah, blah...', UTC_TIMESTAMP()),
(0, 6, 4, 'Why?', 'Why do you have a forum dedicated to kindling? Don''t you deal mostly with PHP, MySQL, and so forth?', UTC_TIMESTAMP()),
(0, 2, 3, 'Dynamic HTML using PHP', 'Can I use PHP to dynamically generate HTML on the fly? Thanks...', UTC_TIMESTAMP()),
(16, 2, 1, 'Dynamic HTML using PHP', 'You most certainly can.', UTC_TIMESTAMP()),
(17, 2, 3, 'Dynamic HTML using PHP, still not clear', 'Um, how?', UTC_TIMESTAMP()),
(18, 2, 2, 'Dynamic HTML using PHP, clearer?', 'I think what Larry is trying to say is that you should buy and read his book.', UTC_TIMESTAMP()),
(15, 6, 4, 'Why? Why? Why?', 'Really, why?', UTC_TIMESTAMP()),
(20, 6, 1, 'Because', 'Because', UTC_TIMESTAMP())