var slider_content = document.getElementById('box');

// Guarda as imagens num array (dinamizar isto)
var image = ['a', 'b', 'c', 'd', 'e'];

var i = image.length;

// Função para passar ao próximo slide
function nextImage() {

    if(i < image.length) {

        i = i + 1;

    } else {

        i = 1;

    }

    slider_content.innerHTML = "<img src="+image[i-1]+".jpg>";
}

// Função para slider anterior

function prewImage() {

    if(i < image.length - 1 && i > 1) {

      i = i - 1;

    } else {

      i = image.length;

    }

  slider_content.innerHTML = "<img src="+image[i-1]+".jpg>";

  }
