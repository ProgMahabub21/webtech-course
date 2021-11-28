<html>
    <body>
    <?php 
        session_start();
    include 'dbconn.php';
		
			$username = $_POST['x'];
			$password = $_POST['z'];  

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


                //sql query to get data from database
                $sql = "SELECT * FROM user_reg WHERE username = ? AND password = ?";

              

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
                 
                    $_SESSION['username'] = $username;
                    echo "<script>alert('Login Successful. Welcome have a nice Day');</script>";
                    header("Location: ../Front-end/chat.php");
                }
                else {
                    echo "login failed";
                }

			}
		
	?>

    </body>
</html>