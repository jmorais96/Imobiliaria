function initMap() {
        var map = new google.maps.Map($('.map').get(0), {
          /* se login zoom 13 else 9 ?*/
          zoom: 13
        });
        var geocoder = new google.maps.Geocoder();


          geocodeAddress(geocoder, map);

      }

      function geocodeAddress(geocoder, resultsMap) {
        /*  select localização */
        var address = 'Capelas';
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            //alert(results[0].geometry.location);
          }
        });
      }
