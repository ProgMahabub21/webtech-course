<?php
    session_start();

    include "dbconn.php";

    $msg = $_REQUEST["q"];

    echo "<script>alert('Message sent successfully')</script>";

    //sql to insert a new record with bind parameters
    $sql = "INSERT INTO chathistory (username, message) VALUES (?, ?)";

    //prepare the statement
    $stmt = $conn->prepare($sql);

    //bind parameters
    $stmt->bind_param("ss", $_SESSION["username"], $msg);

    //execute query
    $stmt->execute();



    //check if the query was successful
    if ($stmt->affected_rows > 0) {
        
    } else {
        echo "<script>alert('Message sent failed')</script>";
    }

    //close statement
    $stmt->close();

    //close connection
    $conn->close();

    //redirect to chat page
    header("Location: ../Front-end/chat.php");


?>