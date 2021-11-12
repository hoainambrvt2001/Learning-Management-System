<?php
class CourseModel{
    public $courseId;
    public $teacherId;
    public $name;

    public function __construct($courseId, $teacherId, $name){
        $this->courseId = $courseId;
        $this->teacherId = $teacherId;
        $this->name = $name;
    }
}