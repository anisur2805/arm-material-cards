; (function ($) {
    "use strict";

    /**
     * logo Carousel
     */
    var logoCarousel = function ($scope, $) {
        var $_this = $scope.find('.logo-carousel');
        var $currentID = '#' + $_this.attr('id'),
            $loop = $_this.data('loop'),
            $dots = $_this.data('dots'),
            $nav = $_this.data('nav'),
            $margin = $_this.data('margin');
        console.log( $nav )

        var owl = $($currentID);
        owl.owlCarousel({
            loop: $loop,
            margin: $margin,
            nav: $nav,
            dots: $dots,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            },
            onDragged: callback
        });

        function callback(e) {
            
        }

        owl.on('changed.owl.carousel', function(e) {
          console.log("changed occur");
          console.log('item count ', e.item.count);
            console.log( 'item index ', e.item.index);
            console.log(' item ns', e.item.namespace);

            console.log('total page ',e.page.count);
            console.log( 'page index ', e.page.index);
            console.log('page size', e.page.size);
        })
    };

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/arm-logo-carousel.default', logoCarousel);
    });
})(jQuery);