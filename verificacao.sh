#!/bin/bash

#Instalador de requisitos para o uso adequado do programa.

#Para iniciar o broker, é necessário instalar o Mosquitto,
#mosquitto-clients e o pip (para instalar o paho-mqtt a partir dele).


# Checa se o pacote pip está instalado
if ! command -v pip &> /dev/null # O comando descarta a saída padrão quando true, não imprimindo nada na tela se for false.
then
    echo "pip não está instalado. Instalando..."
    sudo apt-get update
    sudo apt-get install python3-pip -y
fi

# Checa se o pacote paho-mqtt está instalado
if ! python -c "import paho.mqtt.client" &> /dev/null # O comando descarta a saída padrão quando true, não imprimindo nada na tela se for false.
then
    echo "paho-mqtt não está instalado. Instalando..."
    sudo pip install paho-mqtt
fi

# Checa se o pacote mosquitto está instalado
if ! command -v mosquitto &> /dev/null # O comando descarta a saída padrão quando true, não imprimindo nada na tela se for false.
then
    echo "mosquitto não está instalado. Instalando..."
    sudo apt-get update
    sudo apt-get install mosquitto -y
fi

# Checa se o pacote mosquitto-clients está instalado
if ! command -v mosquitto_sub &> /dev/null # O comando descarta a saída padrão quando true, não imprimindo nada na tela se for false.
then
    echo "mosquitto-clients não está instalado. Instalando..."
    sudo apt-get update
    sudo apt-get install mosquitto-clients -y
fi

# Checa se o pacote pymysql está instalado
if ! python -c "import pymysql" &> /dev/null # O comando descarta a saída padrão quando true, não imprimindo nada na tela se for false.
then
    echo "pymysql não está instalado. Instalando..."
    sudo pip install pymysql
fi


# Starta o broker Mosquitto
sudo service mosquitto start