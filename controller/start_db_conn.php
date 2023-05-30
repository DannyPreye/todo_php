<?php 
require_once("../model/db_connection.php");


// ::::::::::::: Connect to database ::::::::::

$dbname="test";
$server_name="localhost";
$db_username ="student";
$db_password = "student";



$connection = new Connect_Database($server_name, $dbname, $db_username, $db_password);

// call the create a table
$connection->create_user_table();