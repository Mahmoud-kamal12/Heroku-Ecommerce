(function () {  

    var headeriHeight = $( window ).height() - $(".upper-bar").height() ;
    var captionPos = (headeriHeight/2) - $(".carousel-caption").height()/2;

    $(".header").css("height", headeriHeight);
    $('.carousel-caption').css("top", captionPos + "px");

})();