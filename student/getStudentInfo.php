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

        $result = $post->findOne(['teacherId'=>$teacherID]);

        return $result;
    }

    function getCourse($courseID){
        include '../connect.php';

        $post = $db->course;

        $result = $post->findOne(['courseId'=>$courseID]);

        return $result;
    }

    function getQuiz($quizID){
        include '../connect.php';

        $post = $db->quiz;

        $result = $post->findOne(['quizId'=>$quizID]);

        return $result;
    }

?>