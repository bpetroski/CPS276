CREATE TABLE tmo_admin
(
    user_id int NOT NULL AUTO_INCREMENT,
    username    char(255)   NOT NULL,
    password    char(255)   NOT NULL,
    PRIMARY KEY (user_id)
)ENGINE=InnoDB;