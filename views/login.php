<?php

/* 
    This route is meant to handle the login view. Here the user will
    be asked to enter there email address or username 

*/
isset($_COOKIE['user']) && header("Location: ./dashboard.php");
require_once("./components/head.php");
require_once("./components/header.php");
?>

<!DOCTYPE html>
<html>
    <?php head("Peter Todo", "Todo web application to help keep track"); ?>
    <head>
        <link rel="stylesheet" href="./css/index.css" />

        
    </head>
   
    <body>
        <?php header_component() ?>
        <div class="main container mx-auto flex flex-col items-center justify-center">
            <h1 class="mt-6 font-bold text-[2rem]">Login</h1>
            <form action="../controller/login.php" method="post"
             class="bg-gray-400 flex flex-col w-[80%] rounded-md
              lg:w-[50%] px-5 py-[2rem] mt-12 gap-[2rem]">
   
                <input class="h-[56px] rounded-[12px] focus:outline-none px-4 placeholder:text-[1.2rem] " type="email" name="email" placeholder="Email" id="">
                <input class="h-[56px] rounded-[12px] focus:outline-none px-4 placeholder:text-[1.2rem] " type="password" name="password" placeholder="Password" id="">

                <button class="font-bold text-gray-300 bg-blue-900 h-[56px] rounded-md" type="submit"> Submit</button>
                <div class="flex w-full justify-center">
                    <span class="w-fit text-gray-800">Not Registered? <a href="./register.php" class="font-bold">Register</a></span>
                </div>
            </form>

        </div>
    </body>
</html>