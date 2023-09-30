// Libraries for LoRa
#include <SPI.h>
#include <LoRa.h>
#include <DHT11.h> // Include the DHT11 library for interfacing with the sensor.

// Define LoRa pins
#define ss 5
#define rst 14
#define dio0 2

// Define LoRa band
#define BAND 433E6 // 433E6 for Asia, 866E6 for Europe, 915E6 for North America

// Define DHT11 sensor pin
#define DHTPIN 4

// Create an instance of the DHT11 class.
DHT11 dht11(DHTPIN);

// Initialize variables
int readingID = 0;
float temperature = 0;
float humidity = 0;

// Initialize LoRa module
void startLoRA()
{
  LoRa.setPins(ss, rst, dio0); // Setup LoRa transceiver module

  while (!LoRa.begin(BAND))
  {
    Serial.print(".");
    delay(500);
  }

  Serial.println("LoRa Initialization OK!");
  delay(2000);
}

// Read DHT11 sensor data
void getReadings()
{
  int temperatureReading = dht11.readTemperature();
  int humidityReading = dht11.readHumidity();

  if (temperatureReading != DHT11::ERROR_CHECKSUM && temperatureReading != DHT11::ERROR_TIMEOUT &&
      humidityReading != DHT11::ERROR_CHECKSUM && humidityReading != DHT11::ERROR_TIMEOUT)
  {
    temperature = temperatureReading;
    humidity = humidityReading;
    Serial.print(F("Temperature: "));
    Serial.print(temperature);
    Serial.print(F("°C Humidity: "));
    Serial.print(humidity);
    Serial.println(F("%"));
  }
  else
  {
    Serial.println("Failed to read from DHT11 sensor!");
  }
}

// Send LoRa readings
void sendReadings()
{
  String LoRaMessage = String(readingID) + "/" + String(temperature) + "&" + String(humidity);
  // Send LoRa packet to receiver
  LoRa.beginPacket();
  LoRa.print(LoRaMessage);
  LoRa.endPacket();

  Serial.print("Sending packet: ");
  Serial.println(readingID);
  readingID++;
  Serial.println(LoRaMessage);
}

void setup()
{
  // Initialize Serial Monitor
  Serial.begin(115200);
  startLoRA();
}

void loop()
{
  getReadings();
  sendReadings();
  delay(5000);
}
