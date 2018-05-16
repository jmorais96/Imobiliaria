let map;
let geocoder;
function initMap() {
        map = new google.maps.Map($('.map').get(0), {
          /* se login zoom 13 else 9 ?*/
          zoom: 9
        });
        geocoder = new google.maps.Geocoder();


          geocodeAddress(geocoder, map);

      }

      function geocodeAddress(geocoder, resultsMap) {
        /*  select localização */
        var address = 'Açores';
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);


          }
        });
      }

      function addMarker(lat, lng) {
        //alert('here');
        var marker  = new google.maps.Marker({
          position: { lat: lat, lng: lng }
        });
        marker.setMap(map);
      }
