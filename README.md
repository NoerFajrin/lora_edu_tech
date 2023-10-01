# Part 1 (Arduino Zone)
Install Library DHT11 langsung dari Sidebar Libarary Arduio <br><br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/31a511e1-4aea-4e7b-9471-c3869055125b)
<br><br>
Install Librady LoRa
<br>
https://github.com/NoerFajrin/lora_edu_tech/blob/main/Arduino/arduino-LoRa-master.zip
<br><br>Rankai DHT dengan ESP32

# Baca Sensor DHT
Upload dan Runing program DHT

# Buat Reciever
# Server Local
Instal xampp
buat database dengan nama monitoring <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/8610e951-bc7b-432b-852b-843401666953)
buat tabel dengan nama monitoring <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/e892c3e6-a5e0-4ddb-8787-8c8f7f1af9f3)
untuk membuat tabel bisa dengan menggunakan SQL 
Tabel dengan kolom id|Temperature|Humidity|Timestamp
copy pada SQL
CREATE TABLE monitoring (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    temperature FLOAT,
    humidity FLOAT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP()
);


![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/73131815-a926-4d81-a91c-b3250e46c21b)

#Node Red
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/980c6a88-9a42-4394-92b9-084468980b28)
<br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/a0323cd9-5c2c-4814-8764-b53b9dfb66ee)
<br>
<br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/27be7691-454f-4581-9603-db3cb838a175)
<br>



