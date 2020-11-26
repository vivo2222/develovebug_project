<?php
    define("DB_HOST", "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASS", "");
    define("DB_NAME", "do_an");
    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);
    if( $conn->connect_error){
        die("Fail to connect database".$conn->connect_error);
    }
    require "functions.php";
?>
