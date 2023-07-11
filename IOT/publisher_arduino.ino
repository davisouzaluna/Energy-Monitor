#include <ESP8266WiFi.h>
#include <PubSubClient.h>

const char* ssid = "OriginaL DevelopmenT";
const char* password = "kwy7514c";
const char* mqttServer = "broker.hivemq.com";
const int mqttPort = 1883;
const char* mqttUser = "";
const char* mqttPassword = "";
const char* topic = "112233445566";

WiFiClient espClient;
PubSubClient client(espClient);

void setup() {
  Serial.begin(9600);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
  client.setServer(mqttServer, mqttPort);
  while (!client.connect("NodeMCU", mqttUser, mqttPassword)) {
    Serial.println("Connecting to MQTT...");
    delay(500);
  }
  Serial.println("Connected to MQTT");
}

void loop() {
  float value = random(5, 26) / 10.0; // Gera um número aleatório entre 0.5 e 2.5
  char message[10];
  sprintf(message, "%.1f", value);
  client.publish(topic, message);
  delay(1000);
}
