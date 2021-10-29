<?php
    session_start();

    if (!isset($_SESSION['username']) && $_SESSION['username'] == NULL) {
        header('Location: ./login/index.php');
    } else {
        echo 'Welcome '.$_SESSION['username'];
    }
?>