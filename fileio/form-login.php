<html>
    <body>
    <?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST"){	
			$username = $_POST['Username'];
			$password = $_POST['password'];  
		}
		$is_validate = true;	

		function validate()
		{
			if (empty($fname))
				$is_validate = false;
			if (empty($lname))
				$is_validate = false;
			if(empty($gender))
				$is_validate = false;
			if(empty($dob))
				$is_validate = false;
			if(empty($religion))
				$is_validate = false;
			if(empty($email))
				$is_validate = false;
			if(empty($username))
				$is_validate = false;
			if(empty($password))
				$is_validate = false;	
			
		}
		validate();
		if (!$is_validate) {
			if(empty($username))
				echo "username field must be filled";
			if(empty($password))
				echo "password field must be filled";		
			
		}	
		else {
				echo "successfully loggeding";


                $string = file_get_contents("data.json");
                $json_a = json_decode($string, true);

              
      
                if (json_a[username] == $username && json_a[password] == $password) {
                   echo "Login Successful";
                  
                }else{
                    echo "Login Failed";
                
                }
			}
		
	?>

    </body>
</html>