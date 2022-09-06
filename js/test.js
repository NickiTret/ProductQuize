"use strict";

const EMAIL_REGEXP =
  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const resultsPage = document.getElementById("confirmLink").href;

class Test {
  constructor(quizClass, quizUnitsClass, startUnit = 0, specialUnits = {}) {
    this.quizClass = `.${quizClass}`;
    this.quizUnitsClass = `.${quizUnitsClass}`;
    this.startUnit = startUnit;
    this.specialUnits = specialUnits;
    this.init();
  }

  init() {
    this.quiz = document.querySelector(this.quizClass);
    this.quizUnits = [...this.quiz.querySelectorAll(this.quizUnitsClass)];
    this.currentSlide = this.startUnit;
    this.slides = this.quizUnits.length;
    this.activeUnit = this.quizUnits[this.currentSlide];

    this.activeUnit.classList.add("test__unit_active");

    this.addTemplates();
    this.setInputTypes();
    this.launchQuizLogic();
  }

  addTemplates() {
    this.quizMeter = document.getElementById("quizMeter");
    this.backButton = document.getElementById("backButton");
    this.confirmButton = document.getElementById("confirmButton");

    this.quizUnits.forEach((unit, index) => {
      const quizMeterClone =
        this.quizMeter.content.firstElementChild.cloneNode(true);
      const backButtonClone =
        this.backButton.content.firstElementChild.cloneNode(true);
      const confirmButtonClone =
        this.confirmButton.content.firstElementChild.cloneNode(true);

      if (index > 0) {
        quizMeterClone.insertAdjacentElement("afterbegin", backButtonClone);

        backButtonClone.addEventListener("click", () => this.prevSlide());
      }

      if (index < this.slides) {
        unit.querySelector(".test__title").insertAdjacentElement("beforebegin", quizMeterClone);

        this.setQuizMeterParams(quizMeterClone, index);

        unit.insertAdjacentElement("beforeend", confirmButtonClone);

        confirmButtonClone.addEventListener("click", () => {
          if (this.slides === index + 1) {
            saveDataToStorage(this.quizData);
            document.location.href = `${resultsPage}`;
          } else {
            this.nextSlide();
          }
        });
      }
    });
  }

  setInputTypes() {
    this.quizData = {};

    this.quizUnits.forEach((unit, index) => {
      const input = unit.querySelector("input");

      this.quizData[index] = {
        type: input.type,
        name: input.name,
      };

      if (this.quizData[index].type === "number") {
        this.addInputHandlers(index);
      }
    });
  }

  launchQuizLogic() {
    this.quizUnits.forEach((unit, index) => {
      if (!this.specialUnits[index]) {
        this.standardUnitHanlder(unit, index);
      } else {
        this.specialUnits[index](unit, index, this.quizData);
      }
    });
  }

  standardUnitHanlder(unit, index) {
    unit.addEventListener("click", (evt) => {
      if (evt.target.closest(".test__controls")) {
        this.setUnitValue();
      }

      this.checkConfirmButton(index);
    });
  }

  setUnitValue() {
    const unitType = this.quizData[this.currentSlide].type;

    switch (unitType) {
      case "radio":
        const checkedRadio = this.activeUnit.querySelector("input:checked");
        this.quizData[this.currentSlide].value = checkedRadio.value;
        break;
      case "checkbox":
        const checkedItems = [
          ...this.activeUnit.querySelectorAll("input:checked"),
        ];
        this.quizData[this.currentSlide].value = checkedItems
          .map((item) => item.value)
          .filter((item) => item);
        break;
      default:
        break;
    }
  }

  checkConfirmButton(index) {
    const confirmButton =
      this.quizUnits[index].querySelector("button.unitConfirm");
    switch (this.quizData[index].type) {
      case "radio":
        if (this.quizData[index].value && this.quizData[index].value !== "") {
          confirmButton.removeAttribute("disabled");
        } else {
          confirmButton.setAttribute("disabled", "disabled");
        }
        break;
      case "checkbox":
        if (
          this.quizData[index].value &&
          this.quizData[index].value.length > 0
        ) {
          confirmButton.removeAttribute("disabled");
        } else {
          confirmButton.setAttribute("disabled", "disabled");
        }
        if (this.quizData[index].name === "plag") {
          confirmButton.removeAttribute("disabled");
        }
        if (this.quizData[index].name === "multi") {
          confirmButton.setAttribute("disabled", "disabled");
        }
        break;
      default:
        if (this.quizData[index].value && this.quizData[index].value > 0) {
          confirmButton.removeAttribute("disabled");
        } else {
          confirmButton.setAttribute("disabled", "disabled");
        }
        break;
    }
  }

  setQuizMeterParams(quizMeter, index) {
    const unitID = quizMeter.querySelector(".unitID");
    const unitTotal = quizMeter.querySelector(".unitTotal");
    const meterVal = quizMeter.querySelector(".meterVal");

    unitID.innerText = index + 1;
    unitTotal.innerText = this.slides;
    meterVal.style.width = `${(100 * (index + 1)) / this.slides}%`;
  }

  addInputHandlers(index) {
    const inputs = [...this.quizUnits[index].querySelectorAll("input")];
    inputs.forEach((input) => {
      input.addEventListener("input", () => {
        this.quizData[index].value = input.value;

        this.checkConfirmButton(index);
      });
    });
  }

  nextSlide() {
    if (this.currentSlide >= this.slides - 1) {
      return;
    }

    this.activeUnit.classList.remove("test__unit_active");
    this.currentSlide++;

    this.activeUnit = this.quizUnits[this.currentSlide];
    this.activeUnit.classList.add("test__unit_active");
    this.checkConfirmButton(this.currentSlide + 1);
    checkInfoBlock();
    checkMultyBlock();
  }

