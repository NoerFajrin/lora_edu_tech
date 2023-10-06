# LoRa, Esp32, Nodered, Rasp 3, Xampp, PHP
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/3a8c4f53-839c-46ff-8cd4-541d81adae13)


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

![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/41f517b6-c667-472b-9b66-3c2173b17476) <br><br>

Hubungkan ESP32 dengan Raspy melalui USB <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/0c036d4d-8471-401e-a294-f819606c7632) <br><br>

Setting Palette serial in sesuai dengan baudrate esp32 <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/d6742f62-f45c-4570-844a-ac1dc2581642) <br><br>
Tambahkan Palette Debug <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/e541747f-5358-46ab-98bb-69a477562ead)<br><br>
Hasil Debug <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/ec5167e6-0bc3-48e6-8fe7-6b9969ad1316) <br><br>
Tambahkan Palette Function dan Http Request <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/313912f7-cb92-41af-b193-54208d0b1c1f) <br><br>
klik Palette Function <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/a4cbde27-15a2-4c89-ba08-a505712623e5) <br><br>
code : https://github.com/NoerFajrin/lora_edu_tech/blob/main/node-red/function%20code <br><br>
Klik Palette Http Request, lakukan pengaturan sesuai method dan url endpoint<br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/5c56f433-2479-477e-8ee7-605e2f34ca71)<br><b>

# Part 4 (Baackend & Frontend Zone)
Buat Folder LoRaWeb di dalam C:\xampp\htdocs\ <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/c2002836-87f7-43b7-8f3a-5ca8f92d3c18) <br>
buat 3 file .php
1. index.php
2. kirim.php
3. get_data.php

semua file .php dapat di unduh di : https://github.com/NoerFajrin/lora_edu_tech/tree/main/dashboard/php_file <br>

# Part 5 (Integrasi Gateway, dengan Website)
Hubungkan seluruh Pallete seperti berikut <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/c80d68ea-87da-4e2f-858f-8d15b6079e27)<br><br>
Perhatikan Debug yang baru : <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/b1477a27-cec2-43b6-9acc-64f1dd8fd2cf) <br><br>
chek database di phpmayadmin : <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/820b996f-bc6f-404c-9346-ed4605f0d388) <br><br>
chek halaman monitoring di http://localhost/LoRaWeb/index.php <br>
![image](https://github.com/NoerFajrin/lora_edu_tech/assets/71316603/f6e11965-51d5-4859-a299-f6ec049805a9) <br><br>
