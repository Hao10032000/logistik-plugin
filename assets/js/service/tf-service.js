;(function($) {

    "use strict";

   var ServiceOwl = function() {

        if ($().owlCarousel) {
            $('.tf-services-wrap.has-carousel').each(function() {
        
                var $this = $(this),
                    item = $this.data("column"),
                    item2 = $this.data("column2"),
                    item3 = $this.data("column3"),
                    gap = $this.data("spacer"),
                    gap_tab = $this.data("spacer-tab"),
                    gap_mob = $this.data("spacer-mob"),
                    prev_icon = $this.data("prev_icon"),
                    next_icon = $this.data("next_icon");
        
                var loop = false;
                if ($this.data("loop") == 'yes') {
                    loop = true;
                }
        
                var arrow = false;
                if ($this.data("arrow") == 'yes') {
                    arrow = true;
                }
        
                var bullets = false;
                if ($this.data("bullets") == 'yes') {
                    bullets = true;
                }
        
                var auto = false;
                if ($this.data("auto") == 'yes') {
                    auto = true;
                }
        
                var owlCarousel = $this.find('.owl-carousel');
                owlCarousel.owlCarousel({
                    loop: loop,
                    margin: gap,
                    nav: arrow,
                    dots: bullets,
                    autoplay: auto,
                    autoplayTimeout: 5000,
                    smartSpeed: 850,
                    autoplayHoverPause: true,
                    navText: ["<i class=\"" + prev_icon + "\"></i>", "<i class=\"" + next_icon + "\"></i>"],
                    responsive: {
                        0: {
                            items: item3,
                            margin: 20
                        },
                        768: {
                            items: item2,
                            margin: 30
                        },
                        1000: {
                            items: item
                        }
                    },
                    onInitialized: function(event) {
                        updatePagination(owlCarousel, event);
                        },
                        onChanged: function(event) {
                            updatePaginationStatus(owlCarousel, event);
                        }
                    });
                  
                    function updatePagination(owlCarousel, event) {
                        var dotsContainer = owlCarousel.find('.owl-dots');
                        var totalDots = dotsContainer.find('.owl-dot').length; // Số lần chuyển trang
                        var totalFormatted = formatNumber(totalDots);
            
                        if (!owlCarousel.find('.custom-pagination-wrapper').length) {
                            dotsContainer.wrap('<div class="custom-pagination-wrapper"></div>');
                        }
            
                        var paginationWrapper = owlCarousel.find('.custom-pagination-wrapper');
            
                        paginationWrapper.find('.number-first, .number-last').remove();
            
                        paginationWrapper.prepend('<div class="number-first">01</div>');
                        paginationWrapper.append('<div class="number-last">' + totalFormatted + '</div>');
                    }
            
                    function updatePaginationStatus(owlCarousel, event) {
                        var dotsContainer = owlCarousel.find('.owl-dots');
                        var totalDots = dotsContainer.find('.owl-dot').length;
                        var totalFormatted = formatNumber(totalDots);
            
                        owlCarousel.find('.custom-pagination-wrapper .number-last').text(totalFormatted);
                    }
            
                    function formatNumber(num) {
                        return num < 10 ? "0" + num : num;
                    }
            });
        }
        
        
        

    } 

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/tf-service.default', ServiceOwl);
    });

    $(window).on('resize', function() {
        ServiceOwl();
    });

})(jQuery);
