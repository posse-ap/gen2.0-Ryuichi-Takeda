DROP SCHEMA IF EXISTS webapp;
CREATE SCHEMA webapp;
USE webapp;


DROP TABLE IF EXISTS users;


CREATE TABLE users (
    id INT,
    user_name VARCHAR(140)
);

INSERT INTO users VALUES
    (1,'佐藤'),
    (2,'田中'),
    (3,'高橋');



DROP TABLE IF EXISTS dates;
CREATE TABLE dates (
    id INT,
    day DATE
);

INSERT INTO dates VALUES
    (1,'2022-02-11'),
    (2,'2022-02-20'),
    (3,'2022-03-11'),
    (4,'2022-03-14'),
    (5,'2022-03-17'),
    (6,'2022-03-19');




DROP TABLE IF EXISTS posts;
CREATE TABLE posts (
    id INT,
    comment VARCHAR(140),
    hour INT,
    date_id INT,
    user_id INT
);


INSERT INTO posts VALUES
    (1,'難しかった',1,1,1),
    (2,'',3,1,1),
    (3,'',2,1,2),
    (4,'',4,2,1),
    (5,'',1,3,2),
    (6,'終わった',6,4,2),
    (7,'終わった',4,5,2),
    (8,'',4,5,3),
    (9,'',4,6,3);


DROP TABLE IF EXISTS contents;
CREATE TABLE contents (
    id INT,
    content VARCHAR(140),
    content_color VARCHAR(140)
    -- post_id INT
    -- hour INT
);


INSERT INTO contents VALUES
(1,'N予備校','rgb(0,66,229)'),
(2,'ドットインストール','rgb(0,112,185)'),
(3,'POSSE課題','rgb(0,189,219)'),
(4,'その他','rgb(8,205,250)');


DROP TABLE IF EXISTS languages;
CREATE TABLE languages (
    id INT,
    language VARCHAR(140),
    language_color VARCHAR(140)
);

INSERT INTO languages VALUES
(1,'html','rgb(0,66,229)'),
(2,'css','rgb(0,112,185)'),
(3,'js','rgb(0,189,219)'),
(4,'PHP','rgb(8,205,250)'),
(5,'Laravel','rgb(203,173,240)'),
(6,'SQL','rgb(108,67,229)'),
(7,'SHELL','rgb(70,9,232)'),
(8,'その他','rgb(45,0,186)');


DROP TABLE IF EXISTS posts_contents_connect;
CREATE TABLE posts_contents_connect (
    post_id INT,
    content_id INT
);

INSERT INTO posts_contents_connect VALUES
(1,3),
(2,2),
(2,2),
(3,1),
(4,3),
(5,1),
(5,3),
(6,2),
(7,2),
(8,2),
(9,2);

DROP TABLE IF EXISTS posts_languages_connect;
CREATE TABLE posts_languages_connect (
    post_id INT,
    language_id INT
);
INSERT INTO posts_languages_connect VALUES
(1,3),
(2,1),
(2,2),
(2,3),
(3,2),
(4,8),
(5,1),
(5,2),
(5,3),
(6,1),
(6,3),
(7,4),
(7,6),
(8,4),
(8,6),
(9,4),
(9,6);


DROP TABLE IF EXISTS dates_posts_mix;
CREATE table dates_posts_mix  AS  
SELECT 
    user_id,
    posts.id AS post_id,
    date_id,
    day,
    comment,
    hour
    FROM dates left outer join posts on dates.id=date_id;



DROP TABLE IF EXISTS posts_languages_mix;
CREATE table posts_languages_mix  AS  
SELECT 
post_id,
hour,
comment,
date_id,
user_id,
language,
languages.id AS language_id
    FROM  posts_languages_connect join posts on posts.id=post_id
    RIGHT join languages
    ON languages.id=language_id;



DROP TABLE IF EXISTS posts_contents_mix;
CREATE table posts_contents_mix  AS  
SELECT 
post_id,
hour,
comment,
date_id,
user_id,
content,
contents.id AS content_id
    FROM  posts_contents_connect join posts on posts.id=post_id
    RIGHT join contents
    ON contents.id=content_id;



-- DROP TABLE IF EXISTS a;
-- CREATE table a  AS
-- SELECT sum(hour)/POWER(count(hour),2) from posts_contents_mix
-- WHERE post_id = 5;
-- SELECT * FROM a;
-- DROP TABLE IF EXISTS posts_contents_dataes_mix;
-- CREATE table posts_contents_dates_mix  AS  
-- SELECT 
-- post_id,
-- hour,
-- comment,
-- day,
-- user_id,
-- content,
-- content_id
--     FROM dates  join posts_contents_mix on date_id=dates.id;
    -- RIGHT join contents
    -- ON contents.id=content_id;




