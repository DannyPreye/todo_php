<?php
    // if there's no data in the cookie, it means the user 
    // has not signed in there, should not be allowed to 
    // access the dashboard page
    session_start();
    !isset($_COOKIE['user']) && header("Location: ./login.php");
    require("./components/head.php");
    include_once("./components/header.php");

    $todos = $_SESSION['todo']
    
?>

<!DOCTYPE html>
<html>
    <?php head("Peter Todo", "Todo web application to help keep track"); ?>
    <head>
        <link rel="stylesheet" href="./css/index.css" />
    </head>
    <body>
        <?php header_component() ?>
        <div class="container mx-auto  flex flex-col items-center mt-8">
            <h1 class="font-bold text-[2rem]">My todos</h1>

            <div class="flex flex-col gap-3 w-[400px]">

                <?php
                                 foreach($todos as $todo){
                        $completed=$todo['completed'];
                    echo "
                            <a href='./todo-details.php?id={$todo['id']}' style='height: 57px; width: 350px' class='w-full lg:w-[350px]
                            items-center text-white h-[65px] flex rounded-md justify-between gap-9 px-4 bg-blue-900 '>
                                <h3>{$todo["title"]} </h3>

                                <p class='flex gap-3'>";
                          echo $completed ? "  <span class=''>Completed  </span>": "
                                <span>not completed </span>
                                </p>
                            </a>
                        ";
                    }
                ?>

            </div>
        </div>
    </body>
</html>