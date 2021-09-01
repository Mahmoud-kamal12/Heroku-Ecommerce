(function() {

    var myCarousel = document.querySelector('#carouselExampleFade')

    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 5000,
        wrap: true,
        })  

    $(window).resize(function () { 
        var headeriHeight = $( window ).height() - $(".upper-bar").height();
        var captionPos = (headeriHeight/2) - $(".carousel-caption").height()/2;

        $(".header").height(headeriHeight);
        $('.carousel-caption').css("top", captionPos + "px");

    });

    var owl = $('.owl-carousel');
    owl.owlCarousel({
        dots:true,
        center: true,
        autoplay:true,
        smartSpeed:900,
        loop:true,
        autoplayTimeout:2000,
        autoPlayHoverPause:true,
        animateOut: 'slideOutUp',
        animateIn: 'slideInUp',
        margin:10,
        responsive:{
            0:{
                items:1,
                nav:false,
            },
            600:{
                items:2,
                nav:false,
            },
            1000:{
                items:3,
                nav:false,
            }
        },

    });


})();