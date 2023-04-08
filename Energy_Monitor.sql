CREATE DATABASE energy_monitor;
USE energy_monitor;

CREATE TABLE consumo (
  id INT NOT NULL,
  aparelho VARCHAR(50),
  corrente INT
);
