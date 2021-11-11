let createBtn = document.querySelector(".create-btn");
let form = document.querySelector(".form-course");

let toggle = false;
let height = window.innerWidth < 768 ? "190px" : "140px";

window.addEventListener("resize", () => {
  toggle = false;
  form.style.opacity = 0;
  form.style.height = 0;
  form.style.zIndex = -10;
  height = window.innerWidth < 768 ? "190px" : "140px";
});

createBtn.addEventListener("click", () => {
  toggle = !toggle;
  if (toggle) {
    form.style.height = height;
    form.style.opacity = 1;
    form.style.zIndex = 0;
  } else {
    form.style.opacity = 0;
    form.style.height = 0;
    form.style.zIndex = -10;
  }
});

form.querySelector(".cancel").addEventListener("click", () => {
  toggle = false;
  form.style.opacity = 0;
  form.style.height = 0;
  form.style.zIndex = -10;
});
