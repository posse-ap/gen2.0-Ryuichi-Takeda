DROP TABLE IF EXISTS big_questions;


CREATE TABLE `big_questions`(
    `id` INT NOT NULL AUTO_INCREMENT COMMENT '県ID',
    `prefecture_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '県名'
)

INSERT INTO big_questions (prefecture_name) VALUES
    ('東京'),
    ('広島');