<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Map Sample | Longdo Map</title>
    <style type="text/css">
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #map {
            width: 100%;
            height: 60vh;
            border: 2px solid #dddddd;
            margin-bottom: 10px;
        }
        .input-group {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 200px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #45a049;
        }
        #inputs {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 70%;
            margin-bottom: 10px;
        }

    </style>

    <script type="text/javascript" src="https://api.longdo.com/map/?key=b5231ae6110f3ae6ebf8ea15401177bf"></script>
    <script>
        var distance;
        
        function init() {
            var map = new longdo.Map({
            placeholder: document.getElementById('map')
            });

            var startLatInput = document.getElementById('startLat');
            var startLonInput = document.getElementById('startLon');
            var endLatInput = document.getElementById('endLat');
            var endLonInput = document.getElementById('endLon');

            document.getElementById('calculateBtn').addEventListener('click', function() {
            var startLat = parseFloat(startLatInput.value);
            var startLon = parseFloat(startLonInput.value);
            var endLat = parseFloat(endLatInput.value);
            var endLon = parseFloat(endLonInput.value);

            if (isNaN(startLat) || isNaN(startLon) || isNaN(endLat) || isNaN(endLon)) {
                alert('Please enter valid latitude and longitude for both points.');
                return;
            }

            map.Route.clear();
            map.Route.add({ lon: startLon, lat: startLat });
            map.Route.add({ lon: endLon, lat: endLat });
            map.Route.search();
            });

        map.Event.bind('guideComplete', function() {
            distance = map.Route.distance();
            console.log(distance);

             // แปลงค่าระยะทางจากเมตรเป็นกิโลเมตร
            var distanceInKm = distance * 0.001;

            var shippingCost;
            if (distanceInKm <= 1) {
                shippingCost = 39;
            } else if (distanceInKm <= 9) {
                shippingCost = 39 + (distanceInKm - 1) * 8;
            } else if (distanceInKm <= 50) {
                shippingCost = 39 + 8 * 8 + (distanceInKm - 9) * 10;
            } else {
                shippingCost = "Please contact customer service for shipping rates for distances greater than 50 kilometers.";
            }

            // console.log('Shipping Cost:', shippingCost);

            // แสดงชื่อสถานที่ที่ปักบนแผนที่
            // var locationNames = [];
            // map
            // var locationNames = [];
            // map.Route.locations().forEach(function(location) {
            //     locationNames.push(location.label);
            // });
            // var locationInfo = "สถานที่: " + locationNames.join(", ");

            // แสดงผล shippingCost บนหน้าเว็บ
            var resultContainer = document.getElementById('result');
            if (resultContainer) {
                resultContainer.innerHTML = 'ค่าใช้จ่ายในการจัดส่งสินค้า: ' + shippingCost + '<br>ระยะทาง: ' + distanceInKm.toFixed(2) + ' กิโลเมตร';
            } else {
                // สร้าง element div ใหม่เพื่อแสดงผล shippingCost หากยังไม่มี
                resultContainer = document.createElement('div');
                resultContainer.id = 'result';
                resultContainer.innerHTML = 'ค่าใช้จ่ายในการจัดส่งสินค้า: ' + shippingCost + '<br>ระยะทาง: ' + distanceInKm.toFixed(2) + ' กิโลเมตร';
                document.body.appendChild(resultContainer);
            }
        });
    }
    </script>
</head>
<body onload="init();">
    <div id="inputs">
        <div class="input-container">
            <div class="input-group">
                <label for="startLat">Customer Latitude:</label>
                <input type="text" name="startLat" id="startLat">
            </div>
            <div class="input-group">
                <label for="startLon">Customer Longitude:</label>
                <input type="text" name="startLon" id="startLon">
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="input-container">
                <div class="input-group">
                    <label for="endLat">Store Latitude:</label>
                    <input type="text" name="endLat" id="endLat">
                </div>
                <div class="input-group">
                    <label for="endLon">Store Longitude:</label>
                    <input type="text" name="endLon" id="endLon">
                </div>
            </div>
        </div>
        <button id="calculateBtn">Calculate Route</button>
    </div>

    <div id="map"></div>
    <div id="result"></div>
</body>
</html>
