<!DOCTYPE html>
<html>
<head>
    <title>Delivery Cost Calculator</title>
    <script src="https://api.longdo.com/map/?key=b5231ae6110f3ae6ebf8ea15401177bf"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #map {
            width: 100%;
            height: 70vh;
        }

        #search-form {
            width: 100%;
            padding: 20px;
            background-color: #f0f0f0;
            margin-top: 20px;
        }

        #search-form label, #search-form input {
            margin-bottom: 10px;
        }

        #result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div id="map"></div>

    <div id="search-form">
        <form id="delivery-form" method="post">
            <label for="origin_latitude">ละติจูดของลูกค้า:</label>
            <input type="text" id="origin_latitude" name="origin_latitude" required>
            <label for="origin_longitude">ลองจิจูดของลูกค้า:</label>
            <input type="text" id="origin_longitude" name="origin_longitude" required><br><br>

            <label for="destination_latitude">ละติจูดของร้าน:</label>
            <input type="text" id="destination_latitude" name="destination_latitude" required>
            <label for="destination_longitude">ลองจิจูดของร้าน:</label>
            <input type="text" id="destination_longitude" name="destination_longitude" required><br><br>

            <input type="submit" value="คำนวณ">
        </form>
    </div>

    <div id="result"></div>

    <script src="longdo_map.js"></script>
    <script>
        function calculateDistance(origin, destination, callback) {
            var map = new longdo.Map({
                placeholder: document.getElementById('map')
            });

            var startPoint = new longdo.Marker({
                lon: origin.longitude,
                lat: origin.latitude,
                title: 'จุดเริ่มต้น',
            });

            var endPoint = new longdo.Marker({
                lon: destination.longitude,
                lat: destination.latitude,
                title: 'จุดหมายปลายทาง',
            });

            map.Overlays.add(startPoint);
            map.Overlays.add(endPoint);

            // ตรวจสอบให้แน่ใจว่า map.route ถูกสร้างขึ้นแล้วและสามารถใช้งานได้
            if (map.route) {
                var distance = map.route.add([startPoint, endPoint], {
                    title: 'ระยะทาง',
                    weight: 5,
                    color: '#FF0000',
                    alpha: 0.5
                });

                map.location(longdo.LocationMode.View, startPoint, endPoint);

                distance.then(function(result) {
                    callback(result.distance);
                });
            } else {
                console.error('map.route is undefined or not available.');
            }
        }


        document.getElementById('delivery-form').addEventListener('submit', function(event) {
            event.preventDefault(); // หยุดการส่งฟอร์ม

            var originLatitude = parseFloat(document.getElementById('origin_latitude').value);
            var originLongitude = parseFloat(document.getElementById('origin_longitude').value);
            var destinationLatitude = parseFloat(document.getElementById('destination_latitude').value);
            var destinationLongitude = parseFloat(document.getElementById('destination_longitude').value);

            var origin = {latitude: originLatitude, longitude: originLongitude};
            var destination = {latitude: destinationLatitude, longitude: destinationLongitude};

            calculateDistance(origin, destination, function(distance) {
                var shippingCost;

                if (distance <= 1) {
                    shippingCost = 39;
                } else if (distance <= 9) {
                    shippingCost = 39 + (distance - 1) * 8;
                } else if (distance <= 50) {
                    shippingCost = 39 + (8 * 8) + (distance - 9) * 10;
                } else {
                    shippingCost = "ไม่สามารถคำนวณค่าจัดส่งได้";
                }

                var resultElement = document.getElementById('result');
                resultElement.innerHTML = '<h2>ระยะทาง: ' + distance.toFixed(2) + ' กิโลเมตร</h2>' +
                '<h2>ค่าจัดส่ง: ' + shippingCost + ' บาท</h2>';
            });
        });
    </script>
</body>
</html>
