let map;
let geocoder;
function initMap() {
        map = new google.maps.Map($('.map').get(0), {
          /* se login zoom 13 else 9 ?*/
          zoom: 12

        });
        geocoder = new google.maps.Geocoder();


          geocodeAddress(geocoder, map);

      }

      function geocodeAddress(geocoder, resultsMap) {
        /*  select localização */
        var address = 'Ponta Delgada';
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);


          }
        });
      }

      function addMarker(address) {
        //alert(address);
        address= "Açores, " + address;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            //alert(results[0].geometry.location);
             var marker  = new google.maps.Marker({
               position:results[0].geometry.location
             });
             marker.setMap(map);
             map.setCenter(results[0].geometry.location);
             console.log(results[0].geometry.location);
          }
        });


      }
