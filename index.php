<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Routing Map Sample | Longdo Map</title>
    <style type="text/css">
        html {
            height: 100%;
        }

        body {
            margin: 0px;
            height: 100%;
        }

        #map {
            height: 70%; /* ปรับความสูงของแผนที่ */
        }

        #result {
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            width: 30%; /* ปรับความกว้างของพาเนลผลลัพธ์ */
            height: 100%;
            margin: auto;
            border: 4px solid #dddddd;
            background: #ffe6e6;
            overflow: auto;
            z-index: 2;
        }
    </style>

    <script type="text/javascript" src="https://api.longdo.com/map/?key=b5231ae6110f3ae6ebf8ea15401177bf"></script>
    <?php
        // สร้างลิงก์ไฟล์ JavaScript
        echo '<script type="text/javascript" src="script.js"></script>';
    ?>
</head>
<body onload="init();">
    <div>
        Customer Latitude: <input type="text" name="customerLatitude" id="customerLatitude">
        Customer Longitude: <input type="text" name="customerLongitude" id="customerLongitude">
        Store Latitude: <input type="text" name="storeLatitude" id="storeLatitude">
        Store Longitude: <input type="text" name="storeLongitude" id="storeLongitude">
        <button onclick="calculateRoute()">Calculate Route</button>
    </div>
    <div id="map" style="width: 400px; height: 300px;"></div>
    <div id="result"></div>
</body>
</html>
