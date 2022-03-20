DROP SCHEMA IF EXISTS quizy;
CREATE SCHEMA quizy;
USE quizy;


DROP TABLE IF EXISTS big_questions;

CREATE TABLE big_questions (
    id INT,
    prefecture_name VARCHAR(140)
);

INSERT INTO big_questions VALUES
    (1,'東京'),
    (2,'広島');


DROP TABLE IF EXISTS questions;

CREATE TABLE questions (
    question_id INT,
    big_question_id INT,
    img VARCHAR(140)
);

INSERT INTO questions VALUES
    (1,1,'../img/takanawa.png'),
    (2,1,'../img/kameido.png'),
    (3,2,'../img/miyoshi.png');

DROP TABLE IF EXISTS choices;
CREATE TABLE choices (
    id INT,
    question_id INT,
    question_number INT,
    region VARCHAR(140),
    valid INT
);

INSERT INTO choices VALUES
    (1,1,1,'たかなわ',1),
    (2,1,1,'こうわ',0),
    (3,1,1,'たかわ',0),
    (4,2,2,'かめいど',1),
    (5,2,2,'かめど',0),
    (6,2,2,'かめと',0),
    (7,3,1,'みよし',1),
    (8,3,1,'みかた',0),
    (9,3,1,'みつぎ',0);

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