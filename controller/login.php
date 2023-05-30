<?php

require_once("./start_db_conn.php");

$error_arr = [];

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $password = "";
    $user_password = verify_sanitize($_POST['password']);
    $user_email = verify_sanitize($_POST['email']);

    echo $user_email;
     if($user_email !=="" && validate_email($user_email)){
        $email = $user_email;
    }else{
        array_push($error_arr,"Email must not be empty and but be valid" );
    }

    if($user_password!==""  ){
        $password = $user_password;
    }else{
        array_push($error_arr,"Password must not be empty and must be atleast 8 characters" );
    }

     if(count($error_arr) > 0){
        foreach( $error_arr as $error){
            echo "<br> $error <br>";
        }
    }else{
        echo "gooddy bag";
         $get_user = $connection->login_user($email, $password);
          if($get_user){
                // echo "helllo friend";
                $encode = json_encode($get_user);
                setcookie("user", $encode, time() + (86400 + 2), "/");
                header("Location: ../views/dashboard.php");
          }else{
            echo "Username or password is incorrect";
          }
    }
}

