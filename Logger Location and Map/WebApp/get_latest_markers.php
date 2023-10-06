<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "monitoring";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Query to retrieve the latest data for each user, including temperature, humidity, and heart_rate
$sql = "SELECT m1.nama_user, m1.lat, m1.lon, m1.timestamp, m1.temperature, m1.humidity, m1.heart_rate FROM mylog m1 INNER JOIN (
    SELECT nama_user, MAX(timestamp) AS max_timestamp FROM mylog GROUP BY nama_user
) m2 ON m1.nama_user = m2.nama_user AND m1.timestamp = m2.max_timestamp;";

$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();

echo json_encode($data);
?>
