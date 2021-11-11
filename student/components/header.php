<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Student Modules</title>

  <link rel="stylesheet" href="../css/maicons.css">

  <link rel="stylesheet" href="../css/bootstrap.css">

  <link rel="stylesheet" href="../vendor/animate/animate.css">

  <link rel="stylesheet" href="../css/theme.css">

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
      <div class="container">
        <img src="./components/logo/quiz_4.png" alt="">

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item search-btn" >
              <a class="nav-link" href="search.php"><span class="mai-search"></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../student/">Home</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="quiz.php">Quiz Time</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="module.php">Your Modules</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewscore.php">View Score</a>
            </li>

            <li class="nav-item user-logout">
            <a href = "logout.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M10 2v2h12v16h-12v2h14v-20h-14zm0 7.408l2.963 2.592-2.963 2.592v-1.592h-8v-2h8v-1.592zm-2-4.408v4h-8v6h8v4l8-7-8-7z"/>
              </svg>
              </a>
              <span>Hello, <?php echo $_SESSION['username']?></span>
            </li>
            
          </ul>
        </div>

      </div>
    </nav>


<script src="../js/jquery-3.5.1.min.js"></script>

<script src="../js/bootstrap.bundle.min.js"></script>

<script src="../js/google-maps.js"></script>

<script src="../vendor/wow/wow.min.js"></script>

<script src="../js/theme.js"></script>
  
</body>
</html>