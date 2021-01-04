
 
  function iniciarMap() {
    navigator.geolocation.getCurrentPosition(function(ubicacion_actual) {
     var ubicacion_actual = {
      lat: ubicacion_actual.coords.latitude,
      lng: ubicacion_actual.coords.longitude
     };
     var map = new google.maps.Map(document.getElementById('map'),
     {
       center: ubicacion_actual,
       zoom: 13
      }
      
     );
    var ubicacion_universidad = {lat:-36.798549 ,lng: -73.0564208};
    var directionsRenderer = new google.maps.DirectionsRenderer();
    var directionsService = new google.maps.DirectionsService();
    var selectedMode = "DRIVING";
     directionsService.route(
       {
         origin: ubicacion_actual,
         destination: ubicacion_universidad,
         travelMode: google.maps.TravelMode[selectedMode],
       },
       (response, status) => {
         if (status == "OK") {
           directionsRenderer.setDirections(response);
         } else {
           window.alert("Directions request failed due to " + status);
         }
       }
     );
    directionsRenderer.setMap(map);
    
  
  
  
    })
   }