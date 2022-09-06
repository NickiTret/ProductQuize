"use strict";

const testResults = JSON.parse(localStorage.getItem("testResults") || {});
const units = JSON.parse(localStorage.getItem("units") || {});
let chartData = [];
console.log(testResults, "testResults");

const normweight = document.querySelector("#normweight");
const imt = document.querySelector("#imt");
const imtCircle = document.querySelector("#imtCircle");
const age = document.querySelector("#age");
const heightweight = document.querySelector("#heightweight");
const forecast = document.querySelector("#forecast");
const firstWeek = document.querySelector("#firstWeek");
const calories = document.querySelector("#calories");
const waterRate = document.querySelector("#waterRate");
const promptName = document.querySelector('#prompt__name');
let promptArrayName = ['Выраженный дефицит массы тела', 'Недостаточная масса тела', 'Норма', 'Избыточная масса тела', 'Ожирение 1-й степени', 'Ожирение 2-й степени', 'Ожирение 3-й степени'];
// es перевод
// let promptArrayName = ['Bajo de peso severo', 'Bajo de peso', 'Normal', 'Sobrepeso', 'Obesidad clase 1', 'Obesidad clase 2', 'Obesidad clase 3'];





/* Вывода данных для вывода */
const heightInMetrs = Number(testResults.height) / 100;
const imtValue = Math.round(
  Number(testResults.weight) / Math.pow(heightInMetrs, 2)
);

/* Вывода данных из теста */
age.innerHTML = agetostr(Number(testResults.age));
heightweight.innerHTML = `${testResults.height} ${units.unitOfWeight1} / ${testResults.weight} ${units.unitOfWeight}`;
imt.innerHTML = imtValue;

const plan =
  Number(testResults.normalWeight) > Number(testResults.weight) ? "min" : "max";

/* Формула Миффлина - Сан-Жеора */
const getCalories = () => {
  let calories = 0;

  const physicalActivity = {
    // sport1: 1.1,
    // sport2: 1.2,
    // sport3: 1.3,
    // sport4: 1.5,
    // sport5: 1.6,
    sport1: 0.4,
    sport2: 0.5,
    sport3: 0.6,
    sport4: 0.7,
    sport5: 0.8,
  };

  if (testResults.gender[0] === "Женщина") {
    calories =
      10 * Number(testResults.weight) +
      6.25 * Number(testResults.height) -
      5 * Number(testResults.age) -
      161;
  } else {
    calories =
      10 * Number(testResults.weight) +
      6.25 * Number(testResults.height) -
      5 * Number(testResults.age) +
      5;
  }

  calories *= physicalActivity[testResults.sport[0]];

  return calories;
};

console.log(testResults.sport)

/* Расчет потери после первой недели */
// const getFirstWeek = () => {
//   const decline = 950; //Указываем насколько снижаем количество калорий в день
//   const calories = getCalories();
//   let newCaloriesValue = calories - decline;
//   const losPercentage = 100 - (newCaloriesValue / calories) * 100;
//   const firstWeekWeightLoss = Math.floor(((losPercentage / 5) * decline) / 1000);
// 
// 
//   return firstWeekWeightLoss.toFixed(1);
// };


const getFirstWeek = () => {
  // const decline = 950; //Указываем насколько снижаем количество калорий в день
  // const calories = getCalories();
  // let newCaloriesValue = calories - decline;
  // const losPercentage = 100 - (newCaloriesValue / calories) * 100;
  const firstWeekWeightLoss = (testResults.weight - testResults.normalWeight) * 0.18;


  return firstWeekWeightLoss.toFixed(1);
};

/* Рассчет данных для графика */
function getChartData(status) {
  const data = [];
  const weightInit = Number(testResults.weight);
  const weightOnFirstWeek = status
    ? weightInit + Number(getFirstWeek())
    : weightInit - Number(getFirstWeek());

  const weightFinal = Number(testResults.normalWeight);
  const weightLastWeek =
    weightOnFirstWeek - (weightOnFirstWeek - weightFinal) / 2;

  data.push(weightInit);
  data.push(weightOnFirstWeek);
  data.push(weightLastWeek);
  data.push(weightFinal);

  return data;
}

