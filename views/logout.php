<?php

if(isset($_COOKIE['user'])){
    setcookie("user", "", time() - 86400, "/");

    header("Location:./");
}