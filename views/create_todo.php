<?php

    /* 
        This route is meant to handle the login view. Here the user will
        be asked to enter there email address or username 

    */
    !isset($_COOKIE['user']) && header("Location: ./login.php");
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

           <div class="main container mx-auto flex flex-col items-center justify-center pb-8">
            <h1 class="mt-6 font-bold text-[2rem]">Create todo</h1>
            <form action="../controller/create_todo.php" method="post"
             class="bg-gray-400 flex flex-col w-[80%] rounded-md
              lg:w-[50%] px-5 py-[2rem] mt-12 gap-[2rem]">
   
                <input class="h-[56px] rounded-[12px] focus:outline-none px-4 placeholder:text-[1.2rem] " type="text" name="title" placeholder="Title" id="">
               
                <textarea 
                class=" h-[350px] rounded-[12px] focus:outline-none p-4 placeholder:text-[1.2rem] " 
                 name="content" placeholder="Content" row="10"></textarea>
               
                <button class="font-bold text-gray-300 bg-blue-900 h-[56px] rounded-md"  type="submit"> Submit</button>
               
                
            </form>

        </div>
    </body>