<!DOCTYPE html>
<html>
<head>
    <title>Monitoring Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* CSS untuk kartu */
        .card {
            border-radius: 8px;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        /* CSS untuk teks suhu dan kelembaban */
        .card .value {
            font-size: 24px;
            margin-top: 10px;
        }

        /* CSS tambahan untuk kartu */
        .card .card-body {
            padding: 20px;
        }

        .card h5 {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
    <h2 class="mt-4 text-center pb-5">Dashboard Monitoring</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fas fa-thermometer-half fa-3x" style="color: blue;"></i>
                        <h5 class="card-title mt-3">Temperature (&deg;C)</h5>
                        <p id="temperature" class="card-text">Loading...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fas fa-tint fa-3x" style="color: blue;"></i>
                        <h5 class="card-title mt-3">Humidity (%)</h5>
                        <p id="humidity" class="card-text">Loading...</p>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="mt-4">Latest Data</h2>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Temperature (&deg;C)</th>
                    <th>Humidity (%)</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody id="monitoringTable">
                <!-- Data will be inserted here using JavaScript -->
            </tbody>
        </table>
    </div>

    <!-- Bootstrap and JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        // Function to update the latest values for Temperature and Humidity
        function updateCardValues() {
            fetch('get_data.php') // Replace with the correct PHP endpoint that fetches the latest data
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        // Parse temperature and humidity as numbers
                        const temperature = parseFloat(data[0].temperature).toFixed(2) + ' &deg;C';
                        const humidity = parseFloat(data[0].humidity).toFixed(2) + ' %';
                        document.getElementById('temperature').innerHTML = temperature;
                        document.getElementById('humidity').innerHTML = humidity;
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        // Function to populate the table with the latest data
        function updateTable() {
            fetch('get_data.php') // Replace with the correct PHP endpoint that fetches the latest data
                .then(response => response.json())
                .then(data => {
                    const table = document.getElementById('monitoringTable');
                    table.innerHTML = ''; // Clear previous data
                    data.slice(0, 10).forEach(row => {
                        // Parse temperature and humidity as numbers
                        const temperature = parseFloat(row.temperature).toFixed(2);
                        const humidity = parseFloat(row.humidity).toFixed(2);
                        const tr = document.createElement('tr');
                        tr.innerHTML = `<td>${row.id}</td><td>${temperature} &deg;C</td><td>${humidity} %</td><td>${row.timestamp}</td>`;
                        table.appendChild(tr);
                    });
                })
                .catch(error => console.error('Error:', error));
        }

        // Call the updateCardValues and updateTable functions when the page loads
        window.onload = function() {
            updateCardValues();
            updateTable();
            // Update values and the table every 5 seconds
            setInterval(updateCardValues, 5000); // 5 seconds
            setInterval(updateTable, 5000); // 5 seconds
        };
    </script>
</body>
</html>
