document.addEventListener('DOMContentLoaded', (event) => {
  const seasideSwiper = new Swiper('.seasideSwiper', {
    slidesPerView: 1,
    loop: true,
    effect: 'fade',
    autoplay: {
      delay: 3000,
    },
    pagination: {
      el: '.swiper-pagination',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
  const reviewSwiper = new Swiper('.reviewSwiper', {
    slidesPerView: 1,
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
    },
  });
});
