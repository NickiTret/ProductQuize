var swiper = new Swiper(".reviews__slider", {
  spaceBetween: 80,
  autoHeight: true,
  pagination: {
    el: ".swiper-pagination",
    type: "fraction",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
document.addEventListener(
  "scroll",
  function (e) {
    swiper.update();
  },
  { once: true }
);

function setTestResult() {
  const startPrice = 890;
  const testResults = JSON.parse(localStorage.getItem("testResults") || {});
  const { donation = 490, weight = 80, weight2 = 70, days = 44 } = testResults;

  const sale = `-${100 - Math.round((100 * donation) / startPrice)}%`;
  const startDate = new Date();
  const finalDate = new Date(Date.now() + days * 24 * 3600 * 1000);

  const saleElements = [...document.querySelectorAll('.discountValue')];
  saleElements.forEach(el => el.innerText = sale);

  const priceElements = [...document.querySelectorAll('.priceChosen')];
  priceElements.forEach(el => el.innerText = `${donation}`);

  document.querySelector('.userWeight').innerText = weight;
  document.querySelector('.prefWeight').innerText = weight2;
  document.querySelector('.dateCurrent').innerText = startDate.toLocaleDateString();
  document.querySelector('.dateFuture').innerText = finalDate.toLocaleDateString();
  document.querySelector('.weightDiff').innerText = weight2 - weight;
  document.querySelector('.graph__sum > span').innerText = `через ${days} дн.`;
}

setTestResult();
