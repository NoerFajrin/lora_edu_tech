<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Monitoring</title>
    <!-- Add link to Bootstrap CSS here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add link to Leaflet CSS and JavaScript here -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Data Monitoring</h1>        
        <!-- Container for the map -->
        <div id="map" style="height: 400px;"></div>
        
        <h2>10 Data Terbaru</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Nama User</th>
                    <th>Humidity</th>
                    <th>Temperature</th>
                    <th>Heart Rate</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                </tr>
            </thead>
            <tbody id="latestData">
                <!-- Data will be inserted here using JavaScript -->
            </tbody>
        </table>
    </div>
    
    <!-- Add link to Bootstrap JS and jQuery here (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add link to Leaflet JavaScript here -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        let map; // Variable to hold the map instance

        function updateCardValues() {
            // Fetch data from get_log.php using the fetch API
            fetch('get_log.php')
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        const latestData = data[0];
                        document.getElementById('humidity').textContent = `Humidity: ${latestData.humidity}%`;
                        document.getElementById('temperature').textContent = `Temperature: ${latestData.temperature}°C`;
                        document.getElementById('heartRate').textContent = `Heart Rate: ${latestData.heart_rate} BPM`;
                    } else {
                        document.getElementById('humidity').textContent = 'Tidak ada data yang tersedia.';
                    }
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        }

        function updateLatestData() {
            // Fetch the 10 latest data from get_log.php
            fetch('get_log.php')
                .then(response => response.json())
                .then(data => {
                    const latestDataContainer = document.getElementById('latestData');
                    latestDataContainer.innerHTML = '';

                    data.slice(0, 10).forEach(log => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${log.timestamp}</td>
                            <td>${log.nama_user}</td>
                            <td>${log.humidity}%</td>
                            <td>${log.temperature}°C</td>
                            <td>${log.heart_rate} BPM</td>
                            <td>${log.lat}</td>
                            <td>${log.lon}</td>
                        `;
                        latestDataContainer.appendChild(row);
                    });

                    // // Call the function to update the map with markers
                    // updateMapMarkers(data);
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        }
        function updateLatestMarkerData() {
            // Fetch the 10 latest data from get_log.php
            fetch('get_latest_markers.php')
                .then(response => response.json())
                .then(data => {
                   // Call the function to update the map with markers
                   console.log(data);
                    updateMapMarkers(data);
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        }

        function updateMapMarkers(data) {
            // Remove the existing map if any
            if (map) {
                map.remove();
            }

            // Create a new map and add it to the 'map' div
            map = L.map('map').setView([-2.274398, 117.867460], 5);

            // Add a map layer from OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Add markers for each user in the data
             // Add markers for each user in the data
    data.forEach(log => {
        const lat = parseFloat(log.lat);
        const lon = parseFloat(log.lon);

        // Create a popup content with heart rate, temperature, and humidity
        const popupContent = `
            <p><strong>Nama User:</strong> ${log.nama_user}</p>
            <p><strong>Latitude:</strong> ${lat}</p>
            <p><strong>Longitude:</strong> ${lon}</p>
            <p><strong>Heart Rate:</strong> ${log.heart_rate} BPM</p>
            <p><strong>Temperature:</strong> ${log.temperature}°C</p>
            <p><strong>Humidity:</strong> ${log.humidity}%</p>
        `;

        // Add a marker for the user to the map with the popup content
        const marker = L.marker([lat, lon]).addTo(map);
        marker.bindPopup(popupContent).openPopup();
    });
        }

        // Call the functions when the page loads
        updateLatestMarkerData();
        updateCardValues();
        updateLatestData();
    </script>
</body>
</html>
