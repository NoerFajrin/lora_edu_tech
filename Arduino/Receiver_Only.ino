#include <SPI.h>
#include <LoRa.h>
#include <Wire.h>

#define ss 5
#define rst 14
#define dio0 2
#define BAND 433E6

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
    //Serial.println("Received packet:");

    String receivedMessage = "";
    while (LoRa.available()) {
      receivedMessage += (char)LoRa.read();
    }

    // Pemisahan nilai temperatur dan kelembaban
    int separatorIndex = receivedMessage.indexOf("/");
    if (separatorIndex != -1) {
      String temperatureStr = receivedMessage.substring(separatorIndex + 1, receivedMessage.indexOf("&"));
      String humidityStr = receivedMessage.substring(receivedMessage.indexOf("&") + 1);

      float temperature = temperatureStr.toFloat();
      float humidity = humidityStr.toFloat();

      // Tampilkan nilai temperatur dan kelembaban ke Serial Monitor
        String kirim = "{";
        kirim += "\"Temperature\": ";
        kirim += String(temperature);
        kirim += ", \"Humidity\": ";
        kirim += String(humidity);
        kirim += "}";
        Serial.println(kirim);
    }
  }
}
