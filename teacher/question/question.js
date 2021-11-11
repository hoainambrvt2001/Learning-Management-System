let createBtn = document.querySelector(".create-btn");
let form = document.querySelector(".form-question");

let toggle = false;
let height = window.innerWidth < 768 ? "656px" : "386px";
let padding = window.innerWidth < 768 ? "12px" : "20px";

window.addEventListener("resize", () => {
  toggle = false;
  form.style.opacity = 0;
  form.style.height = 0;
  form.style.zIndex = -10;
  form.style.marginTop = 0;
  form.style.paddingTop = 0;
  form.style.paddingBottom = 0;
  padding = window.innerWidth < 768 ? "12px" : "20px";
  height = window.innerWidth < 768 ? "656px" : "386px";
});

createBtn.addEventListener("click", () => {
  toggle = !toggle;
  if (toggle) {
    form.style.height = height;
    form.style.opacity = 1;
    form.style.zIndex = 0;
    form.style.marginTop = "20px";
    form.style.paddingTop = padding;
    form.style.paddingBottom = padding;
  } else {
    form.style.opacity = 0;
    form.style.height = 0;
    form.style.zIndex = -10;
    form.style.paddingTop = 0;
    form.style.paddingBottom = 0;
    form.style.marginTop = 0;
  }
});

form.querySelector(".cancel").addEventListener("click", () => {
  toggle = false;
  form.style.opacity = 0;
  form.style.height = 0;
  form.style.zIndex = -10;
  form.style.marginTop = 0;
  form.style.paddingTop = 0;
  form.style.paddingBottom = 0;
});

let formWrapper = document.querySelector(".form-wrapper");

// without formEdit cannot run ???????
let formEdit = document.querySelector(".form-edit");
let textarea = formEdit.getElementsByTagName("textarea");
let input = formEdit.getElementsByTagName("input");

formWrapper.querySelector(".cancel").addEventListener("click", () => {
  formWrapper.style.height = "0";
  formWrapper.style.zIndex = -1;
  formWrapper.style.opacity = 0;
});

formWrapper.querySelector(".delete").addEventListener("click", () => {
  input[1].value = 2;
});

let editBtn = document.getElementsByClassName("fa-edit");

for (let i = 0; i < editBtn.length; i++) {
  editBtn[i].addEventListener("click", () => {
    formWrapper.style.height = "100vh";
    formWrapper.style.zIndex = 10;
    formWrapper.style.opacity = 1;

    let hiddenInput = editBtn[i].getElementsByTagName("input");
    textarea[0].value = hiddenInput[0].value;
    textarea[1].value = hiddenInput[1].value;
    textarea[2].value = hiddenInput[2].value;
    textarea[3].value = hiddenInput[3].value;
    textarea[4].value = hiddenInput[4].value;
    input[0].value = hiddenInput[5].value;
  });
}
