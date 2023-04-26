# Banco de dados para armazenar dados da corrente dos dispositivos do projeto energy_monitor

CREATE DATABASE energy_monitor;
USE energy_monitor;

CREATE TABLE consumo (
  id INT NOT NULL AUTO_INCREMENT,
  aparelho VARCHAR(50),
  qos INT NOT NULL,
  corrente INT NOT NULL,
  CONSTRAINT PK_consumo PRIMARY KEY (id)
);

CREATE TABLE logs_erro (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  datahora DATETIME NOT NULL DEFAULT,
  tipo VARCHAR(50) NOT NULL,
  mensagem TEXT NOT NULL
)

/* EXEMPLOS DE OPERAÇÕES ENVOLVENDO O BD
INSERT INTO consumo (aparelho, corrente,qos)
VALUES
    ('geladeira', 10, 0),
    ('ar condicionado', 17, 0),
    ('sanduicheira', 2, 0);

SELECT * FROM consumo;
