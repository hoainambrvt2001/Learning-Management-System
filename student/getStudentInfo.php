<?php
    function getStudent($username){
        include '../connect.php';

        $post = $db->student;

        $result = $post->findOne(['username'=>$username]);

        return $result;
    }

    function getTeacher($teacherID){
        include '../connect.php';

        $post = $db->teacher;

        $result = $post->findOne(['teacherID'=>$teacherID]);

        return $result;
    }

    function getCourse($courseID){
        include '../connect.php';

        $post = $db->course;

        $result = $post->findOne(['courseID'=>$courseID]);

        return $result;
    }

    function getQuiz($quizID){
        include '../connect.php';

        $post = $db->quiz;

        $result = $post->findOne(['quizID'=>$quizID]);

        return $result;
    }

?>