@echo off

REM Instalador de requisitos para o uso adequado do programa.

REM Para iniciar o broker, é necessário instalar o Mosquitto,
REM mosquitto-clients e o pip (para instalar o paho-mqtt a partir dele).

REM Checa se o pacote pip está instalado
where pip >nul 2>&1
if %errorlevel% neq 0 (
    echo pip não está instalado. Instalando...
    choco install python --version 3.9.6 -y
)

REM Checa se o pacote paho-mqtt está instalado
python -c "import paho.mqtt.client" >nul 2>&1
if %errorlevel% neq 0 (
    echo paho-mqtt não está instalado. Instalando...
    pip install paho-mqtt
    
)

REM Checa se o pacote mosquitto está instalado
where mosquitto >nul 2>&1
if %errorlevel% neq 0 (
    echo mosquitto não está instalado. Instalando...
    choco install mosquitto -y
)

REM Checa se o pacote mosquitto-clients está instalado
where mosquitto_sub >nul 2>&1
if %errorlevel% neq 0 (
    echo mosquitto-clients não está instalado. Instalando...
    choco install mosquitto-clients -y
)

REM Checa se o pacote pymysql está instalado
python -c "import pymysql" >nul 2>&1
if %errorlevel% neq 0 (
    echo pymysql não está instalado. Instalando...
    pip install pymysql
)


REM Starta o broker Mosquitto
net start mosquitto
pip install pymysql