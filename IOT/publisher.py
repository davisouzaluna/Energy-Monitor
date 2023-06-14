import paho.mqtt.client as mqtt 
import time 
import random 
  
BROKER="test.mosquitto.org" #O broker público é test.mosquitto.org
PORT=1883 
KEEPALIVE=60 
TOPIC="111111111111" 
inicio_random=0#valor aleatório inicial 
fim_random=50#valor aleatório limite. Referente à amperagem
time_sleep_pub=1#Referente à amperagem
  
#Publisher 
client = mqtt.Client() 
client.connect(BROKER, PORT, KEEPALIVE) 
client.loop_start() 
 
try: 
    while True: 
        msg=random.randint(inicio_random,fim_random) #para o random entrar no loop. Inicia uma função random(nativa do python) 
        client.publish(TOPIC, msg)#publica a mensagem 
        time.sleep(time_sleep_pub)#espera o tempo da variável time_sleep_pub, ficando sem fazer nada nesse meio tempo 
except KeyboardInterrupt:#quando clicar Ctrln+C 
    print("\nSaindo") 
    client.disconnect()#Desconecta do broker 
    client.loop_stop() 