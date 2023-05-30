<?php

session_start();
include_once("./start_db_conn.php");
    
    // get user id from the cookie
    $decode_cookie = json_decode($_COOKIE['user'], true);
    $user_id = $decode_cookie['id'];

    // fetch the cookie and store in the session
   $result= $connection->get_all_todo($user_id);

    echo var_dump($result);
    $_SESSION['todos'] = $result;
?>