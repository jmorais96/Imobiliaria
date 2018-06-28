$(document).ready(function(){
  
  // "Smooth scroll" aquando do clique no ícone de marcação de visita
  $('#atalho_marcar_visita').on('click', function () {
    const form = $('#formulario').position().top;
    $('html, body').animate({
      scrollTop: form
    }, 800);
  });

});