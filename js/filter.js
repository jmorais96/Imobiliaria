var icon_filter = document.getElementById('icon_filter');
var icon_filter1 = document.getElementById('icon_filter1');
var open_filter = document.getElementById('open_filter');
icon_filter.onclick = function(){
  icon_filter.style.display = "none";
  icon_filter1.style.display = "flex";
  icon_filter1.style.animation = "down_filter 0.4s";
  icon_filter1.style.padding = "6px 6px 17px 6px";
  icon_filter1.style.borderBottom = "0px";
  icon_filter1.style.borderBottomLeftRadius = "0px";
  icon_filter1.style.borderBottomRightRadius = "0px";
  icon_filter1.style.background = "rgb(0, 18, 48)";
  open_filter.style.display = "flex";
}

icon_filter1.onclick = function(){
icon_filter1.style.display = "none";
icon_filter.style.display = "flex";
open_filter.style.display = "none";
}
