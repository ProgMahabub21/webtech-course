<?php

    include "dbconn.php";

    $sql = "SELECT * FROM chathistory ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //save in array
            $chatlist[] = $row;

            json_encode($chatlist);

        }
    } else {
        echo "0 results";
    }

?>