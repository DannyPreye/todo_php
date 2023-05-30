<?php

function hash_password($password){
    return password_hash($password, PASSWORD_DEFAULT);
}

function verify_password($password,$existing_password){
    return password_verify($password,$existing_password);
}

function verify_sanitize($data){
    $data = stripcslashes($data);
    $data = trim($data);
    $data= htmlspecialchars($data);

    return $data;
}


function validate_email($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
