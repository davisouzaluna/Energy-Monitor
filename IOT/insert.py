import mysql.connector
import datetime
import random

# Configurações do banco de dados
host = 'localhost'
user = 'root'
password = 'root'
database = 'energy_monitor'
port = 3306

# Estabelecer conexão com o banco de dados
connection = mysql.connector.connect(
    host=host,
    port=port,
    user=user,
    password=password,
    database=database
)
cursor = connection.cursor()

mac_value = "BC:FF:4D:FB:5E:B4"
qos = 0

# Data inicial e final para gerar os dados (julho de 2022 até hoje)
start_date = datetime.date(2022, 7, 1)
end_date = datetime.date.today()

# Realiza inserções de dados
for _ in range(1000):
    data = start_date + datetime.timedelta(days=random.randint(0, (end_date - start_date).days))
    corrente = round(random.uniform(0, 3), 2)  # Corrente aleatória entre 0 e 3
    insert_query = "INSERT INTO sensor (data_hora_medicao, corrente, MAC, qos) VALUES (%s, %s, %s, %s)"
    insert_values = (data, corrente, mac_value, qos)
    cursor.execute(insert_query, insert_values)
    connection.commit()

# Encerrar conexão
cursor.close()
connection.close()

print("Inserções concluídas.")
