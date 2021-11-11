<form class="form-quiz" id="form-quiz">
  <div class="form-name">
    <p>Quiz name <span class="wrong"></span></p>
    <input type="text" name="quiz-name" placeholder="Quiz name">
  </div>
  <div class="form-wrapper">
    <div class="form-header">
      <div class="form-question">
        <p>Question 1<span class="wrong"></span></p>
        <textarea name="question" rows="2" placeholder="Question Description"></textarea>
      </div>
      <div class="form-level">
        <input type="hidden" name="level">
        <div class="form-select">
          <input type="hidden" name="level">
          <select>
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
  </div>
  <div class="add-btn">
    <p>Add a question</p>
  </div>
  <div class="form-button">
    <div class="cancel">Cancel</div>
    <button type="submit" class="submit">Submit</button>
  </div>
</form>

<h1><?php echo $title; ?></h1>

<div class="content-container">
  <?php
  // Get quiz collections
  $quizCollection = $mydb->quiz;

  // Get quizzes based on courseID and teacherID
  $quizzes = $quizCollection->find(['courseID' => $_SESSION["courseID"], 'teacherID' => $_SESSION["teacherID"]]);

  foreach ($quizzes as $quiz) {
    echo '<div class="card">
            <div class="card-top">
                <p>' . $quiz->name . '</p>
                <button><a href="./">VIEW</a></button>
            </div>
            <div class="card-bot">
              <p class="date">' . $quiz->startDate . '</p>
              <div class="horizon-line"></div>
              <p class="date">' . $quiz->dueDate . '</p>
            </div>
          </div>';
  }
  ?>
</div>
<script src="./quiz/quiz.js"></script>