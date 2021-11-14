<html>
    <body>
    <?php 
        require 'dbconn.php';

		if ($_SERVER['REQUEST_METHOD'] === "POST"){	
			$fname = $_POST['fName'];
			$lname = $_POST['lName'];
			$gender = $_POST['gender']??" ";
			$dob = $_POST['dob'];
			$religion = $_POST['religion'];
			$preaddress = $_POST['Presentaddress'];
			$peraddress = $_POST['Permaaddress'];
			$phone =  $_POST['phone'];
			$email = $_POST['mail'];
			$website =  $_POST['weblink'];
			$username = $_POST['Username'];
			$password = $_POST['password'];  
		}
		$is_validate = true;	
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
			
		if (!$is_validate) {
			if (empty($fname))
				echo "First Name field must be filled";
			if (empty($lname))
				echo "Last Name field must be filled";
			if(empty($gender))
				echo "Gender field must be filled";
			if(empty($dob))
				echo "Date of birth field must be filled";
			if(empty($religion))
				echo "religion field must be filled";
			if(empty($email))
				echo "email field must be filled";
			if(empty($username))
				echo "username field must be filled";
			if(empty($password))
				echo "password field must be filled";		
			
		}	
		else {
				
                //sql query to insert data into database with prepare statement 
                $sql1 = "INSERT INTO user_reg values(?,?,?,?,?,?,?,?,?,?,?,?)";

                //echo var_dump($sql1);
                //prepare statement
                $stmt = $conn->prepare($sql1);
               // echo var_dump($stmt);

                //bind parameters
                $stmt->bind_param("ssssssssssss", $fname, $lname, $gender, $dob, $religion, $preaddress, $peraddress, $phone, $email,
                $website,$username,$password);

                //execute statement
                if ($stmt->execute()) {
                    echo "registration done successfully";
                    //redirect to login page
                    header("refresh:2;url=login.html");
                }
                else {
                    echo "registration failed";
                }
			
			}
		
	?>

    </body>
</html>