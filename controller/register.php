<?php
require_once("./start_db_conn.php");

$error_arr = [];

if($_SERVER['REQUEST_METHOD']=="POST"){
    $un_sanitized_username = verify_sanitize($_POST['username']);
    $un_sanitized_password = verify_sanitize($_POST['password']);
    $un_sanitized_email = verify_sanitize($_POST['email']);

    $email = $password = $username;

    if( $un_sanitized_username !==""){
        $username=$un_sanitized_username;
    }else{
        array_push($error_arr,"Username must not be empty" );
    }

    if($un_sanitized_email !=="" && validate_email($un_sanitized_email)){
        $email = $un_sanitized_email;
    }else{
        array_push($error_arr,"Email must not be empty and but be valid" );
    }

    if($un_sanitized_password!=="" && strlen($un_sanitized_password)>=8 ){
        $password = $un_sanitized_password;
    }else{
        array_push($error_arr,"Password must not be empty and must be atleast 8 characters" );

    }

    if(count($error_arr) > 0){
        foreach($error as $error_arr){
            echo "<br> $error <br>";
        }
    }else{
        $result = $connection->register_user($email, $password, $username);
        if($result){

        $get_user = $connection->login_user($email, $password);
          if($get_user){
                // echo "helllo friend";
                $encode = json_encode($get_user);
                setcookie("user", $encode, time() + (86400 + 2), "/");
                header("Location: ../views/dashboard.php");
          }
           
        }
    }
}