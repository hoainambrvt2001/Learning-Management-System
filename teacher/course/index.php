<?php
function random_course_id()
{
  $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $numbers = "0123456789";
  // Course ID contains 6 characters included 2 for chars and 4 for numbers
  $courseID = substr(str_shuffle($chars), 0, 2) . substr(str_shuffle($numbers), 0, 4);
  return $courseID;
}

// Handle submit add course:
if (isset($_POST['btnAddCourse'])) {
  $courseName = $_POST['ipCourseName'];
  if (!$courseName)
    echo "Course's name must not be empty";

  // Get course collection:
  $courseCollection = $mydb->course;

  // Create new course id by random function:
  $newCourseID = random_course_id();

  // Add new course to Course collection: 
  $addResult = $courseCollection->insertOne([
    'courseID' => $newCourseID,
    'name' => $courseName,
    'year' => date("Y"),
    'semester' => '211',
  ]);

  // Get teacher collection:
  $teacherCollection = $mydb->teacher;

  // Get courseIDs created by current teacher ID 
  $teacher = $teacherCollection->findOne(['teacherID' => $_SESSION["teacherID"]]);
  $teacherCourseIDs = $teacher->courseID;

  // Filter and Update teacherCourseIDs to array:
  $filterCourseIDs = array($newCourseID);
  foreach ($teacherCourseIDs as $teacherCourseID) {
    array_push($filterCourseIDs, $teacherCourseID);
  }

  // Update to teacher collection:
  $updateResult = $teacherCollection->updateOne(
    ['teacherID' => $teacher->teacherID],
    ['$set' => ['courseID' => $filterCourseIDs]]
  );

  // Prevent resubmission form:
  header("Location: ./");
}
?>

<form class="form-course" method="POST">
  <div class="form-header">
    <div class="form-title">Add course</div>
    <div class="form-button">
      <div class="cancel">Cancel</div>
      <button type="submit" class="submit" name="btnAddCourse">Submit</button>
    </div>
  </div>
  <input type="text" name="ipCourseName" class="input" placeholder="Course Name" />
</form>

<h1><?php echo $title; ?></h1>

<div class="content-container">
  <!-- Use data here -->
  <?php
  // Get teacher and course collections
  $teacherCollection = $mydb->teacher;
  $courseCollection = $mydb->course;

  // Get courseIDs created by teacher
  $teacher = $teacherCollection->findOne(['teacherID' => $_SESSION["teacherID"]]);
  $courseIDs = $teacher->courseID;

  // Loop to get courses created by teacher
  $teacherCourses = array();
  foreach ($courseIDs as $courseID) {
    $result = $courseCollection->findOne(['courseID' => $courseID]);
    $course = array("courseID" => $result->courseID, "name" => $result->name, "year" => $result->year, "semester" => $result->semester);
    array_push($teacherCourses, $course);
  }

  // Render courses to card
  foreach ($teacherCourses as $teacherCourse) {
    echo "
      <div class='card'>
      <div class='card-image'>
        <img src='../assets/course.png' alt=''>
      </div>
      <div class='card-content'>
        <p>$teacherCourse[name]</p>
        <a href='/?courseID=courseID'><button>View</button></a>
      </div>
    </div>
    ";
  }
  ?>
</div>
<script src="./course/course.js"></script>