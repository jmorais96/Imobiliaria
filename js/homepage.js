$(document).ready(function(){

  $('.btn_toogler').on("click", function() {

    $('.container_form').toggleClass("container_form_escondido");
    $('.map').toggleClass("map_extended");

    $('.btn_toogler').toggleClass("fa-arrow-circle-right");

  });

});