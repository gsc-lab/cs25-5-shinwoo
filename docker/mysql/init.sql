CREATE DATABASE lswcd;
USE lswcd;

-- 회원 테이블
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(50) UNIQUE,
    user_pw VARCHAR(255)
);

-- 게시판 테이블
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    content TEXT,
    user_id VARCHAR(50),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);