// // เรียกใช้งาน Longdo Map API
// function calculateRoute(origin, destination, callback) {
//     var map = new longdo.Map({
//         placeholder: document.getElementById('map')
//     });

//     var startPoint = new longdo.Marker({
//         lon: origin.longitude,
//         lat: origin.latitude,
//         title: 'จุดเริ่มต้น',
//     });

//     var endPoint = new longdo.Marker({
//         lon: destination.longitude,
//         lat: destination.latitude,
//         title: 'จุดหมายปลายทาง',
//     });

//     map.Overlays.add(startPoint);
//     map.Overlays.add(endPoint);

//     var route = new longdo.Route({
//         map: map,
//         start: startPoint,
//         end: endPoint,
//         // เลือก mode ตามที่ต้องการ เช่น drive, bike, walk
//         mode: 'drive',
//         // เพิ่ม callback เพื่อให้ทำงานหลังจากสร้างเส้นทางเสร็จสิ้น
//         callback: function(result) {
//             if (result.length > 0) {
//                 // เรียก callback ที่ระบุเพื่อส่งผลลัพธ์เส้นทางกลับ
//                 callback(result);
//             } else {
//                 console.error('ไม่สามารถสร้างเส้นทางได้');
//             }
//         }
//     });
// }

function init() {
    map = new longdo.Map({
        placeholder: document.getElementById('map')
    });
    longdoMapRouting();
}

function longdoMapRouting(customerLatitude,customerLongitude,storeLatitude,storeLongitude) { 
    $.ajax({ 
            url: "https://api.longdo.com/RouteService/json/route/guide?", 
            dataType: "jsonp", 
            type: "GET", 
            contentType: "application/json", 
            data: {
                key: "b5231ae6110f3ae6ebf8ea15401177bf",
                clon: customerLongitude,
                clat: customerLatitude,
                slon: storeLongitude,
                slat: storeLatitude
        },
        success: function (results)
        {
            console.log(results);
        },
        error: function (response)
        {
            console.log(response);
        }
    });
  }
  
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
//     console.log(result);
//     map.Route.add(new longdo.Marker({ lon: customerLongitude, lat: customerLatitude }, {
//         title: 'Customer',
//         detail: 'Customer Location'
//     }));
//     map.Route.add(new longdo.Marker({ lon: storeLongitude, lat: storeLatitude }, {
//         title: 'Store',
//         detail: 'Store Location'
//     }));
//     map.Route.search();
// }
