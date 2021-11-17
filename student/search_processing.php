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

  <link rel="stylesheet" href="css/maicons.css">

  <link rel="stylesheet" href="css/bootstrap.css">

  <link rel="stylesheet" href="vendor/animate/animate.css">

  <link rel="stylesheet" href="css/theme.css">

</head>
<body>


  <header>
    <?php include_once "components/header.php"?>
  </header>
  
  <div id="search_proc" style="min-height: 76vh;">
    <div class="text-center wow fadeInUp">
        <h1 id="search-title">What You Found Here </h1>
        <div class="divider mx-auto"></div>
      </div>
      <div class="row mt-5">
      <?php
        include '../connect.php';
        include './getStudentInfo.php';

        if (isset($_GET['item'])){
          $item = $_GET['item'];
          
        } else {
          header('Location ./search.php');
        }

        if (!isset($item) or $item == ''){
          header('Location ./search.php');
        }
        
        
        $findCourse = $db->course;

        $findQuiz = $db->quiz;

        $resCourse = $findCourse->find(
          array (
            '$or'=> array (
              array ('name'=>['$regex'=>'(?i)'.$item]),
              array('courseId'=>['$regex'=>'(?i)'.$item]),
            )
          )          
            );
        $resQuiz = $findQuiz->find(
          array (
            '$or'=> array (
              array ('name'=>['$regex'=>'(?i)'.$item]),
              array('quizId'=>['$regex'=>'(?i)'.$item]),
            )
          )    
            );

        // foreach ($resCourse as $row){
        //   echo $row->name;
        // }
        // foreach ($resQuiz as $row){
        //   echo $row->name;
        // }

        if (empty($resQuiz) and empty($resCourse)){
          echo '
          <div class="not-found">
          <div class="text-center wow fadeInUp">
            <p class="subhead">Sorry, we don\'t have that!<p>
          </div>
          <div class="wow fadeInUp">
            <img src="images/no-result.png" id="not-found-img">
          </div>
        </div>
          ';
        } elseif (!empty($resQuiz)){
          
          foreach ($resQuiz as $row){
            echo '
            
            <div class="col-lg-3 py-3 wow fadeInUp">
              <div id="search-card" class="card-blog">
                <div class="header">
                  <div class="post-thumb">
                    <img src="images/quiz-1.jpg" alt="">
                  </div>
                </div>
                <div class="body">
                  <h5 class="post-title">'.$row->name.'</h5>
                  <h6>Course: '.getCourse($row->courseId)->name.' </h6>
                  <h6>Teacher: '.getTeacher($row->teacherId)->name.' </h6>
                  
                  <a href="game.php?'.$row->quizId.'" class="btn btn-secondary">Learn more</a>
                </div>
              </div>
            </div>
          
            ';
          }
        } elseif (!empty($resCourse)){

          foreach($resCourse as $row){
              $getQuiz = $db->quiz;
              $res = $getQuiz->find(['quizId'=>$row->quizId]);
              if(empty($res)){
                echo "Nothing found";
              }
              foreach($res as $value){
                echo '
      
                <div class="col-lg-3 py-3 wow fadeInUp">
                  <div id="search-card" class="card-blog">
                    <div class="header">
                      <div class="post-thumb">
                        <img src="images/quiz-1.jpg" alt="">
                      </div>
                    </div>
                    <div class="body">
                      <h5 class="post-title">'.$value->name.'</h5>
                      <h6>Course: '.$row->name.' </h6>
                      <h6>Teacher: '.getTeacher($row->teacherId)->name.' </h6>
                      
                      <a href="game.php?'.$row->quizId.'" class="btn btn-secondary">Learn more</a>
                    </div>
                  </div>
                </div>
              
                ';
              }
          }
        }
      ?>
      </div>
      <!--If no result, show class "not-found"-->  
      <!-- <div class="not-found">
        <div class="text-center wow fadeInUp">
          <p class="subhead">Sorry, we don't have that!<p>
        </div>
        <div class="wow fadeInUp">
          <img src="images/no-result.png" id="not-found-img">
        </div>
      </div> -->

      <!--Show results like this class-->  
      <!-- <div class="row mt-5">
        <div class="col-lg-12 py-3 wow fadeInUp">
          <div id="search-card" class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="images/quiz-1.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="#">NAME</a></h5>
              <h6>Info 1: </h6>
              <h6>Info 2: </h6>
              <h6>Info 3: </h6>
              <a href="#" class="btn btn-secondary">Learn more</a>
            </div>
          </div>
        </div>
      </div> -->

      <div class="col-12 mt-4 text-center wow fadeInUp">
          <a href="search.php" id="find-another" class="btn btn-primary">Find another?</a>
      </div>
      <div class="col-12 mt-4 text-center wow fadeInUp">
          <a href="index.php" id="back-search" class="btn btn-secondary">Back to home</a>
      </div>
  </div>
      


  <?php include_once "components/footer.php"?>

<script src="js/jquery-3.5.1.min.js"></script>

<script src="js/bootstrap.bundle.min.js"></script>

<script src="js/google-maps.js"></script>

<script src="vendor/wow/wow.min.js"></script>

<script src="js/theme.js"></script>
  
</body>
</html>