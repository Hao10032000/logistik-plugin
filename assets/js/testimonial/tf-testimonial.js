(function ($) {
  "use strict";

 var tf_testimonial = function () {
    const swiperContainer = document.querySelector('.testimonial-swiper');
    const paginationBar = document.querySelector('.testimonial-pagination-bar');

    if (!swiperContainer) return;

    const swiper = new Swiper(swiperContainer, {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        centeredSlides: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            0:     { slidesPerView: 1 },
            768:   { slidesPerView: 2 },
            1024:  { slidesPerView: 3 },
        },
        on: {
            init: function () {
                handlePaginationVisibility(this);
                updatePagination(this.realIndex);
            },
            slideChange: function () {
                updatePagination(this.realIndex);
            },
            resize: function () {
                handlePaginationVisibility(this);
            }
        }
    });

    // ✅ Pause autoplay on hover
    swiperContainer.addEventListener('mouseenter', () => swiper.autoplay.stop());
    swiperContainer.addEventListener('mouseleave', () => swiper.autoplay.start());

    // ✅ Pause/Resume autoplay based on visibility using IntersectionObserver
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    swiper.autoplay.start();
                } else {
                    swiper.autoplay.stop();
                }
            });
        },
        {
            root: null,
            threshold: 0.1 // Widget phải hiển thị ít nhất 10% để autoplay
        }
    );
    observer.observe(swiperContainer);

    // ✅ Update active line + number
    function updatePagination(index) {
        const lines = document.querySelectorAll('.pagination-line');
        const current = document.querySelector('.page-current');

        lines.forEach((el, i) => {
            el.classList.toggle('active', i === index);
        });

        if (current) {
            current.textContent = String(index + 1).padStart(2, '0');
        }
    }

    // ✅ Hide pagination if not enough slides
    function handlePaginationVisibility(swiper) {
        const realSlides = swiper.slides.length - swiper.loopedSlides * 2;

        let visibleSlides = swiper.params.slidesPerView;
        const w = window.innerWidth;
        if (w < 768) visibleSlides = swiper.params.breakpoints[0].slidesPerView;
        else if (w < 1024) visibleSlides = swiper.params.breakpoints[768].slidesPerView;
        else visibleSlides = swiper.params.breakpoints[1024].slidesPerView;

        if (paginationBar) {
            if (realSlides <= visibleSlides) {
                paginationBar.style.display = '';
            } else {
                paginationBar.style.display = '';
            }
        }
    }

    // ✅ Allow click to navigate via pagination-line
    document.querySelectorAll('.pagination-line').forEach((el) => {
        el.addEventListener('click', () => {
            const index = parseInt(el.getAttribute('data-index'));
            swiper.slideToLoop(index);
        });
    });
};

  $(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/tf-testimonial.default",
      tf_testimonial
    );
  });
})(jQuery);
