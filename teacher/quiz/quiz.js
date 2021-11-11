let createBtn = document.querySelector(".create-btn");
let form = document.querySelector(".form-quiz");

let toggle = false;
let height = 0;

let count = 1;
let wrapperHeight = form.querySelector(".form-wrapper").clientHeight;
if (window.innerWidth < 768) {
  height = 820;
} else {
  height = 540;
}

window.addEventListener("resize", () => {
  toggle = false;
  form.style.opacity = 0;
  form.style.height = 0;
  form.style.zIndex = -10;
  form.style.marginTop = 0;
  wrapperHeight = form.querySelector(".form-wrapper").clientHeight;
  if (window.innerWidth < 768) {
    height = 820 + wrapperHeight * (count - 1);
  } else {
    height = 540 + wrapperHeight * (count - 1);
  }
});

createBtn.addEventListener("click", () => {
  toggle = !toggle;
  if (toggle) {
    form.style.height = `${height}px`;
    form.style.opacity = 1;
    form.style.zIndex = 0;
    form.style.marginTop = "20px";
  } else {
    form.style.opacity = 0;
    form.style.height = 0;
    form.style.zIndex = -10;
    form.style.marginTop = 0;
  }
});

form.querySelector(".cancel").addEventListener("click", () => {
  toggle = false;
  form.style.opacity = 0;
  form.style.height = 0;
  form.style.zIndex = -10;
});

let addBtn = document.querySelector(".add-btn");

addBtn.addEventListener("click", () => {
  let wrapper = document.createElement("div");
  wrapper.className = "form-wrapper";
  wrapper.innerHTML = `
    <div class="form-header">
      <div class="form-question">
        <p>Question ${++count}<span class="wrong"></span></p>
        <textarea name="question" rows="2" placeholder="Question Description"></textarea>
      </div>
      <div class="form-level">
        <input type="hidden" name="level" >
        <div class="form-select">
          <input type="hidden" name="level">
          <select >
            <option style="display: none">Level:</option>
            <option>Easy</option>
            <option>Medium</option>
            <option>Hard</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-bottom">
      <div class="form-option">
        <p>Option A<span style="color: red">*</span><span class="wrong"></span></p>
        <textarea name="A" rows="2" placeholder="Option A (correct answer)"></textarea>
      </div>
      <div class="form-option">
        <p>Option B <span class="wrong"></span></p>
        <textarea name="B" rows="2" placeholder="Option B"></textarea>
      </div>
      <div class="form-option">
        <p>Option C <span class="wrong"></span></p>
        <textarea name="C" rows="2" placeholder="Option C"></textarea>
      </div>
      <div class="form-option">
        <p>Option D <span class="wrong"></span></p>
        <textarea name="D" rows="2" placeholder="Option D"></textarea>
      </div>
    </div>
  `;

  height += wrapperHeight;
  form.style.height = `${height}px`;
  form.insertBefore(wrapper, addBtn);
});
