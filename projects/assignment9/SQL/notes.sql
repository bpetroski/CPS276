CREATE TABLE notes
(
    note_id     int         NOT NULL AUTO_INCREMENT,
    date_time   int         NOT NULL,
    note        char(255)   NOT NULL,
    PRIMARY KEY (note_id)
)ENGINE=InnoDB;