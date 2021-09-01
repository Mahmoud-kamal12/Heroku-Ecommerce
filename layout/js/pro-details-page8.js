
(function(){


    
    $("#selectColor option").each(function()
    {
        if($(this).data('color')){
            var col = $(this).data('color');
            let result = ntc.name(col);
            let specific_name = result[1];
            $(this).text(specific_name);
        }


    });
    $('#selectColor').change(function (e) {
        var col = $("#selectColor option:selected").data('color');
        $(".chColor").css('background-color', col);
  });

  $(".owl-carousel").owlCarousel({
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
            items:4,
            nav:false,
            dots:false,
        },
        600:{
            items:4,
            nav:false,
        },
        1000:{
            items:4,
            nav:false,
        }
    },
});


})();

