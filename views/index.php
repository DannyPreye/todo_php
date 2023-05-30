<!DOCTYPE html>
<!-- <?php
require("./components/head.php");
include_once("./components/header.php");
$check_login = isset($_COOKIE['user']);
?> -->
<!DOCTYPE html>
<html>
    <?php head("Peter Todo", "Todo web application to help keep track"); ?>
    <head>
        <link rel="stylesheet" href="./css/index.css" />
    </head>
    <body>
        <?php header_component() ?>
        <div class="container mx-auto mt-8 flex flex-wrap lg:flex-nowrap items-center  ">
            
            <div class="flex flex-col gap-3 justify-start text-gray-700">
                <h1 class="font-bold text-[2rem]">Modern Todo APP</h1>
                <p class="text-[18px]">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, provident aspernatur ratione, eos eveniet, molestiae fuga itaque minima aliquam dignissimos tempora. Minus voluptatum nisi necessitatibus maxime possimus distinctio modi sunt?
                    lore
                </p>

              <?php

               echo   !$check_login ? "  <a href='./login.php' class='bg-blue-900 px-4 grid place-items-center font-bold text-[1.1rem] h-[46px] w-[150px] text-white rounded-md'>Get Started</a> " :"";

              ?>
            </div>
            <img src="../assets/todo.png" alt="" class="lg:w-[50%]">
        </div>

        <div class="container mx-auto bg-blue-800"></div>
    </body>
</html>
