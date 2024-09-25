<?php

    // if(!isset($_SERVER['HTTP_REFERER'])){
    //     // REDIRECT THEM TO YOUR DESIRED LOCATION
    //     header("Location: http://localhost/FoodOrder/index.php");
    //     exit;
    // }
    try{
        // host
        define("HOST","localhost");
        // database
        define("DBNAME","foodorder");
        // username
        define("USER","root");
        // password
        define("PASSWORD","");

        $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";",USER, PASSWORD);
        
    } catch (Exception  $e) {

        echo $e;
    }