import paho.mqtt.client as mqtt 
import time 
import json
import pymysql
import datetime

#A tabela do BD está no diretório BD no arquivo api_Energy_monitor.sql

#COnfigurações do Banco
host_banco="localhost"
user_banco="root"
passwd_banco="root"
db_nome_banco="energy_monitor"
porta_banco = 3306
tempo_espera_insert=1#provavelmente não será usado nesse código pois o insert será feito a cada iteração com o broker

operacao_insert= "INSERT INTO sensor(corrente,MAC,qos,data_hora_medicao) VALUES(%s, %s, %s,%s)"#Não altere muito aqui, mas se alterar, verifique o laço for com os dados do json

  
#some comments are writted in portuguese. If you want to know about, you can use the google tradutor :p 
 
HOST= "test.mosquitto.org"#If you want to set this parameter in a public host, is very important to you remember to choose a topic(only you use) 
PORT=1883#This is a mosquitto port(when i start my broker) 
keepalive=60 
bind_address="" 
TOPIC=[("microondas",0)]#tupla com tópico e QoS. Pode-se adicionar diversos tópicos e alterar o QoS caso queira 
 
#Só para relembrar: QoS=0 significa que a entrega da mensagem será feita com o melhor esforço, sendo assim adicionada à fila do broker e não tendo a confirmação que o subscriber irá receber a mensagem. Resumindo, a mensagem não é armazenada 
#QoS=1 significa que há uma garantia de que pelo menos uma vez a mensagem irá ser entregue ao receptor 
#QoS=2 significa que a mensagem irá ser recebida apenas uma vez pelo receptor(é mais lento, mas mais confiável) 
 
  
def on_connect(client, userdata, flags, rc): 
     
    if rc == 0: 
        print("Connected with result code "+str(rc)) 
        global Connected#Torna a variável Connected global 
        Connected = True#"ativa" a variável 
              
    else: 
        print("Falha na conexão") 
  
  
Connected = False #Variável global utilizada como referência para saber se o subscriber está conectado ao broker. 





#Conexão com o banco
#A conexão está sendo feita fora da funçao para poder ser tratada no trycatch do final do código
conexao = pymysql.connect(host=host_banco,port=porta_banco, user=user_banco, passwd=passwd_banco, db=db_nome_banco)

def on_message(client, userdata, msg):
    print("=============================") 
    print("Topic: "+str(msg.topic) )
    print("Payload: "+str(msg.payload)) 
    print("Hora:"+datetime.datetime.now().strftime("%H:%M:%S"))
    print("=============================") 
    
    for i in range(len(TOPIC)):
        if((msg.topic,msg.qos)==TOPIC[i]):
            now = datetime.datetime.now() #variavel que guarda o horario atual
            mensagem={  
                'mensagem': int(msg.payload),
                'topico': str(msg.topic),
                'qos': str(msg.qos),#Caso queira salvar como um inteiro você digita: 
                'horario':now.isoformat()#guarda o horario no json
                };
            
            #parte dentro do laço que poderemos fazer o insert
            
            cursor = conexao.cursor()
            
            #transformando o tipo dos dados e guardando em outras variáveis
            mensagemBanco= int(msg.payload)
            topicoBanco= str(msg.topic)
            qosBanco= str(msg.qos)
            horario_formatado=datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')#formata o horario para esse formato para inserir no BD
            
            #insert no BD
            cursor.execute(operacao_insert,(mensagemBanco,topicoBanco,qosBanco,horario_formatado))
            
            #confirmar a inserção
            conexao.commit()
            
            
            with open(f'../FRONT/grafico/src/{msg.topic}.json','w') as f:
                pass
            with open(f'../FRONT/grafico/src/{msg.topic}.json','r') as f:
                conteudo_json=f.read()
                if not conteudo_json:
                    with open(f'../FRONT/grafico/src/{msg.topic}.json','w') as s:
                        json.dump([],s)
            with open(f'../FRONT/grafico/src/{msg.topic}.json','r') as f:
                guardando_json=json.load(f)
                
            guardando_json.append(mensagem)
            with open(f'../FRONT/grafico/src/{msg.topic}.json','w') as f:
                json.dump(guardando_json,f)









  




      

  
      
  
      
  
  

client = mqtt.Client("python3") 
client.on_connect = on_connect 
client.on_message = on_message 
  
client.connect(HOST, PORT, keepalive,bind_address) 
  
client.loop_start() 
while Connected != True: 
    time.sleep(1)#time to wait a start a connection 
  
try: 
    while True: 
        time.sleep(1) 
        client.subscribe(TOPIC) 
  
except KeyboardInterrupt: 
    print('\nSaindo') 
    conexao.close()#fecha a conexão
    print("\nConexão com o banco encerrada e programa fechado com sucesso\n")
    client.disconnect() 
    client.loop_stop 
    
    
