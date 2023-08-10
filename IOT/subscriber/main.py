import paho.mqtt.client as mqtt
import time
import json
import pymysql
import datetime
import os
import signal
import sys

from bd_manipulator import BDManipulator
from json_manipulator import JSONManipulator
from mqtt_communicator import MQTTCommunicator

#Variáveis de controle do MQTT
BROKER = "broker.hivemq.com"
PORT = 1883
KEEPALIVE = 60
BIND = ""


# Instanciar objetos
bd_manipulator = BDManipulator("localhost", "root", "root", "energy_monitor", 3306)
json_manipulator = JSONManipulator()
mqtt_communicator = MQTTCommunicator(BROKER, PORT, KEEPALIVE, BIND)

# Conectar ao banco de dados
bd_manipulator.connect()

# Conectar ao MQTT broker
mqtt_communicator.connect()

# Inscrever-se em vários tópicos/DEBUG
topics = [("BC:FF:4D:FB:5E:B4", 0),("112233445566",0)]
mqtt_communicator.subscribe_to_topics(topics)

# Função de tratamento de sinal para interromper o programa corretamente
def signal_handler(signal, frame):
    print("Programa encerrado.")
    bd_manipulator.disconnect()
    mqtt_communicator.disconnect()
    sys.exit(0)

signal.signal(signal.SIGINT, signal_handler)

# Loop principal
while True:
    mqtt_communicator.client.loop_start()
    
    #Sobrecarga de método
    def handle_message(client, userdata, msg):
        print("=============================")
        print("Topic: " + str(msg.topic))
        print("Payload: " + str(msg.payload))
        print("Hora: " + datetime.datetime.now(datetime.timezone.utc).strftime("%H:%M:%S"))
        print("QoS: "+str(msg.qos))
        print("=============================")
        
        bd_manipulator.insert_data(msg.payload, msg.topic, msg.qos, datetime.datetime.now(datetime.timezone.utc))
    
    #insert no DB
    mqtt_communicator.client.on_message = handle_message
    # Aguardar 1 segundo antes de executar novamente
    time.sleep(1)

