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
            $post = $db->question;
            $result = $post->find(['quizID'=>$quizID]);
        }
    }
?>


<!-- Created By CodingNepal - www.codingnepalweb.com  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Time</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- FontAweome CDN Link for Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <!-- start Quiz button -->
    <div class="wrapper">
        <div class="hero-image">
            <img src="images/quizyo-1.png" class="entry-logo">
        </div>
    </div>
    <div class="start_btn">
        <button>Start Quiz!</button>
    </div>

    <div class="home_btn">
        <button><a href="index.php">Back to Home</a></button>
    </div>

    <!-- Info Box -->
    <div class="info_box">
        <div class="info-title"><span>IMPORTANT: QUIZ RULES!</span></div>
        <div class="info-list">
            <div class="info">1. You will have only <span>15 seconds</span> per each question.</div>
            <div class="info">2. Once you select your answer, it can't be undone.</div>
            <div class="info">3. You can't select any option once time goes off.</div>
            <div class="info">4. You can't exit from the Quiz while you're playing.</div>
            <div class="info">5. You'll get points on the basis of your correct answers.</div>
        </div>
        <div class="buttons">
            <button class="quit">Exit Quiz</button>
            <button class="restart">Continue</button>
        </div>
    </div>

    <!-- Quiz Box -->
    <div class="quiz_box">
        <header>
            <div class="title">QUIZ NAME</div>
            <div class="timer">
                <div class="time_left_txt">Time Left</div>
                <div class="timer_sec">15</div>
            </div>
            <div class="time_line"></div>
        </header>
        <section>
            <div class="que_text">
                <!-- Here I've inserted question from JavaScript -->
            </div>
            <div class="option_list">
                <!-- Here I've inserted options from JavaScript -->
            </div>
        </section>

        <!-- footer of Quiz Box -->
        <footer>
            <div class="total_que">
                <!-- Here I've inserted Question Count Number from JavaScript -->
            </div>
            <button class="next_btn">
                Next >>
            </button>
        </footer>
    </div>

    <!-- Result Box -->
    <div class="result_box">
        <div class="icon">
            <i class="fas fa-crown"></i>
        </div>
        <div class="complete_text">You've completed the Quiz!</div>
        <div class="buttons">
            <button class="restart">
                <a href="results.php">
                    More detail
                </a>
            </button>
            <button class="quit">Quit Quiz</button>
        </div>
    </div>

    <!-- Inside this JavaScript file I've inserted Questions and Options only -->
    <!-- <script src="js/questions.js"></script> -->

    <!-- Inside this JavaScript file I've coded all Quiz Codes -->
    <script src="js/script.js"></script>

</body>
</html>
<script>   
let questions = [
    <?php
            $k = 1;
            foreach ($result as $row){
                echo '
                        {
                        numb: '.$k.',
                        question: "'.$row->description.'",
                        answer: "'.$row->firstChoice.'",
                        options: [
                        "'.$row->firstChoice.'",
                        "'.$row->secondChoice.'",
                        "'.$row->thirdChoice.'",
                        "'.$row->fourthChoice.'"
                        ]
                    },
                    ';
                    $k = $k + 1;    
            }
                
    ?>,
//     {
//     numb: 1,
//     question: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean aliquam pretium felis, et fermentum ipsum dictum ut.",
//     answer: "Praesent id urna mollis, egestas lacus efficitur, semper felis. Orci varius natoque penatibus et magnis dis parturient",
//     options: [
//       "Hyper Text Preprocessor",
//       "Praesent id urna mollis, egestas lacus efficitur, semper felis. Orci varius natoque penatibus et magnis dis parturient",
//       "Hyper Text Multiple Language",
//       "Hyper Tool Multi Language"
//     ]
//   },
//     {
//     numb: 2,
//     question: "What does CSS stand for?",
//     answer: "Cascading Style Sheet",
//     options: [
//       "Common Style Sheet",
//       "Colorful Style Sheet",
//       "Computer Style Sheet",
//       "Cascading Style Sheet"
//     ]
//   },
//     {
//     numb: 3,
//     question: "What does PHP stand for?",
//     answer: "Hypertext Preprocessor",
//     options: [
//       "Hypertext Preprocessor",
//       "Hypertext Programming",
//       "Hypertext Preprogramming",
//       "Hometext Preprocessor"
//     ]
//   },
//     {
//     numb: 4,
//     question: "What does SQL stand for?",
//     answer: "Structured Query Language",
//     options: [
//       "Stylish Question Language",
//       "Stylesheet Query Language",
//       "Statement Question Language",
//       "Structured Query Language"
//     ]
//   },
//     {
//     numb: 5,
//     question: "What does XML stand for?",
//     answer: "eXtensible Markup Language",
//     options: [
//       "eXtensible Markup Language",
//       "eXecutable Multiple Language",
//       "eXTra Multi-Program Language",
//       "eXamine Multiple Language"
//     ]
//   },
 ];

</script>