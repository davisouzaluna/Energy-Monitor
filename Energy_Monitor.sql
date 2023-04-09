# Banco de dados para armazenar dados da corrente dos dispositivos do projeto energy_monitor

CREATE DATABASE energy_monitor;
USE energy_monitor;

CREATE TABLE consumo (
  id INT NOT NULL PRIMARY KEY,
  aparelho VARCHAR(50),
  corrente INT,
  CONSTRAINT PK_consumo PRIMARY KEY (id)
);

INSERT INTO consumo (id, aparelho, corrente)
VALUES
    (1, 'geladeira', 10),
    (2, 'ar condicionado', 17),
    (3, 'sanduicheira', 2);

SELECT * FROM consumo;