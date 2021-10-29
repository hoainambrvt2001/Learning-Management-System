<!DOCTYPE html>
<html>
    Tan dep trai
</html>
<?php
    session_start();

    if (!isset($_SESSION['username']) && $_SESSION['username'] == NULL) {
        header('Location: ./login/index.php');
    } else {
        echo 'Welcome '.$_SESSION['username'];
    }
?>