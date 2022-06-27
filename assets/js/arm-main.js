;(function ($) {
    $(".owl-carousel").owlCarousel({
        loop: true,
        dots: true,
        nav: true,
        margin: 10,
        responsive: {
            0: {
                item: 1,
            },
            600: {
                item: 3,
            },
            1000: {
                items: 5
            }
        }
    });
})(jQuery);