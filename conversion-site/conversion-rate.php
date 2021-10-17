<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversion Rate</title>
</head>
<body>
    <p><h1>Page 2 [Conversion Rate]</h1></p>
    <p><h3>Conversion SIte</h3></p>
    <p>1. <a href="home.php">Home</a> 2. <a href="conversion-rate.php">Conversion Rate</a> 3. <a href="history.php">History</a></p><br>
    <p><h2>Converter:</h2></p><br>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="category">Category:</label>
        <input type="text" name="category" id="category">
        <label for="unit">Unit:</label>
        <input type="number" name="unit" id="unit" step="any">
        <label for="rate">Rate:</label>
        <input type="number" name="rate" id="rate" step="any">
        
        <input type="submit" value="submit"><br><br><br>
    </form>
    <?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			
			$category = $_POST['category'];
			$unit = $_POST['unit'];
            $rate = $_POST['rate']; 

            echo "category added successfully";
			$array =array('Category'=>sanitize($category),'unit'=>sanitize($unit),'rate'=>sanitize($rate));

            $fm = fopen('data.json', 'a+');
            fwrite($fm, json_encode($array, JSON_PRETTY_PRINT));  
            fclose($fm);
		}

		function sanitize($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
        


        $existingData = json_decode(file_get_contents("data.json",true));
                echo "<table border='1'>";
            foreach ($existingData as $key => $value) {
                
                echo "<tr><td>" . $value->Category. "</td><td>". $value->unit ."</td><td>".$value->rate ."</td></tr>";
                
            }
            echo "</table>";

	?>
</body>
</html>






