CREATE DATABASE IF NOT EXISTS doingsdone
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE doingsdone;

CREATE TABLE projects (
  id      INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  name    CHAR(50) NOT NULL
);

CREATE INDEX p_name
  ON projects (name);

CREATE TABLE tasks (
  id            INT       AUTO_INCREMENT PRIMARY KEY,
  name          CHAR(50) NOT NULL,
  date_add      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  date_complete TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  date_deadline TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status        BOOLEAN   DEFAULT 0,
  file          CHAR(50),
  user_id       INT      NOT NULL,
  project_id    INT
);

CREATE INDEX t_name
  ON tasks (name);

CREATE TABLE users (
  id       INT       AUTO_INCREMENT PRIMARY KEY,
  date_reg TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  name     CHAR(50) NOT NULL,
  email    CHAR(50) NOT NULL UNIQUE,
  password CHAR(50) NOT NULL
);

CREATE INDEX u_name
  ON users (name);
CREATE UNIQUE INDEX u_email
  ON users (email);

