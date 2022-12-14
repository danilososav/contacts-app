DROP DATABASE IF EXISTS contacts_app;

CREATE DATABASE contacts_app;
USE contacts_app;

CREATE TABLE users ( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255)
);

insert into users (name,email,password) VALUES ("test","test@test.com", "123");

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(255),
    phone_number VARCHAR(255),

    FOREIGN KEY (user_id) REFERENCES users(id)
);




