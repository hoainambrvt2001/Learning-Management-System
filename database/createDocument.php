<?php

require './connectCollection.php';


//==================================================================
//----Question data  create 27 questions
//----Before run this code make sure do not want to duplicate content

// for($cIdx = 3; $cIdx <= 5; $cIdx++){

//         for ($qIdx = 1; $qIdx <= 3; $qIdx++){

//         // $qIdx = 1 is quiz index
//         $quizId = "CO201" . $cIdx ."-". $qIdx; // CO2013-1

//                 for ($quesIdx = 1; $quesIdx <= 3; $quesIdx++){

//                 $questionId = $quizId . "-". $quesIdx;   // CO2013-1-1

//                         $questionCollection->insertOne([
                                
//                                         "quizId" => $quizId,
//                                         "questionId"=> $questionId,
//                                         "content" => "Software specification activity _____.",
//                                         "option1" => "All of the other answers are correct.",
//                                         "option2" => "Is a process of establishing the software requirements.",
//                                         "option3" => "Can includes: requirement elicitation and analysis, requirement specification and requirement validation.",
//                                         "option4" => "Is a fundamental activity in Software engineering.",
//                                         "correctAnswers" => ["1", "2"],
                                
//                                 // [
//                                 //         "quizId" => $quizId,
//                                 //         "questionId" => $questionId,
//                                 //         "content" => "In which CMM (Capability Maturity Model) level, the company guarantees about the continuously improvement in software process?",
//                                 //         "option1" => "3",
//                                 //         "option2" => "6",
//                                 //         "option3" => "5",
//                                 //         "option4" => "4",
//                                 //         "correctAnswers" => ["1"],                

//                                 // ],
//                         ]);
//                 }
//     }
// }
//==================================================================

//==================================================================
// Course data

// $courseCollection->insertMany([
//     [
//         "courseId" => "CO2013",
//         "teachetId" => "TC-1",
//         "name" => "Database Systems",
//         "quizId" => [],
//         "studentId" => [],        
//     ],
//     [
//         "courseId" => "CO2014",
//         "teachetId" => "TC-2",
//         "name" => "Web Programming",
//         "quizId" => [],
//         "studentId" => [], 
//     ],
//     [
//         "courseId" => "CO2015",
//         "teachetId" => "TC-3",
//         "name" => "Mathematical Modelling",
//         "quizId" => [],
//         "studentId" => [],
//     ]
// ]);
//==================================================================

//==================================================================
// Quiz data
// $quizCollection->insertOne([

//         "quizId" => "CO2013-1",
//         "courseId" => "CO2013",
//         "startTime" => "12h",
//         "startDate"=> "20/11/2020",      
//         "dueTime" => "12h",
//         "dueDate" => "29/12/2020",
//         "questions" => ["CO2013-1-1", "CO2013-1-2", "CO2013-1-3"],    
    
// ]);

// $quizCollection->insertOne([

//         "quizId" => "CO2013-2",
//         "courseId" => "CO2013",
//         "startTime" => "12h",
//         "startDate"=> "20/11/2020",      
//         "dueTime" => "12h",
//         "dueDate" => "29/12/2020",
//         "questions" => ["CO2013-2-1", "CO2013-2-2", "CO2013-2-3"],    
    
// ]);

// $quizCollection->insertOne([

//         "quizId" => "CO2013-3",
//         "courseId" => "CO2013",
//         "startTime" => "12h",
//         "startDate"=> "20/11/2020",      
//         "dueTime" => "12h",
//         "dueDate" => "29/12/2020",
//         "questions" => ["CO2013-3-1", "CO2013-3-2", "CO2013-3-3"],    
    
// ]);

// $quizCollection->insertOne([

//         "quizId" => "CO2014-1",
//         "courseId" => "CO2014",
//         "startTime" => "12h",
//         "startDate"=> "20/11/2020",      
//         "dueTime" => "12h",
//         "dueDate" => "29/12/2020",
//         "questions" => ["CO2014-1-1", "CO2014-1-2", "CO2014-1-3"],    
    
// ]);
// $quizCollection->insertOne([

//         "quizId" => "CO2014-2",
//         "courseId" => "CO2014",
//         "startTime" => "12h",
//         "startDate"=> "20/11/2020",      
//         "dueTime" => "12h",
//         "dueDate" => "29/12/2020",
//         "questions" => ["CO2014-2-1", "CO2014-2-2", "CO2014-2-3"],   
    
// ]);
// $quizCollection->insertOne([

//         "quizId" => "CO2014-3",
//         "courseId" => "CO2014",
//         "startTime" => "12h",
//         "startDate"=> "20/11/2020",      
//         "dueTime" => "12h",
//         "dueDate" => "29/12/2020",
//         "questions" => ["CO2014-3-1", "CO2014-3-2", "CO2014-3-3"],   
    
// ]);

// $quizCollection->insertOne([

//         "quizId" => "CO2015-1",
//         "courseId" => "CO2015",
//         "startTime" => "12h",
//         "startDate"=> "20/11/2020",      
//         "dueTime" => "12h",
//         "dueDate" => "29/12/2020",
//         "questions" => ["CO2015-1-1", "CO2015-1-2", "CO2015-1-3"],    
    
// ]);

// $quizCollection->insertOne([

//         "quizId" => "CO2015-2",
//         "courseId" => "CO2015",
//         "startTime" => "12h",
//         "startDate"=> "20/11/2020",      
//         "dueTime" => "12h",
//         "dueDate" => "29/12/2020",
//         "questions" => ["CO2015-2-1", "CO2015-2-2", "CO2015-2-3"],    
    
// ]);
// $quizCollection->insertOne([

//         "quizId" => "CO2015-3",
//         "courseId" => "CO2015",
//         "startTime" => "12h",
//         "startDate"=> "20/11/2020",      
//         "dueTime" => "12h",
//         "dueDate" => "29/12/2020",
//         "questions" => ["CO2015-3-1", "CO2015-3-2", "CO2015-3-3"],    
    
// ]);
//==================================================================


