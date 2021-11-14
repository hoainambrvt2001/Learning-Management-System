let createBtn = document.querySelector(".create-btn");
let form = document.querySelector(".form-quiz");

let toggle = false;
let height = 0;

let count = 1;
let initWrapper = form.querySelector(".form-wrapper");
let wrapperHeight = initWrapper.clientHeight;

if (window.innerWidth < 768) {
  height = 860;
} else {
  height = 580;
}

if (window.innerWidth < 663) {
  height += 130;
}

if (window.innerWidth < 417) {
  height += 60;
}

window.addEventListener("resize", () => {
  toggle = false;
  form.style.opacity = 0;
  form.style.height = 0;
  form.style.zIndex = -10;
  form.style.marginTop = 0;
  initWrapper = form.querySelector(".form-wrapper");
  initRemove = initWrapper.getElementsByClassName("fa-close");
  wrapperHeight = initWrapper.clientHeight;
  if (window.innerWidth < 768) {
    height = 860 + wrapperHeight * (count - 1);
  } else {
    height = 580 + wrapperHeight * (count - 1);
  }

  if (window.innerWidth < 663) {
    height += 130;
  }

  if (window.innerWidth < 417) {
    height += 60;
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
let ipCount = document.querySelector(".ipCount");

addBtn.addEventListener("click", () => {
  count++;
  ipCount.value = count;
  let wrapper = document.createElement("div");
  wrapper.className = "form-wrapper";
  wrapper.innerHTML = `
    <div class='line'></div>
    <div class="form-header">
      <div class="form-title">
        <p class="title">Question ${count}<span class="wrong"></span></p>
        <i class="fa fa-minus-circle"></i>
      </div>
      <div class="form-input">
        <textarea name="description-${count}" rows="2" placeholder="Question Description" required></textarea>
        <div class="form-select">
          <input type="hidden" name="level">
          <select name="lvlOption-${count}" required>
            <option style="display: none">Level:</option>
            <option value="0">Easy</option>
            <option value="1">Medium</option>
            <option value="2">Hard</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-bottom">
      <div class="form-option">
        <p>Option A<span style="color: red">*</span><span class="wrong"></span></p>
        <textarea name="option1-${count}" rows="2" placeholder="Option A (correct answer)" required></textarea>
      </div>
      <div class="form-option">
        <p>Option B <span class="wrong"></span></p>
        <textarea name="option2-${count}" rows="2" placeholder="Option B" required></textarea>
      </div>
      <div class="form-option">
        <p>Option C <span class="wrong"></span></p>
        <textarea name="option3-${count}" rows="2" placeholder="Option C" required></textarea>
      </div>
      <div class="form-option">
        <p>Option D <span class="wrong"></span></p>
        <textarea name="option4-${count}" rows="2" placeholder="Option D" required></textarea>
      </div>
    </div>
  `;

  height += wrapperHeight;
  form.style.height = `${height}px`;
  form.insertBefore(wrapper, addBtn);

  wrapper = form.getElementsByClassName("form-wrapper");
  wrapper = wrapper[wrapper.length - 1];
  console.log(wrapper);
  wrapper.querySelector(".fa-minus-circle").addEventListener("click", () => {
    wrapper.remove();
    count--;
    ipCount.value = count;
    height -= wrapperHeight;
    form.style.height = `${height}px`;
    let counting = document.getElementsByClassName("count");
    for (let i = 0; i < counting.length; i++) {
      counting[i].innerText = i + 2;
    }
  });
});

let temp = document.getElementsByClassName("select-date");
let dateChange = 0;
let wrong = true;

const validateDate = () => {
  if (new Date(temp[0].value).getTime() > new Date(temp[1].value).getTime()) {
    wrong = true;
  } else wrong = false;
};

temp[0].addEventListener("change", () => {
  dateChange++;
  dateChange > 1 ? validateDate() : null;
});

temp[1].addEventListener("change", () => {
  dateChange++;
  dateChange > 1 ? validateDate() : null;
});

form.addEventListener("submit", (e) => {
  if (wrong) {
    e.preventDefault();
    document.querySelector(".wrong").innerHTML =
      "Start date cannot be less than due date";
  }
});
