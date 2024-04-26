CREATE DATABASE IF NOT EXISTS school_db;

CREATE TABLE users (
    id_user BIGINT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(80),
    last_name VARCHAR,
    date_entry DATETIME,
    user_id VARCHAR(60),
    gender VARCHAR(6),
    school_id VARCHAR(60),
    rank_user VARCHAR(20)
); 

ALTER TABLE users (
    ADD PRIMARY KEY (id)
);