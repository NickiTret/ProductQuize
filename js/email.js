"use strict";

// const testResults = JSON.parse(localStorage.getItem("testResults") || {});
// const emailInput = document.querySelector(".input-email");
// const btn = document.querySelector(".btn");
// const resultsPage = document.getElementById("confirmLink").href;
// 
// emailInput.addEventListener("input", (e) => {
//   const check = /^[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}$/i.test(
//     e.target.value
//   );
//   if (check) {
//     btn.removeAttribute('disabled');
//   }
// });
// 
// btn.addEventListener("click", () => {
//   if (emailInput.value) {
//     testResults.email = emailInput.value;
//     localStorage.setItem("testResults", JSON.stringify(testResults));
//     document.location.href = `${resultsPage}`;
//   }
// });

const circle = document.querySelector(".progress-ring__circle");
const radius = circle.r.baseVal.value;
const persentValue = document.querySelector("#present");
const preloader = document.querySelector(".result__preloader");
const emailBox = document.querySelector("#email");

const circumference = 2 * Math.PI * radius;

circle.style.strokeDasharray = `${circumference} ${circumference}`;
circle.style.strokeDashoffset = circumference;

function setProgress(percent) {
  const offset = circumference - (percent / 100) * circumference;
  circle.style.strokeDashoffset = offset;
}

var startProgress = 0;
setTimeout(() => {
  var refreshIntervalId = setInterval(() => {
    startProgress++;
    setProgress(startProgress);
    persentValue.innerHTML = `${startProgress}%`;
    if (startProgress === 100) {
      clearInterval(refreshIntervalId);
      setTimeout(() => {
        preloader.style.display = "none";
        emailBox.style.display = "block";
      }, 1000);
    }
  }, 40);
}, 1000);
