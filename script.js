// function longdoMapRouting(customerLatitude, customerLongitude, storeLatitude, storeLongitude) { 
//     $.ajax({ 
//         url: "https://api.longdo.com/RouteService/json/route/guide", 
//         dataType: "json", 
//         type: "GET", 
//         data: {
//             key: "b5231ae6110f3ae6ebf8ea15401177bf",
//             clon: customerLongitude,
//             clat: customerLatitude,
//             slon: storeLongitude,
//             slat: storeLatitude
//         },
//         success: function (results) {
//             console.log(results);
//         },
//         error: function (response) {
//             throw 'Route Service API Key Error';
//         }
//     });
// }
function init() {
    map = new longdo.Map({
        placeholder: document.getElementById('map')
    });
    map.Event.bind('guideComplete',function() {
        console.log(map.Route.distance());
        console.log(map.Route.interval());
    });

    map.Route.add({lon: 9.127465322013409, lat: 99.33037200803557});
    map.Route.add({lon: 9.124753507280275, lat: 99.34659400772296});
    map.Route.search();
}
  
// var distance = 0;

// function calculateRoute() {
//     var customerLatitude = parseFloat(document.getElementById('customerLatitude').value);
//     var customerLongitude = parseFloat(document.getElementById('customerLongitude').value);
//     var storeLatitude = parseFloat(document.getElementById('storeLatitude').value);
//     var storeLongitude = parseFloat(document.getElementById('storeLongitude').value);

//     // ตรวจสอบว่าผู้ใช้กรอกค่าละติจูดและลองจิจูดทั้งหมดหรือไม่
//     if (isNaN(customerLatitude) || isNaN(customerLongitude) || isNaN(storeLatitude) || isNaN(storeLongitude)) {
//         alert('Please enter valid latitude and longitude for both customer and store.');
//         return;
//     }

//     init();
//     map.Route.placeholder(document.getElementById('result'));
//     map.Route.add(new longdo.Marker({ lon: customerLongitude, lat: customerLatitude }, {
//         title: 'Customer',
//         detail: 'Customer Location'
//     }));
//     map.Route.add(new longdo.Marker({ lon: storeLongitude, lat: storeLatitude }, {
//         title: 'Store',
//         detail: 'Store Location'
//     }));

//     // เรียกใช้งาน longdo.Route.search() เพื่อค้นหาเส้นทาง
//     map.Route.search({
//         type: 'bike', // ประเภทการเดินทาง (drive, walk, bike)
//         route: [
//             { lon: customerLongitude, lat: customerLatitude },
//             { lon: storeLongitude, lat: storeLatitude }
//         ],
//         callback: function(result) {
//             // รับผลลัพธ์การค้นหาเส้นทางและดึงข้อมูลระยะทาง
//             distance = result[0].distance;
//             console.log('Distance:', distance);
//         }
//     });
// }
