CREATE DATABASE energy_monitor;
USE energy_monitor;

CREATE TABLE consumo (
  id INT NOT NULL,
  aparelho VARCHAR(50),
  corrente INT
);

INSERT INTO consumo (id, aparelho, corrente)
VALUES
    (1, 'geladeira', 10),
    (2, 'ar condicionado', 17),
    (3, 'sanduicheira', 2);

SELECT * FROM consumo;


