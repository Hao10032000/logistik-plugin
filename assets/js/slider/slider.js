(function ($) {
  "use strict";

  var tf_slider = function() {   

    function splitLetters(el) {
      const text = el.dataset.title;
      el.innerHTML = "";
      text.split("").forEach((char, i) => {
        const span = document.createElement("span");
        span.classList.add("letter");
        span.textContent = char;
        span.style.animationDelay = i * 50 + "ms";
        el.appendChild(span);
      });
    }

    document.querySelectorAll(".slide-title").forEach((el) => {
      splitLetters(el);
    });

    const swiper = new Swiper(".mySwiper", {
      loop: false,
      effect: "fade",
      speed: 600,
    });

    const customDots = document.querySelectorAll(".swiper-custom-dot");

    function updateActiveDot(index) {
      customDots.forEach((dot) => dot.classList.remove("active"));
      if (customDots[index]) {
        customDots[index].classList.add("active");
      }
    }

    swiper.on("slideChangeTransitionStart", function () {
      document.querySelectorAll(".slide-image.animate-image").forEach((img) => {
        img.style.transition = "none";
        img.offsetHeight;
        img.style.transition = "";
      });
    });

    customDots.forEach((dot) => {
      dot.addEventListener("click", function () {
        const index = parseInt(this.getAttribute("data-index"));
        swiper.slideTo(index);
        updateActiveDot(index);

        this.scrollIntoView({
          behavior: "smooth",
          inline: "center",
          block: "nearest",
        });
      });
    });

    swiper.on("slideChange", function () {
      updateActiveDot(swiper.realIndex);
    });

    updateActiveDot(0);

    const dotContainer = document.querySelector(".swiper-custom-pagination");

    let isDown = false;
    let startX;
    let scrollLeft;

    dotContainer.addEventListener("mousedown", (e) => {
      isDown = true;
      dotContainer.classList.add("dragging");
      startX = e.pageX - dotContainer.offsetLeft;
      scrollLeft = dotContainer.scrollLeft;
    });

    dotContainer.addEventListener("mouseleave", () => {
      isDown = false;
      dotContainer.classList.remove("dragging");
    });

    dotContainer.addEventListener("mouseup", () => {
      isDown = false;
      dotContainer.classList.remove("dragging");
    });

    dotContainer.addEventListener("mousemove", (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - dotContainer.offsetLeft;
      const walk = (x - startX) * 1.2; // tốc độ kéo
      dotContainer.scrollLeft = scrollLeft - walk;
    });
    dotContainer.addEventListener("touchstart", (e) => {
      isDown = true;
      startX = e.touches[0].pageX - dotContainer.offsetLeft;
      scrollLeft = dotContainer.scrollLeft;
    });

    dotContainer.addEventListener("touchend", () => {
      isDown = false;
    });

    dotContainer.addEventListener("touchmove", (e) => {
      if (!isDown) return;
      const x = e.touches[0].pageX - dotContainer.offsetLeft;
      const walk = (x - startX) * 1.2;
      dotContainer.scrollLeft = scrollLeft - walk;
    });
}

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-slider.default', tf_slider );
    });

})(jQuery);
