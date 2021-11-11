<?php

require_once "./queryFunctions.php";

// Testing functions here
echo "Testing function: testGetQuizQuetions() <br> <a>------------------------------</a> <br>";
testGetQuizQuetions();


function testGetQuizQuetions(){
    $quizId = "CO2013-1";
    print_r(getQuizQuestions($quizId));
}
