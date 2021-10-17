<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <p><h1>Page 1 [Home]</h1></p>
    <p><h3>Conversion SIte</h3></p>
    <p>1. <a href="home.php">Home</a> 2. <a href="conversion-rate.php">Conversion Rate</a> 3. <a href="history.php">History</a></p>
    <p><h2>Converter:</h2></p><br>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="category">Select category:</label>
        <select name="category" id="category">
        <?php
        $existingData = json_decode(file_get_contents("data.json",true));
            foreach ($existingData as $key => $value) {
                echo "<option value='.$value->Category.'>".$value->Category."</option>";
            }
        ?>
        </select><br><br>
        <label for="input">Value:</label>
        <input type="number" name="input" id="input" step="any">
        
        <input type="submit" value="submit"><br><br><br>
    </form>


    <?php
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
			
			$input = $_POST['input'];
			$category = $_POST['category'];

            $existingData = json_decode(file_get_contents("data.json",true));
            foreach ($existingData as $key => $value) {
                if($category == ".".$value->Category.".")
                {
                    $rate = $value->rate;
                    break;
                }
            }
            $sum =(int)$input * (int)$rate;
            echo "Result:<input type='text' value='$sum'/>";


            $array =array('Unit'=>($category),'input'=>($input),'output'=>($sum));

            $fm = fopen('history.json', 'a+');
            fwrite($fm, json_encode($array, JSON_PRETTY_PRINT));  
            fclose($fm);

		}

    ?>

    
</body>
</html>


