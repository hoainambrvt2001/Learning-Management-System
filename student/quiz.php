<?php
    session_start();

    if (!isset($_SESSION['username']) && $_SESSION['username'] == NULL) {
        header('Location: ../login/');
    } else {
        if (isset($_SESSION['isTeacher']) && $_SESSION['isTeacher'] == true){
            header('Location: ../login/');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Time</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="icon" href="images/q.png">
    <link rel="stylesheet" href="css/index.css">
</head>


<body>
    <div class="wrapper">
        <main class="main">
            <div class="hero-image">
                <img src="images/quizyo-1.png" class="entry-logo">
            </div>
            <a class="lets-begin" id="beginBTN" href="selection.php">Let's Begin</a>
            <a class="lets-begin" id="homeBTN" href="index.php">Back to Home</a>
        </main>
    </div>
    <footer class="footer">
        <!-- <audio id="music">
            <source src="sfx/main-Oman.mp3" type="audio/mp3">
                <p><i class="fa fa-play" aria-hidden="true"></i>
                <i class="fa fa-pause" aria-hidden="true"></i></p>
        </audio> -->
        <audio  id="click">
            <source src="sfx/click.ogg" type="audio/mp3">
        </audio>
    </footer>
    <script src="js/entry.js"></script>
</body>
</html>