<?php
    require_once("./start_db_conn.php");
    $error_arr = [];

    if($_SERVER['REQUEST_METHOD'] =='POST'){
        $title = verify_sanitize($_POST['title']);
        $content = verify_sanitize($_POST['content']);

        // get the userId from the cookie
        $decode_user = json_decode($_COOKIE['user'], true);
        $userId = $decode_user['id'];

        if($title ==""){
          array_push($error_arr, "Title must not be empty");

        }
        if($content == ""){
          array_push($error_arr, "content must not be empty");

        }

        if(count($error_arr) > 0 ){
            foreach($error_arr as $error){
                  echo "<br> $error <br>";
            }
        }else{
            $result = $connection->add_todo($userId, $title,$content);
            if($result){
                echo "Todo has been added succesfully";
            }
        }


    }