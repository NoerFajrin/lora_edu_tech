# Part 1 (Arduino Zone)
Install Library DHT11 langsung dari Sidebar Libarary Arduino <br><br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/31a511e1-4aea-4e7b-9471-c3869055125b)
<br><br>
Install Library LoRa
<br>
https://github.com/NoerFajrin/lora_edu_tech/blob/main/Arduino/arduino-LoRa-master.zip
<br><br>
# Membuat Sender
Rankai DHT dengan ESP32
<br>
Connect DHT11 digital input pin to GPIO4 of ESP32. <br>
Connect  VCC to 3.3V <br>
connect  GND to GND of ESP32.<br>
code : https://github.com/NoerFajrin/lora_edu_tech/blob/main/Arduino/DHT_ESP32.ino <br>
hasil <br><br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/25895847-bcb8-425b-9350-2cce395ac2d4) <br><br>
Tambahkan Module LoRa <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/7811a875-7fab-4f28-86af-e4524af473da) <br>
Edit Code menjadi : https://github.com/NoerFajrin/lora_edu_tech/blob/main/Arduino/Send_ValueDHT_by_LoRa.ino <br>
hasil <br><br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/4e858f70-42b1-4af8-b960-eecd611d7c82) <br>
# Membuat Receiver
Rangkaian LoRa dengan ESP32 persis sama dengan Sender
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/7811a875-7fab-4f28-86af-e4524af473da) <br>
code : https://github.com/NoerFajrin/lora_edu_tech/blob/main/Arduino/Receiver_Only.ino <br>
hasil <br><br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/5d43568f-6db3-4230-a279-cf69f7efb6be) <br>
# Hasil Akhir Sender & Receiver 
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/0fc5aa75-06d6-47d0-b7a6-121469c1296a) <br>
# Part 2 (Hosting Zone)
Pada bagian ini, kita akan membuat database untuk menyimpan hasil monitoring secara local
# Install XAMPP
Install XAMPP sesuai dengan OS Laptop anda https://www.apachefriends.org/
# Running XAMPP
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/fd0e33c2-de8f-4bd0-a23f-714cee00551e)
# Membuat Data Base
buka halaman : http://localhost/phpmyadmin/index.php <br>
buat database dengan nama monitoring <br><br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/8610e951-bc7b-432b-852b-843401666953) <br> <br>
buat tabel dengan nama monitoring, Tabel dengan kolom id|Temperature|Humidity|Timestamp <br> 
sqlcode = https://github.com/NoerFajrin/lora_edu_tech/blob/main/dashboard/sql_create_tabel<br><br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/e892c3e6-a5e0-4ddb-8787-8c8f7f1af9f3) <br>



# Part 3 (Node-Red Zone)
Pastikan sudah tersedia raspberry pi3/pi4 yang sudah terinstall dengan baik<br>
Enable : SSH, dan Serial <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/5f09579d-299e-4f76-b407-17d22eed7eac)<br>
# Install Node-red
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/d50d5361-cba3-4bde-9210-fb4b4f199a1a) <br>
kunjungi untuk lebih detail : https://nodered.org/docs/getting-started/raspberrypi <br>
# Buat Flow Node-Red 
Pada Flow kali ini, kita membutuhkan 4 Palette yang berbeda<br>
1. Palette Serial In
2. Palette Debug
3. Palette Function
4. Palatte Http Request

<br>
Install Palette Serial in <br>
cari node-red-node-serialport pada manage palette <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/67c1d837-4bdc-4bba-8464-613dfd8e676c) <br>
Hubungkan ESP32 dengan Raspy melalui USB <br>
![WhatsApp Image 2023-10-01 at 10 49 42](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/d1db6d0c-23c5-4aa6-9881-acf712c555a5) <br>
Setting Palette serial in sesuai dengan baudrate esp32 <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/d6742f62-f45c-4570-844a-ac1dc2581642)





# Server Local
Instal xampp




#Node Red
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/980c6a88-9a42-4394-92b9-084468980b28)
<br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/a0323cd9-5c2c-4814-8764-b53b9dfb66ee)
<br>
<br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/27be7691-454f-4581-9603-db3cb838a175)
<br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/c25dc9bb-ae3b-4622-b2a6-91098e9fcea7)
<br>
<br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/99cc9c8b-2b82-419e-b949-3d8a8be2aa7d)