-- DROP TABLE IF EXISTS contents_languages;
-- CREATE table contents_languages  AS  
-- SELECT 
--     contents.id AS content_id,
--     content,
--     languages.id AS language_id,
--     language,
--     contents.post_id AS posts_id,
--     hour
--     FROM languages  left outer join contents on contents.post_id=languages.post_id;



-- DROP TABLE IF EXISTS mix;
-- CREATE table mix  AS  
-- SELECT 
--     *
--     FROM dates_posts left outer join contents_languages 
--     on dates_posts.post_id=contents_languages.posts_id;





-- DROP TABLE IF EXISTS mix;
-- CREATE table mix AS  
-- SELECT 
--     user_id,
--     posts.id,
--     content,
--     language, 
--     -- month_id,
--     -- date_id,
--     day,
--     hour,
--     comment
--     FROM dates left outer join contents on dates.id=contents.date_id;





-- DROP TABLE IF EXISTS s;
-- CREATE TABLE contents (
--     id INT,
--     content VARCHAR(120),
--     lang VARCHAR(120), 
--     -- month_id INT,
--     date_id INT,
--     comment VARCHAR(120),
--     hour INT
-- );






-- -- ALTER TABLE contents MODIFY COLUMN comment VARCHAR(120);

-- INSERT INTO contents VALUES
--     (1,'{0,1,0}','{0,0,1,0,0,0,0}',1,'難しかった',1),
--     (2,'{0,0,1}','{1,1,1,0,0,0,0}',1,'',3),
--     (3,'{0,1,0}','{0,1,0,0,0,0,0}',2,'',2),
--     (4,'{1,0,0}','{0,0,0,0,0,0,1}',3,'',4),
--     (5,'{0,0,1}','{1,1,1,0,0,0,0}',3,'終わった',1),
--     (6,'{0,0,1}','{1,0,1,0,0,0,0}',4,'',6),
--     (7,'{0,1,0}','{0,0,1,0,0,0,0}',5,'',5),
--     (8,'{0,1,0}','{0,0,0,0,0,0,1}',6,'',1);
--     -- (1,1,'{0,0,1,0,0,0,0}',1,'難しかった',1),
--     -- (2,2,'{1,1,1,0,0,0,0}',1,'',3),
--     -- (3,1,'{0,1,0,0,0,0,0}',2,'',2),
--     -- (4,0,'{0,0,0,0,0,0,1}',3,'',4),
--     -- (5,2,'{1,1,1,0,0,0,0}',3,'終わった',1),
--     -- (6,2,'{1,0,1,0,0,0,0}',4,'',6),
--     -- (7,1,'{0,0,1,0,0,0,0}',5,'',5),
--     -- (8,1,'{0,0,0,0,0,0,1}',6,'',1);



-- DROP TABLE IF EXISTS mix;
-- CREATE table mix AS  
-- SELECT 
--     user_id,
--     content,
--     lang, 
--     -- month_id,
--     date_id,
--     day,
--     hour,
--     comment
--     FROM dates left outer join contents on dates.id=contents.date_id;
    -- WHERE big_question_id=$id AND question_number=$i+1;


    -- https://qiita.com/morikuma709/items/9fde633db9171b36a068







-- CREATE table as mix (select * from questions left outer  join choices on questions.id=choice) as mix;


-- DROP TABLE IF EXISTS mix;
-- CREATE TABLE mix (
--     id INT,
--     big_question_id INT,
--     question_id INT,
--     region VARCHAR(140),
--     valid INT
-- );

-- INSERT INTO mix VALUES
--     (1,1,1,'たかなわ',1),
--     (2,1,1,'こうわ',0),
--     (3,1,1,'たかわ',0),
--     (4,1,2,'かめいど',1),
--     (5,1,2,'かめど',0),
--     (6,1,2,'かめと',0),
--     (7,2,1,'みよし',1),
--     (8,2,1,'みかた',0),
--     (9,2,1,'みつぎ',0);
    


-- CREATE table as mix (
-- SELECT 
--     -- questions.big_question_id,choices.id,choices.region,choices.valid
--     *
--     FROM questions
--     INNER JOIN choices 
--     ON questions.id = choices.question_id);

-- DROP TABLE IF EXISTS mix;

-- create table mix as (
-- select choices.id, choices.question_id, choices.region, choices.valid, questions.big_question_id,
-- from 
-- (choices left outer join questions on choices.question_id = questions.id) 
-- left outer join big_questions on questions.big_question_id = big_questions.id);