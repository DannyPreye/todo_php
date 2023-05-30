<?php
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
            <h1 class="mt-6 font-bold text-[2rem]">Register</h1>
            <form action="../controller/register.php" method="post"
             class="bg-gray-400 flex flex-col w-[80%] rounded-md
              lg:w-[50%] px-5 py-[2rem] mt-12 gap-[2rem]">
                <input class="h-[56px] rounded-[12px] focus:outline-none px-4 placeholder:text-[1.2rem] " type="text" name="username" placeholder="Username" id="">
                <input class="h-[56px] rounded-[12px] focus:outline-none px-4 placeholder:text-[1.2rem] " type="email" name="email" placeholder="Email" id="">
                <input class="h-[56px] rounded-[12px] focus:outline-none px-4 placeholder:text-[1.2rem] " type="password" name="password" placeholder="Password" id="">

                <button class="font-bold text-gray-300 bg-blue-900 h-[56px] rounded-md" type="submit"> Submit</button>
                <div class="flex w-full justify-center">
                    <span class="w-fit text-gray-800">Already Registered? <a href="./login.php" class="font-bold">Login</a></span>
                </div>
            </form>

        </div>
    </body>
</html>