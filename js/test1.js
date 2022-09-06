const resultsPage = document.getElementById("confirmLink").href;

class Test {
  constructor(quizClass, itemClass, startItem = 0) {
    this.quizClass = `.${quizClass}`;
    this.itemClass = `.${itemClass}`;
    this.startItem = startItem;
    this.init();
  }

  init() {
    this.quiz = document.querySelector(this.quizClass);
    this.quizItems = [...this.quiz.querySelectorAll(this.itemClass)];
    this.currentSlide = this.startItem;
    this.slides = this.quizItems.length;
    this.activeItem = this.quizItems[this.currentSlide];
    this.addTemplates();
    this.initData();
    this.activeItem.classList.add("test__unit_active");
  }

  addTemplates() {
    this.quizMeter = document.getElementById("quizMeter");
    this.backButton = document.getElementById("backButton");
    this.nextButton = document.getElementById("confirmButton");

    this.quizItems.forEach((item, index) => {
      const quizMeterClone =
        this.quizMeter.content.firstElementChild.cloneNode(true);
      const backButtonClone =
        this.backButton.content.firstElementChild.cloneNode(true);
      const nextButtonClone =
        this.nextButton.content.firstElementChild.cloneNode(true);

      if (index > 0) {
        quizMeterClone.insertAdjacentElement("afterbegin", backButtonClone);
      }

      item
        .querySelector(".test__title")
        .insertAdjacentElement("beforebegin", quizMeterClone);
      item.insertAdjacentElement("beforeend", nextButtonClone);

      this.setQuizMeterParams(quizMeterClone, index);

      backButtonClone.addEventListener("click", () => {
        this.prevItem();
      });

      nextButtonClone.addEventListener("click", () => {
        if (this.slides === index + 1) {
          this.saveDataToStorage(this.quizData);
          document.location.href = `${resultsPage}`;
        } else {
          this.nextItem();
        }
      });
    });
  }

  setQuizMeterParams(quizMeter, index) {
    const unitID = quizMeter.querySelector(".unitID");
    const unitTotal = quizMeter.querySelector(".unitTotal");
    const meterVal = quizMeter.querySelector(".meterVal");

    unitID.innerText = index + 1;
    unitTotal.innerText = this.slides;
    meterVal.style.width = `${(100 * (index + 1)) / this.slides}%`;
  }

  initData() {
    this.quizData = [];
    this.quizItems.forEach((item, index) => {
      this.initInputs(index);
    });
  }

  initInputs(index) {
    const inputs = [...this.quizItems[index].querySelectorAll("input")];
    inputs.forEach((input) => {
      input.addEventListener("input", (e) => {
        this.checkConfirmButton(index, e);
      });
    });
  }

  checkConfirmButton(index, e) {
    const confirmButton =
      this.quizItems[index].querySelector("button.unitConfirm");
    const firstInput = this.quizItems[index].querySelector("input");
    const type = firstInput && firstInput.type;

    switch (type) {
      case "radio":
        if (e && e.target.value !== "") {
          this.quizData[index] = {
            name: e.target.name,
            value: [e.target.value],
          };
          confirmButton.removeAttribute("disabled");
        }
        break;
      case "number":
        const numbers = this.quizItems[index].querySelectorAll("input");
        if (e && e.target.value !== "") {
          if (this.quizData[index]) {
            let check = true;
            this.quizData[index].forEach((el, i) => {
              if (el.name === e.target.name) {
                this.quizData[index][i] = {
                  name: e.target.name,
                  value: e.target.value,
                };
                check = false;
              }
            });

            if (check) {
              this.quizData[index] = [
                ...this.quizData[index],
                {
                  name: e.target.name,
                  value: e.target.value,
                },
              ];
            }
          } else {
            this.quizData[index] = [
              {
                name: e.target.name,
                value: e.target.value,
              },
            ];
          }
        }

        if (
          this.quizData[index] &&
          this.quizData[index].length === numbers.length
        ) {
          confirmButton.removeAttribute("disabled");
        }

        break;
      case "checkbox":
        if (e) {
          if (this.quizData[index]) {
            if (!this.quizData[index].value.includes(e.target.value)) {
              this.quizData[index].value.push(e.target.value);
            } else {
              this.quizData[index].value.splice(
                this.quizData[index].value.indexOf(e.target.value),
                1
              );
            }
          } else {
            this.quizData[index] = {
              name: firstInput.name,
              value: [e.target.value],
            };
          }
        }

        if (this.quizData[index] && this.quizData[index].value.length) {
          confirmButton.removeAttribute("disabled");
        } else {
          confirmButton.setAttribute("disabled", "disabled");
        }

        break;
    }

    if (this.quizItems[index].id === "plag") {
      confirmButton.removeAttribute("disabled");
    }
    if (this.quizItems[index].id === "info") {
      const infoInputs = this.quizItems[index].querySelectorAll("input");
      const info = document.querySelector(".info");

      infoInputs.forEach((input) => {
        input.addEventListener("input", () => {
          info.style.display = "block";
          confirmButton.style.display = "block";
          infoInputs.forEach((input) => {
            input.disabled = true;
          });
        });
      });
    }

    console.log(this.quizData, "this.quizData");

    let weightResult = document.querySelector('#weight').value - document.querySelector('#normalWeight').value;
    let weightBox = document.querySelectorAll('.weightBox');
    weightBox.forEach(item => item.innerHTML = weightResult);
    const placeBox = document.querySelectorAll('.place');
    const ageBox = document.querySelectorAll('.age');

    if (this.quizData[4]) {
      placeBox.forEach(item => item.innerHTML = this.quizData[4].value[0])
    }
    if (document.querySelector('#age').value) {
      ageBox.forEach(item => item.innerHTML = document.querySelector('#age').value)
    }


  }



