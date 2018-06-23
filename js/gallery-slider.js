$(document).ready(function(){

    $("ul li img").click(function(){
        var CurrentImageURL = $(this).attr("src");
        $(".slider-container img").attr("src", CurrentImageURL);
    });

    $("ul li").click(function(){
        $(this).addClass("active");
    });

});