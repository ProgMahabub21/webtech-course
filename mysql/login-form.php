<html>
    <body>
    <?php 
    include 'dbconn.php';
		if ($_SERVER['REQUEST_METHOD'] === "POST"){	
			$username = $_POST['Username'];
			$password = $_POST['password'];  
		}
		$is_validate = true;	

        if (empty($username)){
            $is_validate = false;
        }
        if (empty($password)){
            $is_validate = false;
        }
		if (!$is_validate) {
			if(empty($username))
				echo "username field must be filled";
			if(empty($password))
				echo "password field must be filled";		
			
		}	
		else {
				echo "successfully loggeding\n";


                //sql query to get data from database
                $sql = "SELECT * FROM user_reg WHERE Username = ? AND Password = ?";

                //prepare statement
                $stmt = $conn->prepare($sql);

                //bind parameters
                $stmt->bind_param("ss", $username, $password);

                //execute query
                $stmt->execute();

                //check if there is any data
                $result = $stmt->get_result();

                //if there is data
                if ($result->num_rows > 0) {
                 

                    echo "<script>alert('Login Successful. Welcome have a nice Day');</script>";
                }
                else {
                    echo "login failed";
                }

			}
		
	?>

    </body>
</html>