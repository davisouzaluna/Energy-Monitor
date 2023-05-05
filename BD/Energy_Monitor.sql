# Banco de dados para armazenar dados da corrente dos dispositivos do projeto energy_monitor

CREATE DATABASE energy_monitor;
USE energy_monitor;

CREATE TABLE dispositivos (
  id INT NOT NULL AUTO_INCREMENT,
  aparelho VARCHAR(50),
  qos INT NOT NULL,
  corrente INT NOT NULL,
  CONSTRAINT PK_consumo PRIMARY KEY (id)
);

/* EXEMPLOS DE OPERAÇÕES ENVOLVENDO O BD
INSERT INTO consumo (aparelho, corrente,qos)
VALUES
    ('geladeira', 10, 0),
    ('ar condicionado', 17, 0),
    ('sanduicheira', 2, 0);

SELECT * FROM consumo;
