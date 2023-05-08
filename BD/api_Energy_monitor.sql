CREATE DATABASE energy_monitor;
USE energy_monitor;


/*A tabela de usuários irá referenciar para a tabela de dispositivos e a tabela de dispositivos irá  referenciar a tabela sensor*/

/*A tabela log de erro irá referenciar o sensor*/

CREATE TABLE sensor (
  id INT NOT NULL AUTO_INCREMENT,
  MAC VARCHAR(12) NOT NULL,
  corrente FLOAT NOT NULL,
  data_hora_medicao DATETIME NOT NULL,
  qos FLOAT NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE log_erro (
  id INT NOT NULL AUTO_INCREMENT,
  tipo VARCHAR(255) NOT NULL,
  mensagem TEXT NOT NULL,
  data_hora DATETIME NOT NULL,
  log_erro_sensor int not null,
  PRIMARY KEY (id),
  FOREIGN KEY (log_erro_sensor) references sensor(id)
);
