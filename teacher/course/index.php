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

<!-- Icon -->
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<form class="form-course" method="POST">
  <div class="form-header">
    <div class="form-title">Add a course</div>
    <p class="wrong"></p>
  </div>
  <input type="text" name="ipCourseName" class="input" placeholder="Course Name" />
  <input type="hidden" name="courseID">
  <div class="form-button">
    <div class="cancel">Cancel</div>
    <button type="submit" class="submit" name="btnAddCourse">Submit</button>
  </div>
</form>

<h1><?php echo $title; ?></h1>

<div class="form-wrapper">
<form class="form-edit">
  <div class="form-header">
    <div class="form-title">Edit name</div>
    <p class="wrong"></p>
  </div>
  <input type="text" name="ipCourseName" class="input" placeholder="Course Name" />
  <input type="hidden" name="courseID">
  <input type="hidden" name="type" value="1">
  <div class="form-button">
    <div class="cancel">Cancel</div>
    <button type="submit" class="submit" name="btnEditCourse">Submit</button>
  </div>
</form>
</div>

<div class="form-wrapper">
<form class="form-delete">
  <p style="text-align: center">Do you want to delete this course ?</p>
  <div class="form-button">
    <div class="cancel">Cancel</div>
    <button type="submit" class="submit" name="btnDeleteCourse">Submit</button>
    <input type="hidden" name="courseID">
    <input type="hidden" name="type" value="2">
  </div>
</form>
</div>

<div class="content-container">
  <!-- Fake card for testing -->

  <!-- <div class='card'>
    <div class='card-image'>
      <img src='../assets/course.png' alt=''>
    </div>
    <div class='card-content'>
      <p class="course-name">temp</p>
      <div class="content-bottom">
        <a href='./?page=quiz'><button>View</button></a>
        <div class="drop-down">
          <i class="fas fa-ellipsis-v"></i>
          <div class="drop-down-list">
            <p class="edit">Edit name</p>
            <p class="delete">Delete course</p>
          </div>
          <input type="hidden" name="courseID" value="1" >
        </div>
      </div>
    </div>
  </div>  -->

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

  // line 153 TODO: push value courseID
  foreach ($teacherCourses as $teacherCourse) {
    echo "
      <div class='card'>
        <div class='card-image'>
          <img src='../assets/course.png' alt=''>
        </div>
        <div class='card-content'>
          <p class='course-name'>$teacherCourse[name]</p>
          <div class='content-bottom'>
            <a href='./?page=quiz&courseID=courseID'><button>View</button></a>
            <div class='drop-down'>
              <i class='fas fa-ellipsis-v'></i>
              <div class='drop-down-list'>
                <p class='edit'>Edit name</p>
                <p class='delete'>Delete course</p>
              </div>
              <input type='hidden' name='courseID' value='1' >
            </div>
          </div>
        </div>
      </div> 
    ";
  }
  ?>
</div>
<script src="./course/course.js"></script>