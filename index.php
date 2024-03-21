<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Routing Map Sample | Longdo Map</title>
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

        .input-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 70%;
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

        #map {
            width: 100%;
            height: 60vh;
            border: 2px solid #dddddd;
            margin-bottom: 10px;
        }

        #result {
            width: 30%;
            max-height: 30vh;
            overflow-y: auto;
            border: 4px solid #dddddd;
            background: #ffe6e6;
            padding: 10px;
            box-sizing: border-box;
        }
    </style>

    <script type="text/javascript" src="https://api.longdo.com/map/?key=b5231ae6110f3ae6ebf8ea15401177bf"></script>
    <?php
        // สร้างลิงก์ไฟล์ JavaScript
        echo '<script type="text/javascript" src="script.js"></script>';
    ?>
</head>
<body onload="init();">
<div class="input-container">
        <div class="input-group">
            <label for="customerLatitude">Customer Latitude:</label>
            <input type="text" name="customerLatitude" id="customerLatitude">
        </div>
        <div class="input-group">
            <label for="customerLongitude">Customer Longitude:</label>
            <input type="text" name="customerLongitude" id="customerLongitude">
        </div>
    </div>
    <div class="input-container">
        <div class="input-group">
            <label for="storeLatitude">Store Latitude:</label>
            <input type="text" name="storeLatitude" id="storeLatitude">
        </div>
        <div class="input-group">
            <label for="storeLongitude">Store Longitude:</label>
            <input type="text" name="storeLongitude" id="storeLongitude">
        </div>
    </div>
    <button onclick="calculateRoute()">Calculate Route</button>
    <div id="map"></div>
    <div id="result"></div>
</body>
</html>
