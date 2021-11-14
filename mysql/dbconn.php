<?php

    //db connection
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "admin2020";
    $dbname = "test";

    //create connection
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    //check connection
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }


?>