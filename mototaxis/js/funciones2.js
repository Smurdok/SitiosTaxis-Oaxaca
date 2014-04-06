var geocoder;
var map;
var image;
//var image = 'img/icon.png';
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
//var taxis = [document.getElementById('taxi').value];


function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer();
    geocoder = new google.maps.Geocoder();
    var mapOptions = {
        zoom: 16
    };
  
    map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
    
    
    var rangoDinamico = document.getElementById('ranking').value;
    var rango = rangoDinamico.split('+');
    
    
    console.log(rango);
    var rangoStatic = [['ALDAMA Y A.D.O.',2],['GRUPO TAXI TOUR PLUS',2],['SITIO 7 PRINCIPES A.C. ',1],['SITIO PRESIDENTE A.C.',3],['SITIO SAN PABLO',3],];
    setMarkers(map, taxis, rango);
    //setMarkers(map, taxis, rangoStatic);
    directionsDisplay.setMap(map);
    
    ///////////
    directionsDisplay.setPanel(document.getElementById('directions-panel'));

    var control = document.getElementById('control');
    control.style.display = 'block';
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);
    //////////

    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
        var pos = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
        var x = document.getElementById('salida');
        x.innerHTML = "<select id='a'><option value='"+pos+"'>MiPos</option></select>";
        //document.getElementByID('a').value=pos;
            
        var marker = new google.maps.Marker({
            position: pos,
            map: map
        });

        map.setCenter(pos);
            
    }, function() {
        handleNoGeolocation(true);
    });
    } else {
    
        handleNoGeolocation(false);
    }
}


function handleNoGeolocation(errorFlag) {
    if (errorFlag) {
        var content = 'Error en el servicio.';
    } else {
        var content = 'No soportas geolocalización.';
    }

    var options = {
        map: map,
        position: new google.maps.LatLng(60, 105),
        content: content
    };

    var infowindow = new google.maps.InfoWindow(options);
    map.setCenter(options.position);
}

var taxis = [
  //['5 de febrero', 17.082715, -96.718543, 2],
  //['5 de febrero', 17.081625, -96.718890, 1],
    ['5 DE FEBRERO', 17.082715, -96.718543, 1],['5 DE FEBRERO', 17.081625, -96.718890, 2],['ALDAMA Y A.D.O.', 17.071091, -96.716741, 3],['ALAMEDA', 17.062174, -96.725914, 4],['CONSTITUCION A.C.', 17.063644, -96.733149, 5],['GRUPO TAXI TOUR PLUS', 17.069162, -96.722258, 6],['LIBERTAD OAXACA A.C.', 17.050742, -96.725710, 7],['MAYORDOMO A.C.', 17.055375, -96.726045, 8],['SITIO OLIMPICO A.C.', 17.084007, -96.696822, 9],['SITIO PRESIDENTE A.C.', 17.063998, -96.723120, 10],['SITIO SAN PABLO', 17.080613, -96.713873, 11],['SITIO VILLA DEL MARQUEZ A.C.', 17.072835, -96.721633, 12],['SITIO VILLA DEL MARQUEZ A.C.', 17.072069, -96.721027, 13],['SITIO 7 PRINCIPES A.C. ', 17.058631, -96.712747, 14],
];


    
function setMarkers(map, locations, rank) {

  var shape = {
      coord: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
  };
  for (var i = 0; i < locations.length; i++) {
    var taxi = locations[i];
    var myLatLng = new google.maps.LatLng(taxi[1], taxi[2]);
      image = 'img/icon.png';
      for (var j = 0; j < rank.length; j++){
          var taxiR = rank[j];
          if (taxi[0] === taxiR[0]){
              switch (taxiR[1]){
                      case 1:
                        image = 'img/iconM.png';
                        break;
                      case 2:
                        image = 'img/iconR.png';
                        break;
                      case 3:
                        image = 'img/iconB.png';
                        break;
                      default:
                        image = 'img/icon.png';
                        break;
              }
          }
              
          
          
      }
      
      
      
      

    var infowindow = new google.maps.InfoWindow({
            map: map,
            position: myLatLng,
            content: taxi[0]+'<br>Tel:<a href="tel:+9512345678">951-234-5678</a>',
            width: 100
            //maxWidth: 100
    });
      
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        shape: shape,
        //animation: google.maps.Animation.DROP,
        //title: taxi[0],
        zIndex: taxi[3],
        icon: image
    });
    
    //google.maps.event.addListener(marker, 'click', function() {
      //  infowindow.open(map,marker);
    //});
  }

}

function calcRoute() {
    var ini = document.getElementById('a').value;
    var fin = document.getElementById('end').value;

    var request = {
      origin:ini,
      destination:fin,
      travelMode: google.maps.TravelMode.WALKING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
}
    


    function codeAddress() {
        var address = document.getElementById('address').value;
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon: image
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                    }
            });
        }


    google.maps.event.addDomListener(window, 'load', initialize);


