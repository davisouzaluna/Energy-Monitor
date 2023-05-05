CREATE DATABASE energy_monitor;
USE energy_monitor;

CREATE TABLE usuario (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE dispositivo (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  MAC VARCHAR(12) NOT NULL,
  descricao VARCHAR(255) NOT NULL,
  usuario_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);

CREATE TABLE sensor (
  id INT NOT NULL AUTO_INCREMENT,
  MAC VARCHAR(12) NOT NULL,
  corrente FLOAT NOT NULL,
  data_hora_medicao DATETIME NOT NULL,
  qos FLOAT NOT NULL,
  log_erro_id INT,
  PRIMARY KEY (id),
  FOREIGN KEY (log_erro_id) REFERENCES log_erro(id)
);

CREATE TABLE log_erro (
  id INT NOT NULL AUTO_INCREMENT,
  tipo VARCHAR(255) NOT NULL,
  mensagem TEXT NOT NULL,
  data_hora DATETIME NOT NULL,
  PRIMARY KEY (id)
);
