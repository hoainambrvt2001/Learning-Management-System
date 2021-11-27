<?php

require_once 'MyDatabase.php';

class Teacher
{
  private $teacherId;
  private $courseIds;
  private $dtb;

  public function __construct(
    $teacherId
  ) {
    $this->dtb = new MyDatabase();
    $this->teacherId = $teacherId;
    $this->getCourseIdsFromTeacher();
  }

  public function random_course_id()
  {
    $chars = "C-";
    $numbers = str_repeat("0123456789", 10);
    $courseId =  $chars . substr(str_shuffle($numbers), 0, 10);
    return $courseId;
  }

  public function getTeacherId()
  {
    return $this->teacherId;
  }

  public function getCourseIds()
  {
    return $this->courseIds;
  }

  public function getCourseIdsFromTeacher()
  {
    $teacher = $this->dtb->teacherCollection->findOne(['teacherId' => $this->teacherId]);
    $this->courseIds = iterator_to_array($teacher->courseIds);
  }

  public function getAllCoursesBelongsTo()
  {
    $teacherCourses = array();
    foreach ($this->courseIds as $courseId) {
      $course = $this->dtb->courseCollection->findOne(['courseId' => $courseId]);
      array_push($teacherCourses, $course);
    }
    return $teacherCourses;
  }

  public function addCourse($courseName = "")
  {
    if ($courseName == "") return;

    // Create new course id by random function:
    $newCourseId = $this->random_course_id();

    // Add new course to Course collection: 
    $addResult = $this->dtb->courseCollection->insertOne([
      'courseId' => $newCourseId,
      'name' => $courseName,
      'year' => date("Y"),
    ]);

    // Get updates courseIds for teacher:
    array_push($this->courseIds, $newCourseId);

    // Update to teacher collection:
    $updateResult = $this->dtb->teacherCollection->updateOne(
      ['teacherId' => $this->teacherId],
      ['$set' => ['courseIds' => $this->courseIds]]
    );

    return [$newCourseId, $addResult->isAcknowledged() && $updateResult->isAcknowledged()];
  }

  public function editCourseName($targetCourseId = "", $courseName = "")
  {
    if ($targetCourseId == "") return;

    // Update courseName:
    $updateResult = $this->dtb->courseCollection->updateOne(
      ['courseId' => $targetCourseId],
      ['$set' => ['name' => $courseName]]
    );

    return $updateResult->isAcknowledged();
  }

  public function deleteCourse($targetCourseId = "")
  {
    if ($targetCourseId == "") return;

    // Get all quiz that course has:
    $quizzes = $this->dtb->quizCollection->find(['courseId' => $targetCourseId]);

    // Delete all marks and questions:
    $deleteQuestionsAndMarksResult = true;
    foreach ($quizzes as $quiz) {
      $deleteQuestionResult = $this->dtb->markCollection->deleteMany([
        'quizId' => $quiz->quizId
      ]);
      $deleteMarkResult = $this->dtb->questionCollection->deleteMany([
        'quizId' => $quiz->quizId
      ]);
      $deleteQuestionsAndMarksResult = $deleteQuestionsAndMarksResult && $deleteMarkResult->isAcknowledged() && $deleteQuestionResult->isAcknowledged();
    }

    // Delete all quizzes and courseId:
    $deleteQuizzesResult = $this->dtb->quizCollection->deleteMany(['courseId' => $targetCourseId]);
    $deleteCourseResult  = $this->dtb->courseCollection->deleteOne(['courseId' => $targetCourseId]);

    // Update courseIds for teacher:
    $targetCoursePosition = array_search($targetCourseId, $this->courseIds);
    array_splice($this->courseIds, $targetCoursePosition, 1);
    $updateCourseIdsOfTeacher = $this->dtb->teacherCollection->updateOne(
      ['teacherId' => $this->teacherId],
      ['$set' => ['courseIds' => $this->courseIds]]
    );

    return $deleteQuestionsAndMarksResult && $deleteQuizzesResult->isAcknowledged() && $deleteCourseResult->isAcknowledged() && $updateCourseIdsOfTeacher->isAcknowledged();
  }
}
