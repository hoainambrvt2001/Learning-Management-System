<?php
    include '../vendor/autoload.php';


    $connect = new MongoDB\Client(
        'mongodb+srv://hoainambrvt2001:tMIxYDVcInK2mCkN@nhattan.7vquo.mongodb.net/myFirstDatabase?retryWrites=true&w=majority'
    );
    
    $db = $connect->mydb;

    if (isset($_POST['TeacherButton'])){
        
        $post = $db->teacher;

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $res = $post->findOne(['username' => $username, 'password' => $password]);

        if (!empty($res)){
            $_SESSION['username'] = $username;
            header('Location: ../teacher/');
        } else {
        echo 'Invalid username or password';
        }
    }

    if (isset($_POST['StudentButton'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $post = $db->student;

        $res = $post->findOne(['username' => $username, 'password' => $password]);

        if (!empty($res)){
            $_SESSION['username'] = $username;
            header('Location: ../student/');
        } else {
        echo 'Invalid username or password';
        }
    }

?>