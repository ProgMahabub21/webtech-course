<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
</head>
<body>
    <p><h1>Page 3 [History]</h1></p>
    <p><h3>Conversion SIte</h3></p>
    <p>1. <a href="home.php">Home</a> 2. <a href="conversion-rate.php">Conversion Rate</a> 3. <a href="history.php">History</a></p><br>
   

    <?php
    $existingData = json_decode(file_get_contents("history.json",true));
            echo "<table border='1'>";
            foreach ($existingData as $key => $value) {
                
                echo "<tr><td>" . $value->Unit. "</td><td>". $value->input ."</td><td>".$value->output ."</td></tr>";
                
            }
            echo "</table>";
    ?>
</body>
</html>