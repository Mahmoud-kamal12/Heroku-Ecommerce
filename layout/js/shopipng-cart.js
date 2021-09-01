(function() {
    
    $(".input-Quantity").each(function () {
        that = this;
        that.addEventListener('click',function (e) {
            e.preventDefault();
            $(this).removeAttr("readonly")
        });
    })


})();