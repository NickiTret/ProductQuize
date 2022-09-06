const payBtn = document.querySelector("#payBtn");
const inputs = document.querySelectorAll("input");

const main = document.querySelector(".loaded");
const loading = document.querySelector(".loading");
const error = document.querySelector(".error");

if (payBtn && inputs && main && loading && error) {
    payBtn.addEventListener("click", () => {
        inputs.forEach((input) => {
            let lengthInput = input.getAttribute("maxlength");
            if (input.value === "" || input.value.length > lengthInput) {
                input.classList.add("inputEmpty");
            } else {
                if (input.classList.contains("inputEmpty")) {
                    input.classList.remove("inputEmpty");
                }
            }
        });
        var check = true;
        inputs.forEach((input) => {
            if (input.value === "") {
                check = false;
            }
        });

        if (check) {
            main.style.display = "none";
            loading.style.display = "flex";
            setTimeout(() => {
                loading.style.display = "none";
                error.style.display = "flex";
            }, 3500);
        }
    });
}


const testResults = JSON.parse(localStorage.getItem("testResults") || {});

