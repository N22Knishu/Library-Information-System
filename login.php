<?php
  	include('./connection.php');
    print_r($_POST);
    function checkUser($email, $password, $table){
        global $conn;
        $login_query =  "SELECT * FROM  `$table` WHERE `email` = '$email' AND `password` = '$password'";
        $result = $conn->query($login_query) or die($conn->error);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            if($table == 'admin'){
                $_SESSION['userrole'] = 'admin';
                header('location: ./admin.php');
            }
            else{
                $_SESSION['userrole'] = $row['role'];
                header('location: ./userhome.php');
            }
        } else{
            header('location: ./index.php?error=1');
        }
    }
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $table= 'users';
    #check checkbox cheked
    if(isset($_POST['isAdmin']) ){
        $table = 'admin';
    }
    checkUser($email, $password, $table);
?>