CREATE DATABASE smart_wallet;

use smart_wallet;

CREATE TABLE income(
    id INT PRIMARY KEY AUTO_INCREMENT,
    amount DECIMAL(4,2) NOT NULL,
    description VARCHAR(250) ,
    date DATE DEFAULT (CURRENT_DATE)
);
TRUNCATE income;
TRUNCATE expense;

SELECT sum(amount) FROM income;

select * from income;

ALTER TABLE income MODIFY COLUMN amount DECIMAL(6,2) NOT NULL;

ALTER TABLE income MODIFY COLUMN date DATE NULL DEFAULT (CURRENT_DATE);

CREATE TABLE expense(
    id INT PRIMARY KEY AUTO_INCREMENT,
    amount DECIMAL(6,2) NOT NULL,
    description VARCHAR(250) ,
    date DATE DEFAULT (CURRENT_DATE)
);