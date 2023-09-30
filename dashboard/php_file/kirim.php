<?php
// Informasi koneksi ke database
$servername = "localhost"; // Ganti sesuai dengan host database Anda
$username = "root";
$password = "";
$dbname = "monitoring";

// Data yang diterima dari Node-RED
$data = json_decode(file_get_contents('php://input'));

// Validasi data yang diterima
if(isset($data->Temperature) && isset($data->Humidity)) {
    // Buat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi database
    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    // Siapkan data untuk disimpan
    $temperature = $data->Temperature;
    $humidity = $data->Humidity;
    $timestamp = date('Y-m-d H:i:s'); // Waktu saat ini

    // Query untuk menyimpan data ke tabel 'monitoring'
    $sql = "INSERT INTO monitoring (temperature, humidity, timestamp) VALUES ($temperature, $humidity, '$timestamp')";

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
