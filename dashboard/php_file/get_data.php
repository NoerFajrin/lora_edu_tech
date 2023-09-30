<?php
// Informasi koneksi ke database
$servername = "localhost"; // Ganti sesuai dengan host database Anda
$username = "root";
$password = "";
$dbname = "monitoring";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi database
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Query untuk mengambil data monitoring (maksimal 10 baris) dalam format JSON
$sql = "SELECT * FROM monitoring ORDER BY id DESC LIMIT 10"; // Mengambil 10 baris terbaru
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    // Mengembalikan data dalam format JSON
    echo json_encode($data);
} else {
    echo "Data tidak ditemukan.";
}

// Tutup koneksi database
$conn->close();
?>
