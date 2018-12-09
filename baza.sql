CREATE TABLE users (
  id int NOT NULL AUTO_INCREMENT,
  login varchar(32) NOT NULL,
  email varchar(100),
  password varchar(60),
  licence varchar(20),
  PRIMARY KEY (id),
  UNIQUE (login),
  UNIQUE (email)
);
