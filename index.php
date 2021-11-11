<!DOCTYPE html>
<html>
    Tan dep trai
</html>
<?php
    session_start();

    if (!isset($_SESSION['username']) && $_SESSION['username'] == NULL) {
        header('Location: ./login/');
    } else {
        if (isset($_SESSION['isStudent']) && $_SESSION['isStudent'] == true){
            header('Location: ./student/');
        }
        if (isset($_SESSION['isTeacher']) && $_SESSION['isTeacher'] == true){
            header('Location: ./teacher/');
        }
    }
?>