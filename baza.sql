CREATE TABLE users (
  login varchar(32) NOT NULL,
  email varchar(100),
  password varchar(60),
  licence varchar(20),
  PRIMARY KEY (login),
  UNIQUE (login),
  UNIQUE (email)
);

CREATE TABLE posts (
  id int NOT NULL AUTO_INCREMENT,
  user varchar(32) NOT NULL,
  title varchar(100),
  post varchar(255),
  isPublic boolean,
  UNIQUE (id),
  PRIMARY KEY (id),
  FOREIGN KEY (user) REFERENCES users(login)
);
