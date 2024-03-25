<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Map Sample | Longdo Map</title>
    <style type="text/css">
      html{
        height:100%;
      }
      body{
        margin:0px;
        height:100%;
      }
      #map {
        height: 80%;
      }
      #inputs {
        padding: 10px;
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

            console.log('Shipping Cost:', shippingCost);
        });
      }
    </script>
</head>
<body onload="init();">
    <div id="map"></div>
    <div id="inputs">
        <label for="startLat">Start Latitude:</label>
        <input type="text" id="startLat" name="startLat">
        <label for="startLon">Start Longitude:</label>
        <input type="text" id="startLon" name="startLon">
        <br>
        <label for="endLat">End Latitude:</label>
        <input type="text" id="endLat" name="endLat">
        <label for="endLon">End Longitude:</label>
        <input type="text" id="endLon" name="endLon">
        <br>
        <button id="calculateBtn">Calculate Route</button>
    </div>
</body>
</html>
