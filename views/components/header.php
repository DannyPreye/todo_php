<?php

include("./head.component.php");
function header_component()

{
    $user_info = isset($_COOKIE["user"] )? $_COOKIE["user"] : null;
    $decode_user = json_decode($user_info, true);
    $username = $decode_user['username'];
    $dirname = "http://".$_SERVER["HTTP_HOST"]."/tuttorial";
    
   
    echo "
      
        <header class='bg-blue-900 '>
            <div class='container mx-auto items-center text-gray-200 px-5 flex h-11 justify-between'>
                    <span class='font-bold text-2xl '> Logo</span>
                    <ul class='font-semibold flex gap-4 h-full'>
                        <a class='group h-full flex items-center relative' href='$dirname/views'>
                            <span>Home </span>
                            <span class='absolute bottom-[2px] w-full h-[2px] rounded-lg bg-white hidden group-focus:block'> </span>
                        </a>
        ";
    echo !$user_info ?   " <a class='group h-full flex items-center relative' href='$dirname/views/register.php'>
                            <span>Register </span>
                            <span class='absolute bottom-[2px] w-full h-[2px] rounded-lg bg-white hidden group-focus:block'> </span>
                            </a>
                          <a class='group h-full flex items-center relative' href='$dirname/views/login.php'>
                            <span>Login </span>
                            <span class='absolute bottom-[2px] w-full h-[2px] rounded-lg bg-white hidden group-focus:block'> </span>
                        </a>"
    :"              
                        <a class='group  h-full flex items-center relative' href='$dirname/views/dashboard.php'>
                            <span> $username</span>
                            <span class='absolute bottom-[2px] w-full h-[2px] rounded-lg bg-white hidden group-focus:block'> </span>
                        </a>
                        <a class='group  h-full flex items-center relative' href='$dirname/views/create_todo.php'>
                            <span> Create Todo</span>
                            <span class='absolute bottom-[2px] w-full h-[2px] rounded-lg bg-white hidden group-focus:block'> </span>
                        </a>
                        <a class='group h-full flex items-center relative' href='$dirname/views/logout.php'>
                            <span>Logout </span>
                            <span class='absolute bottom-[2px] w-full h-[2px] rounded-lg bg-white hidden group-focus:block'> </span>
                        </a>
            
    ";

    echo "        </ul>
            </div>
        </header>";
}