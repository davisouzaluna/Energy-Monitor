import paho.mqtt.client as mqtt 
import time 
import json
import pymysql
import datetime
import os



#A tabela do BD está no diretório BD no arquivo api_Energy_monitor.sql

#COnfigurações do Banco
host_banco="localhost"
user_banco="pam"
passwd_banco="123"
db_nome_banco="energy_monitor"
porta_banco = 3306
tempo_espera_insert=1#provavelmente não será usado nesse código pois o insert será feito a cada iteração com o broker

valorLimiteLogErro=40

operacao_insert= "INSERT INTO sensor(corrente,MAC,qos,data_hora_medicao) VALUES(%s, %s, %s,%s)"#Não altere muito aqui, mas se alterar, verifique o laço for com os dados do json
operacaoInsertLogErro = "INSERT INTO log_erro(mensagem,log_erro_sensor_correspondente,data_hora,tipo) VALUES(%s,%s,%s,%s)"
  
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
cursor = conexao.cursor() #cursor agora é uma variável global



#=========================================================================================================================
#verificação do tipo de erro(varchar)
def tipoErro(valorSensor):
    if valorSensor > 40:
        return "Amperagem muito acima"

#log de erro(insert na tabela)
def insertLogErro(valor,sensorCorrespondente,horarioAtual,tipoErro):
    operacaoInsertLogErro
    cursor.execute(operacaoInsertLogErro,(valor,sensorCorrespondente,horarioAtual,tipoErro))
    conexao.commit()
 
#========================================================================================================================   

#Status do sensor
def status_sensor_json_banco(DISPOSITIVO_TOPICO, DENTRO_OU_FORA_DA_FUNCAO, EH_JSON):
    status = 1 if DENTRO_OU_FORA_DA_FUNCAO.lower() == "dentro" else 0

    # Verificar se o registro já existe
    select_query = "SELECT * FROM status WHERE DISPOSITIVO_TOPICO = %s"
    cursor.execute(select_query, (DISPOSITIVO_TOPICO,))
    existing_record = cursor.fetchone()

    if existing_record is None:
        # O registro não existe, realizar a inserção
        insert_query = "INSERT INTO status(status_sensor, DISPOSITIVO_TOPICO) VALUES (%s, %s)"
        cursor.execute(insert_query, (status, DISPOSITIVO_TOPICO))
        conexao.commit()
    else:
        # O registro já existe, realizar o update
        update_query = "UPDATE status SET status_sensor = %s WHERE DISPOSITIVO_TOPICO = %s"
        cursor.execute(update_query, (status, DISPOSITIVO_TOPICO))
        conexao.commit()

def on_message(client, userdata, msg):
    
    print("=============================") 
    print("Topic: "+str(msg.topic) )
    print("Payload: "+str(msg.payload)) 
    print("Hora:"+datetime.datetime.now(datetime.timezone.utc).strftime("%H:%M:%S"))
    print("=============================") 
    
    for i in range(len(TOPIC)):
        if((msg.topic,msg.qos)==TOPIC[i]):
            now = datetime.datetime.now() #variavel que guarda o horario atual
            mensagem={  
                'mensagem': int(msg.payload),
                'topico': str(msg.topic),
                'qos': str(msg.qos),#Caso queira salvar como um inteiro você digita: 
                'horario':now.isoformat(),#guarda o horario no json
                'status': status_sensor_json_banco(msg.topic,"Dentro",True)
                };
            
            #parte dentro do laço que poderemos fazer o insert
            
            #insert logErro
            if(int(msg.payload) >valorLimiteLogErro):#msg payload foi colocado em inteiro, deve ser alterado depois
                valor = int(msg.payload)
                sensorCorrespondente = str(msg.topic)
                horarioAtual = datetime.datetime.now(datetime.timezone.utc)
                
                insertLogErro(valor,sensorCorrespondente,horarioAtual,tipoErro(valor))
            
            
            #transformando o tipo dos dados e guardando em outras variáveis
            mensagemBanco= int(msg.payload)
            topicoBanco= str(msg.topic)
            qosBanco= str(msg.qos)
            horario_formatado=datetime.datetime.now(datetime.timezone.utc)#formata o horario para esse formato para inserir no BD
            
            status_sensor_json_banco(str(msg.topic),"Dentro",False)
            
            #insert no BD
            cursor.execute(operacao_insert,(mensagemBanco,topicoBanco,qosBanco,horario_formatado))
            
            #confirmar a inserção
            conexao.commit()
            
            
           # with open(f'../FRONT/grafico/src/public{msg.topic}.json','w') as f:
            #    pass
            #with open(f'../FRONT/grafico/src/public{msg.topic}.json','r') as f:
             #   conteudo_json=f.read()
              #  if not conteudo_json:
               #     with open(f'../FRONT/grafico/src/public{msg.topic}.json','w') as s:
                #        json.dump([],s)
            #with open(f'../FRONT/grafico/src/public{msg.topic}.json','r') as f:
             #   guardando_json=json.load(f)
                
            #guardando_json.append(mensagem)
            #with open(f'../FRONT/grafico/src/public{msg.topic}.json','w') as f:
             #   json.dump(guardando_json,f)
            json_temporario=[mensagem]
            nome_do_arquivo=f'../FRONT/grafico/public/{msg.topic}.json'
            def criacao_arquivo_se_nao_existe(nome_do_arquivo,mensagem):
                if os.path.exists(nome_do_arquivo):
                    with open(nome_do_arquivo,'r') as f:
                        arquivo = json.load(f)
                        arquivo.append(mensagem)
                else:
                    arquivo = []
                    arquivo.extend(mensagem)
                    
                       
                with open(nome_do_arquivo,'w') as arquivos_json:
                    json.dump(arquivo,arquivos_json,indent=4)
            criacao_arquivo_se_nao_existe(nome_do_arquivo,mensagem)           
            
            
            
             









  




      

  
      
  
      
  
  

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
    
    
