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
    <title>Quiz Result</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body class="body-results">
<?php
    if (isset($_POST['score'])){
        $score  = $_POST['answers'];
    }
    var_dump($score);
?>
    <main class='result-main'> 
        <header class="result-header">
            <div class="quiz-title">
                <h1 id="quiz-name">
                    QUIZ NAME
                </h1>
                <h4 id="quiz-course">
                    Course: Course Name
                </h4> 
                <h4 id="quiz-creator">
                    Created by: Teacher name
                </h4> 
            </div>
            <h2 class="result-header">Your total score is</h2>
        
        </header>
        <section id="resultsDisplay" class="results-display">
            <h3 class="result-header"   id="score">
                65/100!
            </h3>
            <p>
                <a class="back-to-home" href="index.php">Back to Home</a>
            </p>
            <div class="more-results" id="moreResults">
                Details
            </div>
            <div class="full-results">
                <table id="fullResults" class='results-table'> 
                    <thead>
                        <th>Question</th>
                        <th>Level</th>
                        <th>Your Answer</th>
                        <th>Correct Answer</th>
                        <th>Score</th>
                    </thead>
                    <tbody id='tableBody'>
                        <tr class="right">
                            <td>
                                In the film "Interstellar", how long did they spend on Miller's planet?
                            </td>
                            <td>Hard</td>
                            <td>
                                23 years, 4 months, and 8 days
                            </td>
                            <td>
                                23 years, 4 months, and 8 days
                            </td>
                            <td>30</td>
                        </tr>

                        <tr class="wrong">
                            <td>
                                In the Friday The 13th series, what year did Jason drown in?
                            </td>
                            <td>Medium</td>
                            <td>
                                1955
                            </td>
                            <td>
                                1957
                            </td>
                            <td>0</td>
                        </tr>

                        <tr class="wrong">
                            <td>
                                What zodiac sign comes after Gemini?
                            </td>
                            <td>Easy</td>
                            <td>
                                Scorpio
                            </td>
                            <td>
                                Cancer
                            </td>
                            <td>0</td>
                        </tr>

                        <tr class="right">
                            <td>
                                Who created the animated series, Oggy and the Cockroaches?
                            </td>
                            <td>Medium</td>
                            <td>
                                Jean-Yves Raimbaud 
                            </td>
                            <td>
                                Jean-Yves Raimbaud 
                            </td>
                            <td>20</td>
                        </tr>

                        <tr class="right">
                            <td>
                                What is the name of World’s first AI robot citizen?
                            </td>
                            <td>Easy</td>
                            <td>
                                Sophia
                            </td>
                            <td>
                                Sophia 
                            </td>
                            <td>15</td>
                        </tr>
                    </tbody> 
                </table>
            </div>
        </section>
    <!-- <audio  id="music">
        <source src="sfx/main-Oman.mp3" type="audio/mp3">
    </audio> -->
    <audio  id="click">
        <source src="sfx/click.ogg" type="audio/mp3">
    </audio>
</body>
<script src="js/confetti.js"></script>
<script>confetti.start()</script>
<script src="js/results.js"></script>
</html>