  prevSlide() {
    if (this.currentSlide <= 0) {
      return;
    }

    this.activeUnit.classList.remove("test__unit_active");
    this.currentSlide--;

    this.activeUnit = this.quizUnits[this.currentSlide];
    this.activeUnit.classList.add("test__unit_active");
  }
}

function specialHandler(unit, index, storage) {
  function isValid(validationObj) {
    for (let value of Object.values(validationObj)) {
      if (!value) {
        return false;
      }
    }

    return true;
  }

  function checkBtn(validationObj) {
    if (isValid(validationObj)) {
      getProgramBtn.removeAttribute("disabled");
    } else {
      getProgramBtn.setAttribute("disabled", "disabled");
    }
  }

  const getProgramBtn = unit.querySelector("button.getProgram");
  const email = unit.querySelector('input[name="email"]');
  const agree = unit.querySelector('input[name="agree"]');

  const validation = {
    agree: false,
    email: false,
  };

  getProgramBtn.setAttribute("disabled", "disabled");

  agree.addEventListener("change", () => {
    if (agree.checked) {
      validation.agree = true;
    } else {
      validation.agree = false;
    }

    checkBtn(validation);
  });

  email.addEventListener("input", () => {
    if (email.value.match(EMAIL_REGEXP)) {
      validation.email = true;
    } else {
      validation.email = false;
    }

    checkBtn(validation);
  });

  getProgramBtn.addEventListener("click", function () {
    storage[index].value = email.value;
    saveDataToStorage(storage);
    document.location.href = `${resultsPage}`;
  });
}

function saveDataToStorage(data) {
  const formatted = Object.values(data).reduce(
    (acc, { name = "", value = "" }) => {
      acc[name] = value;
      return acc;
    },
    {}
  );

  localStorage.setItem("testResults", JSON.stringify(formatted));
}

const testInstance = new Test("quiz", "test__unit", 0);

const info = document.querySelector(".info");
const infoUnit = document.querySelector("#info");
const infoInputs = infoUnit.querySelectorAll("input");
const infoConfirm = infoUnit.querySelector(".unitConfirm");
const infoBg = document.querySelector(".infoBg");

infoInputs.forEach((input) => {
  input.addEventListener("input", () => {
    info.style.display = "block";
    infoConfirm.style.display = "block";
    disableInputs();
  });
});

const disableInputs = () => {
  infoInputs.forEach((input) => {
    input.disabled = true;
  });
};

const checkInfoBlock = () => {
  if (infoUnit.classList.contains("test__unit_active")) {
    infoBg.style.display = "block";
  } else {
    if (infoBg.getAttribute("style")) {
      infoBg.style.display = "none";
    }
  }
};

const multiValue = document.querySelector("#multiValue");
const inputs = multiValue.querySelectorAll("input[type='number']");
const multiValueConfirm = multiValue.querySelector(".unitConfirm");

if (multiValue) {
  const select1 = new CustomSelect("#unitOfWeight1", {
    name: "unitOfWeight1", // значение атрибута name у кнопки
    targetValue: "СМ", // значение по умолчанию
    options: [
      ["СМ", "СМ"],
      ["Дюйм", "Дюйм"],
    ], // опции
  });
  const select2 = new CustomSelect("#unitOfWeight2", {
    name: "unitOfWeight2", // значение атрибута name у кнопки
    targetValue: "КГ", // значение по умолчанию
    options: [
      ["КГ", "КГ"],
      ["ФТ", "ФТ"],
    ], // опции
  });
}

const checkMultyBlock = () => {
  if (multiValue.classList.contains("test__unit_active")) {
    inputs.forEach((input) => {
      input.addEventListener("input", () => {
        checkValue();
      });
    });
    multiValueConfirm.addEventListener("click", () => {
      let parametrs = [];
      inputs.forEach((el) => {
        parametrs = [
          ...parametrs,
          {
            name: el.name,
            value: el.value,
          },
        ];
      });

      const formatted = Object.values(parametrs).reduce(
        (acc, { name = "", value = "" }) => {
          acc[name] = value;
          return acc;
        },
        {}
      );

      localStorage.setItem("parametrs", JSON.stringify(formatted));
    });
  }
};

const checkValue = () => {
  console.log('check');
  let check = true;
  inputs.forEach((input) => {
    if (input.value === "") {
      check = false;
    }
  });

  if (check) {
    multiValueConfirm.disabled = false;
  } else {
    multiValueConfirm.disabled = true;
  }
};

/*Работа селекта */
const customSelect = document.querySelector("#customSelect");
const unitOfWeight =
  customSelect && customSelect.querySelector("#unitOfWeight");

if (customSelect) {
  const select1 = new CustomSelect("#unitOfWeight", {
    name: "unitOfWeight", // значение атрибута name у кнопки
    targetValue: "КГ", // значение по умолчанию
    options: [
      ["КГ", "КГ"],
      ["ФТ", "ФТ"],
    ], // опции
  });
}

let units = [];

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

  console.log(units, "units");

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

document
  .querySelector("#unitOfWeight")
  .addEventListener("select.change", (e) => {
    saveParam(e);
  });
document
  .querySelector("#unitOfWeight1")
  .addEventListener("select.change", (e) => {
    saveParam(e);
  });
document
  .querySelector("#unitOfWeight2")
  .addEventListener("select.change", (e) => {
    saveParam(e);
  });
