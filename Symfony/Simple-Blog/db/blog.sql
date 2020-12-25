DROP DATABASE IF EXISTS blog;
CREATE DATABASE blog;
USE blog;

CREATE TABLE posts (
  post_id int NOT NULL AUTO_INCREMENT,
  post_title CHAR(128) DEFAULT NULL,
  post_date DATE,
  post_text MEDIUMTEXT,
  PRIMARY KEY (post_id)
);

INSERT INTO posts (post_title, post_date, post_text) VALUES ('First post', '2020-12-24', 'First post text');
INSERT INTO posts (post_title, post_date, post_text) VALUES ('Second post', '2020-12-24', 'Second post text');
INSERT INTO posts (post_title, post_date, post_text) VALUES ('Third post', '2020-12-24', 'Third post text');