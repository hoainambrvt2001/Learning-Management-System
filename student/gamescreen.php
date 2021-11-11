<?php
    session_start();

    if (!isset($_SESSION['username']) && $_SESSION['username'] == NULL) {
        header('Location: ../login/');
    } else {
        if (isset($_SESSION['isTeacher']) && $_SESSION['isTeacher'] == true){
            header('Location: ../login/');
        }
    }
    include '../connect.php';
    if (isset($_GET['id'])){
        $quizID = $_GET['id'];
        
        $post = $db->quiz;

        $results = $post->findOne(['quizID'=>$quizID]);

        if (empty($results)){
            header('Location: ./selection.php');
        } else {
            
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Quiz Time</title>
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body class="gamescreen-body">
        <div class="gamescreen-wrapper" id="wrapper">
            <h1 class="glow">
                QUIZ NAME
            </h1>
            <div id="counter">
                <div id="counterSpan"></div>
            </div>
            <div class="questions" id="questions">                
                <div class="question" id="question">
                    <span class="span">Question goes here?</span>
                </div>
            </div>

            <!--Next and Prev Question Button-->
            <div class="btn-svg">
                <p><button type="button" class="btn-back btn" id="btnBack">
                    <div id="arrow-back">
                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                            <path d="M20 .755l-14.374 11.245 14.374 11.219-.619.781-15.381-12 15.391-12 .609.755z"/>
                        </svg>
                    </div>
                </button></p>

                
                <p><button type="button" class="btn-next btn" id="btnNext">
                    <div id="arrow-next">
                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                            <path d="M4 .755l14.374 11.245-14.374 11.219.619.781 15.381-12-15.391-12-.609.755z"/>
                        </svg>
                    </div>
                </button></p>
            </div>

            <div class="answers" id="answers">
                <p class="first-p"><button type="button" class="btn answer selected" value="choiceA" id="btn"> Libero amet, repellendus eius blanditiis in iusto eligendi iure.</button></p>
                <!--selection class is set for selected answer: answer will be changed into Yellow-->
                <p><button type="button" class="btn answer" value="choiceB" id="btn">Answer 2</button></p>
                <p><button type="button" class="btn answer" value="choiceC" id="btn">Answer 3</button></p>
                <p><button type="button" class="btn answer" value="choiceD" id="btn">Answer 4</button></p>
            </div>

            <div class="answers" id="answers">
                <p class="first-p"><button type="button" class="btn answer selected" value="choiceA" id="btn"> Libero amet, repellendus eius blanditiis in iusto eligendi iure.</button></p>
                <!--selection class is set for selected answer: answer will be changed into Yellow-->
                <p><button type="button" class="btn answer" value="choiceB" id="btn">abv</button></p>
                <p><button type="button" class="btn answer" value="choiceC" id="btn">Answer 3</button></p>
                <p><button type="button" class="btn answer" value="choiceD" id="btn">Answer 4</button></p>
            </div>
            

            <div class="next" id="next">
                
                <a href="results.php"><button type="button" class="btn-submit" id="btnSubmit">SUBMIT</button></a>

            </div>
        </div>
        
        <audio  id="music">
            <source src="sfx/long-Oman.mp3" type="audio/mp3">
        </audio>
        <audio  id="click">
            <source src="sfx/click.ogg" type="audio/mp3">
        </audio>
    <script src="js/question.js"></script>
    </body>
    
</html>




