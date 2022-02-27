DROP TABLE IF EXISTS choices;
DROP TABLE IF EXISTS questions;
DROP TABLE IF EXISTS prefectures;


CREATE TABLE prefectures (
    id INT NOT NULL AUTO_INCREMENT,
    prefecture VARCHAR(20), 
    PRIMARY KEY (id)
);

CREATE TABLE questions (
    id INT NOT NULL AUTO_INCREMENT,
    prefecture_id INT,
    question VARCHAR(20), 
    PRIMARY KEY (id)
);

CREATE TABLE choices (
    id INT NOT NULL AUTO_INCREMENT,
    question_id INT,
    choice VARCHAR(20), 
    result  VARCHAR(20),
    PRIMARY KEY (id),
    FOREIGN KEY (question_id) REFERENCES questions(id)
);

INSERT INTO prefectures(prefecture) VALUES
    ('東京'),
    ('広島');
    
INSERT INTO questions(prefecture_id,question) VALUES
    (1,'高輪'),
    (1,'亀戸');

INSERT INTO choices(question_id,choice,result) VALUES
    (1,'たかなわ',TRUE),
    (1,'たかわ',FALSE),
    (1,'こうわ',FALSE),
    (2,'かめいど',TRUE),
    (2,'かめど',FALSE),
    (2,'かめと',FALSE);
    
    SELECT * FROM prefectures;
    SELECT * FROM questions;
    SELECT * FROM choices;
-- week29