switch (plan) {
  case "min": {
    const differentWeight =
      Number(testResults.normalWeight) - Number(testResults.weight);
    forecast.innerHTML = "Прогноз набора веса";
    firstWeek.innerHTML = `${getFirstWeek()} ${units.unitOfWeight}`;
    normweight.innerHTML = `${differentWeight} ${units.unitOfWeight}`;
    chartData = getChartData(true);
    break;
  }
  case "max": {
    const differentWeight =
      Number(testResults.weight) - Number(testResults.normalWeight);
    firstWeek.innerHTML = `-${getFirstWeek()} ${units.unitOfWeight}`;
    normweight.innerHTML = `${differentWeight} ${units.unitOfWeight}`;
    chartData = getChartData(false);
    break;
  }
  default: {
    break;
  }
}

/* Рассчет нормы воды в день */
const calcWaterRate = () => {

  const waterRate = (0.02835 * Number(testResults.weight)) / (2 * 0.4536);
  return waterRate;
};

calories.innerHTML = `${Math.floor(getCalories())} кКал`;
waterRate.innerHTML = `${calcWaterRate().toFixed(1)} л`;

/* Положение кружочка на шкале */

imtCircle.style.left = `${validateimt(imtValue)}%`;

console.log(imtCircle.style.left)

//вывод резульата над кружочком

function promptValue() {
  if (imtValue < 16) {
    promptName.innerHTML = promptArrayName[0];
  }
  else if (imtValue > 16 && imtValue < 18.5) {
    promptName.innerHTML = promptArrayName[1];
  }
  else if (imtValue > 18.5 && imtValue < 25) {
    promptName.innerHTML = promptArrayName[2];
  }
  else if (imtValue > 25 && imtValue < 30) {
    promptName.innerHTML = promptArrayName[3];
  }
  else if (imtValue > 30 && imtValue < 35) {
    promptName.innerHTML = promptArrayName[4];
  }
  else if (imtValue > 35 && imtValue < 40) {
    promptName.innerHTML = promptArrayName[5];
  }
  else if (imtValue > 40) {
    promptName.innerHTML = promptArrayName[6];
  }
}

promptValue();

/* Лет/Года в выдаче */
function agetostr(age) {
  var txt;
  var count = age % 100;
  if (count >= 5 && count <= 20) {
    txt = "лет";
  } else {
    count = count % 10;
    if (count == 1) {
      txt = "год";
    } else if (count >= 2 && count <= 4) {
      txt = "года";
    } else {
      txt = "лет";
    }
  }
  return age + " " + txt;
}

/* Рассчет процента положения кружочка */
function validateimt(imt) {
  let result = 0;
  if (imt <= 16) {
    result = 10;
  } else if (imt > 16 && imt <= 18.5) {
    result = 25;
  } else if (imt > 18.5 && imt <= 25) {
    result = 40;
  }
  else if (imt > 25 && imt <= 30) {
    result = 50;
  }
  else if (imt > 30 && imt <= 35) {
    result = 60;
  }
  else if (imt > 35 && imt <= 39) {
    result = 70;
  }
  else {
    result = 90;
  }
  return result;
}

console.log(chartData, 'chartData');

Highcharts.chart("container", {
  legend: {
    layout: "vertical",
    align: "right",
    verticalAlign: "middle",
  },

  series: [
    {
      name: "",
      data: [...chartData],
    },
  ],

  responsive: {
    rules: [
      {
        condition: {
          maxWidth: 500,
        },
        chartOptions: {
          legend: {
            layout: "horizontal",
            align: "center",
            verticalAlign: "bottom",
          },
        },
      },
    ],
  },
});
