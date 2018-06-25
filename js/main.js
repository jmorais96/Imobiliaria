    let address = "Açores";
    let zoom = 9;
    let map;
    let geocoder;
    let marker=[];
    function initMap() {
      map = new google.maps.Map($('.map').get(0), {
        /* se login zoom 13 else 9 ?*/
        zoom: zoom
      });
      geocoder = new google.maps.Geocoder();

      geocodeAddress(geocoder, map, address);

    }



    function clearOverlays() {

      for (var i = 0; i < marker.length; i++ ) {
        marker[i].setMap(null);
      }
      marker.length = 0;
    }


    function geocodeAddress(geocoder, resultsMap, address) {
      /*  select localização */
      var address = address;
      geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
          resultsMap.setCenter(results[0].geometry.location);
        }
      });
    }



    function addMarker(id, lat, lng, rua, tipoImovel, finalidade, preco, icon, img, ilha, concelho, freguesia) {
      icon="images/pins/"+icon;
      console.log(icon);
      marker.push( new google.maps.Marker({
        position: { lat: lat, lng: lng },
        icon:icon
      }));

      var infowindow = new google.maps.InfoWindow({
        content: "<img src='imoveis/"+ id + "/" + img + "'> <h3>" + tipoImovel + " | " + rua + " | " + preco + "€ </h3>   <p>Tipo de imovel:" + tipoImovel + " </p>  <p>Finalidade: "+finalidade+"</p>   <p>Preco: "+preco+" €</p>   <p>Ilha:"+ilha+"</p> <p>Concelho:"+concelho+"</p> <p>Freguesia:"+freguesia+"</p>     <a href='imovel.php?id="+id+"'>Mais Informações do imovel</a>"
      });

      marker[marker.length-1].setMap(map);


      marker[marker.length-1].addListener('click', function() {

        function isInfoWindowOpen(infoWindow){
            var map = infoWindow.getMap();
            return (map !== null && typeof map !== "undefined");
        }

        if (isInfoWindowOpen(infowindow)){
            infowindow.close(map, this);
        } else {
            infowindow.open(map, this);
        }

      });

    }

    $("button").click(function(){
      $("#caixa1a").html("<h3>Mude os seus dados pessoais</p>");
      $(".caixa2").hide();
      $("#mudarDados").hide();
      $("#formDados").show();
    });
