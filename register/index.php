<?php
session_start();
if (!isset($_SESSION['username']) or $_SESSION['username'] == NULL) {
    //header('Location: ./login/index.php');
} else {
    if (isset($_SESSION['isStudent']) && $_SESSION['isStudent'] == true) {
        header('Location: ../student/');
    }
    if (isset($_SESSION['isTeacher']) && $_SESSION['isTeacher'] == true) {
        header('Location: ../teacher/');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZ MAKER - Register </title>
    <meta name="keywords" content="quiz, quizz, quizzes, quiz.com, www.quiz.com, quiz.com website, online quiz, join quiz, do quiz
                                 quiz register">
    <link rel="stylesheet" href="./login.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

    <!-- Register form -->
    <form class="RegisterWrapper" action="index.php" method="POST">

        <a href="../login/">
            <i class="fa fa-arrow-left icon-back">
            </i>
        </a>

        <div class="RegisterForm">
            <p class="register-logo">REGISTER</p>
            <div class="InputWrapper">
                <i class='fas fa-user-alt icon'></i>
                <input name="fullname" placeholder="Full name" type="text" class="input" autocomplete="off" required />
            </div>
            <div class="InputWrapper">
                <i class='fas fa-user-alt icon'></i>
                <input name="username" placeholder="Username" type="email" class="input" autocomplete="off" required />
            </div>
            <div class="InputWrapper">
                <i class='fas fa-key icon'></i>
                <input name="password" id="password" placeholder="Password" type="password" class="input" required />
            </div>
            <div class="InputWrapper">
                <i class='fas fa-key icon'></i>
                <input placeholder="Confirm Password" type="password" class="input" register oninput="inputHandler(this)" />
            </div>
            <p id="error" style="color: red"></p>
            <script type="text/javascript">
                function inputHandler(text) {
                    if (text.value != document.getElementById('password').value) {
                        document.getElementById('error').innerHTML = "Password does not match";
                        document.getElementById('mybtn').disabled = true;
                    } else {
                        document.getElementById('error').innerHTML = "";
                        document.getElementById('mybtn').disabled = false;
                    }
                }
            </script>


            <span class="custom-dropdown">
                <select name="role">
                    <option>Student</option>
                    <option>Teacher</option>
                </select>
            </span>
            <?php
            include '../connect.php';

            $db = $connect->data;

            if (isset($_POST['register'])) {
                $role = $_POST['role'];
                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $id = rand(1000000000, 10000000000);

                function test_input($data)
                {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                function validatePassword($password)
                {
                    if (empty($password)) {
                        echo '<p class="wrong">Password is required</p>';
                        return false;
                    }
                    $password = test_input($password);
                    if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $password)) {
                        echo '<p class="wrong">Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters!</p>';
                        return false;
                    }
                    return true;
                }

                function validateUsername($username)
                {
                    if (empty($username)) {
                        echo '<p class="wrong">Username is required</p>';
                        return false;
                    }
                    $username = test_input($username);
                    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
                        echo '<p class="wrong">Invalid email format</p>';
                        return false;
                    }
                    return true;
                }

                if (validatePassword($password) && validateUsername($username)) {
                    if ($role == 'Teacher') {
                        $post = $db->teacher;
                        $res = $post->findOne(['username' => $username]);
                        if (empty($res)) {
                            $insert = $post->insertOne([
                                "teacherId" => 'TC-' . (string)$id,
                                'name' => $fullname,
                                'username' => $username,
                                'password' => md5($password),
                                'gender' => '',
                                'birthday' => '',
                                'phone' => '',
                                'courseIds' => [],
                            ]);
                            echo "<p class='correct'>Register successfully</p>";
                        } else {
                            echo "<p class='wrong'>Username already exists</p>";
                        }
                    } else {
                        $post = $db->student;
                        $res = $post->findOne(['username' => $username]);

                        if (empty($res)) {
                            $insert = $post->insertOne([
                                "studentId" => 'STU-' . (string)$id,
                                'name' => $fullname,
                                'username' => $username,
                                'password' => $password,
                                'gender' => '',
                                'birthday' => '',
                                'phone' => '',
                            ]);
                            echo "<p class='correct'>Register successfully</p>";
                        } else {
                            echo "<p class='wrong'>Username already exists</p>";
                        }
                    }
                }
            }

                // if ($role == 'Teacher') {
                //     $post = $db->teacher;
                //     $res = $post->findOne(['username' => $username]);
                //     if (empty($res)) {
                //         $insert = $post->insertOne([
                //             "teacherId" => 'TC-' . (string)$id,
                //             'name' => $fullname,
                //             'username' => $username,
                //             'password' => $password,
                //             'gender' => '',
                //             'birthday' => '',
                //             'phone' => '',
                //             'courseIds' => [],
                //         ]);
                //         echo "<p class='correct'>Register successfully</p>";
                //     } else {
                //         echo "<p class='wrong'>Username already exists</p>";
                //     }
                // } else {
                //     $post = $db->student;
                //     $res = $post->findOne(['username' => $username]);

                //     if (empty($res)) {
                //         $insert = $post->insertOne([
                //             "studentId" => 'STU-' . (string)$id,
                //             'name' => $fullname,
                //             'username' => $username,
                //             'password' => $password,
                //             'gender' => '',
                //             'birthday' => '',
                //             'phone' => '',
                //         ]);
                //         echo "<p class='correct'>Register successfully</p>";
                //     } else {
                //         echo "<p class='wrong'>Username already exists</p>";
                //     }
                // }

            ?>
            <button type="submit" id="mybtn" class="RegisterButton" disabled name="register">Register</button>
        </div>
    </form>
    <script src="./register.js"></script>
</body>

</html>