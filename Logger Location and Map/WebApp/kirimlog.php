<?php
// Informasi koneksi ke database
$servername = "localhost"; // Ganti sesuai dengan host database Anda
$username = "root";
$password = "";
$dbname = "monitoring";

// Data yang diterima dari Node-RED
$data = json_decode(file_get_contents('php://input'));

// Validasi data yang diterima
if (isset($data->temperature) && isset($data->humidity) && isset($data->heart_rate) && isset($data->lat) && isset($data->lon)) {
    // Buat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi database
    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    // Siapkan data untuk disimpan
    $nama_user = $data->nama_user;
    $temperature = $data->temperature;
    $humidity = $data->humidity;
    $heart_rate = $data->heart_rate;
    $lat = $data->lat;
    $lon = $data->lon;
    $timestamp = date('Y-m-d H:i:s'); // Waktu saat ini

    // Query untuk menyimpan data ke tabel 'user_data'
    $sql = "INSERT INTO mylog (nama_user, temperature, humidity, heart_rate, lat, lon, timestamp) 
            VALUES ('$nama_user', $temperature, $humidity, $heart_rate, $lat, $lon, '$timestamp')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan ke database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
} else {
    echo "Data tidak valid.";
}
?>
