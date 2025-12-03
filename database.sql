CREATE DATABASE smart_wallet;

use smart_wallet;

CREATE TABLE income(
    id INT PRIMARY KEY AUTO_INCREMENT,
    amount DECIMAL(4,2) NOT NULL,
    description VARCHAR(250) ,
    date DATE DEFAULT (CURRENT_DATE)
);
TRUNCATE income;

SELECT sum(amount) FROM income;

select * from income;