;(function($) {

    "use strict";

      var themesflatBlog = function () {
        $('.tf-blog-wrap').each(function () {
            var $this = $(this);
            var column = $this.data('column');
            var column2 = $this.data('column2');
            var column3 = $this.data('column3');
            var spacer = $this.data('spacer');
            var prevIcon = $this.data('prev_icon');
            var nextIcon = $this.data('next_icon');
            var arrow = $this.data('arrow');
            var bullets = $this.data('bullets');

            var owl = $this.find('.owl-carousel');

            owl.owlCarousel({
                loop: true,
                margin: spacer,
                nav: arrow === 'yes' ? true : false,
                dots: bullets === 'yes' ? true : false,
                autoplay: true, 
                autoplayTimeout: 5000,
                autoplayHoverPause: true, 
                navText: [
                    '<i class="' + prevIcon + '"></i>',
                    '<i class="' + nextIcon + '"></i>'
                ],
                responsive: {
                    0: {
                        items: column3 
                    },
                    768: {
                        items: column2 
                    },
                    1024: {
                        items: column 
                    }
                }
            });
        });
    };

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/tf-blog.default', themesflatBlog);
    });

})(jQuery);