  togleBg(index) {
    const infoBg = document.querySelector(".infoBg");
    if (this.quizItems[index].id === "info") {
      infoBg.style.display = "block";
    } else {
      if (infoBg.style.display === "block") {
        infoBg.style.display = "none";
      }
    }
  }

  nextItem() {
    if (this.currentSlide >= this.slides - 1) {
      return;
    }

    this.activeItem.classList.remove("test__unit_active");
    this.currentSlide++;

    this.activeItem = this.quizItems[this.currentSlide];
    this.activeItem.classList.add("test__unit_active");

    this.checkConfirmButton(this.currentSlide);
    this.togleBg(this.currentSlide);
  }

  prevItem() {
    if (this.currentSlide <= 0) {
      return;
    }

    this.activeItem.classList.remove("test__unit_active");
    this.currentSlide--;

    this.activeItem = this.quizItems[this.currentSlide];
    this.activeItem.classList.add("test__unit_active");
    this.togleBg(this.currentSlide);
  }

  saveDataToStorage(data) {
    const formatted = Object.values(data).reduce((acc, data) => {
      if (data.length) {
        data.forEach((item) => {
          acc[item.name] = item.value;
        });
      } else {
        acc[data.name] = data.value;
      }

      return acc;
    }, {});

    localStorage.setItem("testResults", JSON.stringify(formatted));
  }
}

const testInit = new Test("quiz", "test__unit", 0);

let units = [];

const hasSelect = document.querySelector("#unitOfWeight");
const hasSelect1 = document.querySelector("#unitOfWeight1");
const hasSelect2 = document.querySelector("#unitOfWeight2");
if (hasSelect) {
  const select = new CustomSelect("#unitOfWeight", {
    name: "unitOfWeight",
    targetValue: "КГ",
    options: [
      ["КГ", "КГ"],
      ["ФТ", "ФТ"],
    ],
  });

  hasSelect.addEventListener("select.change", (e) => {
    saveParam(e);
  });
}

if (hasSelect1) {
  const select = new CustomSelect("#unitOfWeight1", {
    name: "unitOfWeight1",
    targetValue: "СМ",
    options: [
      ["СМ", "СМ"],
      ["Дюйм", "Дюйм"],
    ],
  });

  hasSelect1.addEventListener("select.change", (e) => {
    saveParam(e);
  });
}

if (hasSelect2) {
  const select = new CustomSelect("#unitOfWeight2", {
    name: "unitOfWeight2",
    targetValue: "КГ",
    options: [
      ["КГ", "КГ"],
      ["ФТ", "ФТ"],
    ],
  });

  hasSelect1.addEventListener("select.change", (e) => {
    saveParam(e);
  });
}

const saveParam = (e) => {
  const btn = e
    ? e.target.querySelector(".select__toggle")
    : document.querySelectorAll(".select__toggle");
  if (e) {
    units.forEach((unit) => {
      if (unit.name === btn.name) {
        unit.value = btn.value;
      }
    });
  } else {
    btn.forEach((el) => {
      units = [
        ...units,
        {
          name: el.name,
          value: el.value,
        },
      ];
    });
  }

  const formatted = Object.values(units).reduce(
    (acc, { name = "", value = "" }) => {
      acc[name] = value;
      return acc;
    },
    {}
  );

  localStorage.setItem("units", JSON.stringify(formatted));
};

saveParam();
