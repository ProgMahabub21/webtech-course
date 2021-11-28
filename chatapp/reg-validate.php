<html>
    <body>
    <?php 
        require '../back-end/dbconn.php';

        //receive value from ajax
        $username = $_POST['x'];
        $email = $_POST['y'];
        $password = $_POST['z'];




		// if ($_SERVER['REQUEST_METHOD'] === "POST"){	
        //     $username = $_POST['Username'];
        //     $password = $_POST['password'];  
        //     $email = $_POST['email'];

		// }
		$is_validate = true;	
		if (empty($username)){
                echo "Username is required";
                $is_validate = false;
        }
        if (empty($password)){
                echo "Password is required";
                $is_validate = false;
        }
        if (empty($email)){
                echo "Email is required";
                $is_validate = false;
        }
				
		else {
				
                //sql query to insert data into database with prepare statement 
                $sql1 = "INSERT INTO user_reg values(?,?,?)";

                //echo var_dump($sql1);
                //prepare statement
                $stmt = $conn->prepare($sql1);
               // echo var_dump($stmt);

                //bind parameters
                $stmt->bind_param("sss",$username, $password, $email);

                //execute statement
                if ($stmt->execute()) {
                    echo "<script>alert('New record created successfully')</script>";
                    //redirect to login page
                    header("refresh:2;url=login.php ");
                }
                else {
                    echo "registration failed";
                }
			
			}
		
	?>

    </body>
</html>