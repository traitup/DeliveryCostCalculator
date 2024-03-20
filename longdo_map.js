// เรียกใช้งาน Longdo Map API
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
}
