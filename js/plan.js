$(document).ready(function () {
  $(".swiper").slick({
    slidesToShow: 3,
    arrows: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          arrows: true,
          prevArrow:
            '<button class="pagination__left pagination__arrow"><img src="img/arrowLeft.svg" alt="arrowLeft"></button>',
          nextArrow:
            '<button class="pagination__right pagination__arrow"><img src="img/arrowLeft.svg" alt="arrowLeft"></button>',
          slidesToScroll: 1,
        },
      },
    ],
  });
});

const currentSlideBox = document.querySelector("#current");
const countSlide = document.querySelector("#total");

$(".swiper").on("init", function (event, slick, currentSlide, nextSlide) {
  countSlide.innerHTML = slick.slideCount;
});

$(".swiper").on(
  "beforeChange",
  function (event, slick, currentSlide, nextSlide) {
    currentSlideBox.innerHTML = nextSlide + 1;
  }
);
