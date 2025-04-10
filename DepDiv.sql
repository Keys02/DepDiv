CREATE DATABASE depdiv;

USE depdiv;

CREATE TABLE user (
    user_id INT AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(320) NOT NULL,
    password VARCHAR(60) NOT NULL,
    CONSTRAINT pk_user PRIMARY KEY(user_id),
    CONSTRAINT uniq_username UNIQUE(username),
    CONSTRAINT uniq_email UNIQUE(email)
);


CREATE TABLE admin (
    admin_id INT AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(320) NOT NULL,
    password VARCHAR(60) NOT NULL,
    CONSTRAINT pk_admin PRIMARY KEY(admin_id),
    CONSTRAINT uniq_username UNIQUE(username),
    CONSTRAINT uniq_email UNIQUE(email)
);

-- Lookup table for the question_status: Categorical data
CREATE TABLE question_status (
    status_id INT AUTO_INCREMENT,
    status VARCHAR(5) NOT NULL DEFAULT "Open",
    CONSTRAINT pk_status PRIMARY KEY(status_id),
    CONSTRAINT status_check CHECK (status IN ('Open', 'Close'))
);

-- Insert the two lookup values in the question_status table
INSERT INTO question_status (status) VALUES 
                                            ('Open'),
                                            ('Close');

CREATE TABLE question (
    question_id INT AUTO_INCREMENT,
    question_body TEXT NOT NULL,
    date_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    question_status INT NOT NULL DEFAULT 1,
    user_id INT NOT NULL,
    CONSTRAINT pk_question PRIMARY KEY(question_id),
    CONSTRAINT fk_status_id FOREIGN KEY (question_status) REFERENCES question_status(status_id),
    CONSTRAINT fk_question_table_user_id FOREIGN KEY (user_id) REFERENCES user(user_id)
);

CREATE TABLE answer (
    answer_id INT AUTO_INCREMENT,
    answer_body TEXT NOT NULL,
    question_id INT NOT NULL,
    user_id INT NOT NULL,
    time_sent DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pk_answer PRIMARY KEY(answer_id),
    CONSTRAINT fk_question_id FOREIGN KEY(question_id) REFERENCES question(question_id),
    CONSTRAINT fk_answer_table_user_id FOREIGN KEY(user_id) REFERENCES user(user_id)
);

-- Creating an index for the question_body in question table
CREATE FULLTEXT INDEX ft_idx_question ON question (question_body);

-- Creating an index for the user_id foreign key in the answer table
CREATE INDEX idx_answer_table_user_id ON answer(user_id);

-- Creating an index for the user_id foreign key in the question table
CREATE index idx_question_table_user_id ON question(user_id);