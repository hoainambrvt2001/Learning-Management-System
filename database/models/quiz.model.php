<?php
class QuizModel{
    public $quizId;
    public $courseId;
    public $startTime;
    public $startDate;
    public $dueTime;
    public $dueDate;
    
    public function __construct($quizId, $courseId, $startTime, $startDate, $dueTime, $dueDate){
        $this->quizId = $quizId;
        $this->courseId = $courseId;
        $this->startTime = $startTime;
        $this->startDate = $startDate;
        $this->dueTime = $dueTime;
        $this->dueDate = $dueDate;
    }


}