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

SELECT * FROM income;
INSERT INTO income (id , amount , description , date) VALUES (1, 33 , 'test', '2007-04-22');
INSERT INTO income ( amount , description ) VALUES ( 33 , 'test');

DELETE FROM INCOME WHERE id = 2;

SELECT * FROM income WHERE MONTH(date)  = MONTH(CURRENT_DATE)

