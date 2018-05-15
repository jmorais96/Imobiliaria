//https://codepen.io/bradtraversy/pen/zEOrPp 
// buscar elementos dos butões
var modalBtn = document.getElementById('modalBtn');
var closeBtn = document.getElementsByClassName('closeBtn')[0];

// esperas
modalBtn.addEventListener('click', openModal);

closeBtn.addEventListener('click', closeModal);

window.addEventListener('click', outsideClick);

// abrir o div de login
function openModal(){
  modal.style.display = 'block';
}

// Fechar por click de botão
function closeModal(){
  modal.style.display = 'none';
}

// Fechar se clicar no exterior do div
function outsideClick(e){
  if(e.target == modal){
    modal.style.display = 'none';
  }
}
