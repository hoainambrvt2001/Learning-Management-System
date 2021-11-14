<?php
// Get quiz collection:
$questionCollection = $mydb->question;
$quizCollection =  $mydb->quiz;

// Random Quiz ID:
function random_quiz_id()
{
  $chars = "Q";
  $numbers = "0123456789";
  // Course ID contains 6 characters included 2 for chars and 4 for numbers
  $quizId = $chars . substr(str_shuffle($numbers), 0, 4);
  return $quizId;
};

if (isset($_POST['btnAddQuiz'])) {
  // Insert Quiz
  $quizID = random_quiz_id();
  $quizName = $_POST['quizName'];
  $insertQuiz = $quizCollection->insertOne([
    'quizID' => $quizID, //quizId
    'teacherID' => $_SESSION['teacherID'], //teacherId
    'courseID' => $_SESSION['courseID'],  //courseId
    'name' => $quizName,
    'startDate' => date("Y"),
    'dueDate' => date("Y"),
  ]);

  $countQuestions = (int) $_POST['countQuestions'];
  // Insert Questions:
  for ($i = 0; $i < $countQuestions; $i++) {
    $description = htmlspecialchars($_POST['description-' . $i + 1]);
    $option1 = htmlspecialchars($_POST['option1-' . $i + 1]);
    $option2 = htmlspecialchars($_POST['option2-' . $i + 1]);
    $option3 = htmlspecialchars($_POST['option3-' . $i + 1]);
    $option4 = htmlspecialchars($_POST['option4-' . $i + 1]);
    $level = $_POST['lvlOption-' . $i + 1];

    $insertQuestion = $questionCollection->insertOne([
      'questionNumber' => $i + 1,
      'quizID' => $quizID, //quizId
      'courseID' => $_SESSION['courseID'],  //courseId
      'description' => $description,
      'option1' => $option1,
      'option2' => $option2,
      'option3' => $option3,
      'option4' => $option4,
      'level' => $level,
      'unitScore' => round(10 / $countQuestions, 2),
    ]);
  }

  // Prevent resubmission form:
  header("Location: ./");
}
?>

<form class="form-quiz" id="form-quiz" method="POST">
  <div class="form-top">
    <div class="form-name">
      <p class="title">Quiz name</p>
      <input type="text" name="quizName" placeholder="Quiz name" required>
    </div>
    <div>
      <div class="date-flex">
        <div class="date">
          <p>Start Date </p>
          <input type="date" name="date" placeholder="Select Date" class="select-date" required>
        </div>
        <div class="date">
          <p>Due Date </p>
          <input type="date" name="date" placeholder="Select Date" class="select-date" required>
        </div>
      </div>
      <span class="wrong"></span>
    </div>
  </div>
  <div class="form-wrapper">
    <div class='line'></div>
    <div class="form-header">
      <div class="form-title">
        <p class="title">Question 1<span class="wrong"></span></p>
      </div>
      <div class="form-input">
        <textarea name="description-1" rows="2" placeholder="Question Description" required></textarea>
        <div class="form-select">
          <input type="hidden" name="level">
          <select name="lvlOption-1">
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
        <textarea name="option1-1" rows="2" placeholder="Option A (correct answer)" required></textarea>
      </div>
      <div class="form-option">
        <p>Option B <span class="wrong"></span></p>
        <textarea name="option2-1" rows="2" placeholder="Option B" required></textarea>
      </div>
      <div class="form-option">
        <p>Option C <span class="wrong"></span></p>
        <textarea name="option3-1" rows="2" placeholder="Option C" required></textarea>
      </div>
      <div class="form-option">
        <p>Option D <span class="wrong"></span></p>
        <textarea name="option4-1" rows="2" placeholder="Option D" required></textarea>
      </div>
    </div>
  </div>
  <div class="add-btn" name="btnAddQuestion">
    <input type="hidden" value="1" class="ipCount" name="countQuestions" />
    <p>Add a question</p>
  </div>
  <div class="form-button">
    <div class="cancel">Cancel</div>
    <button type="submit" class="submit" name="btnAddQuiz">Submit</button>
  </div>
</form>

<h1><?php echo $title; ?></h1>

<div class="content-container">
  <?php
  // Get quiz collections
  $quizCollection = $mydb->quiz;

  // Get quizzes based on courseID and teacherID
  $quizzes = $quizCollection->find(['courseID' => $_SESSION["courseID"], 'teacherID' => $_SESSION["teacherID"]]);

  // line 141 TODO: push value quizID
  foreach ($quizzes as $quiz) {
    echo '<div class="card">
            <div class="card-top">
                <p>' . $quiz->name . '</p>
                <button><a href="./?page=question&quizID=quizID">VIEW</a></button>
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