<?php
class MarkModel{
    public $score;
    public $quizAnswers;
    public $studentId;
    public $quizId;

    public function __construct($score, $quizAnswers, $studentId, $quizId){
        $this->score = $score;
        $this->quizAnswers = $quizAnswers;
        $this->studentId = $studentId;
        $this->quizId = $quizId;
    }
}