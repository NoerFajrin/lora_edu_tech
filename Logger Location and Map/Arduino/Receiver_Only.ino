#include <SPI.h>
#include <LoRa.h>
#include <Wire.h>

#define ss 5
#define rst 14
#define dio0 2
#define BAND 433E6
String receivedMessage="";
void setup() {
  Serial.begin(115200);
  while (!Serial);

  LoRa.setPins(ss, rst, dio0);
  if (!LoRa.begin(BAND)) {
    Serial.println("Starting LoRa failed!");
    while (1);
  }
  Serial.println("LoRa Initialization OK!");
}

void loop() {
  int packetSize = LoRa.parsePacket();
  if (packetSize) {
    receivedMessage = "";
    while (LoRa.available()) {
      receivedMessage += (char)LoRa.read();
    }
    Serial.println(receivedMessage);
  } 
}

