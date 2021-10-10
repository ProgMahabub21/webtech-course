<html>
    <body>
    <?php 
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
				echo "Form is successfully submitted";
				$array = array('First Name' => $fname,'Last Name' => $lname,'Gender' => $gender,'DOB'=>$dob, 'religion'=>$religion,'preaddress'=>$preaddress,'peraddress'=>$peraddress,'phone'=>$phone,'website'=>$website,'username'=>$username,'password'=>$password);
				
				$fp = fopen('data.json', 'w');
				fwrite($fp, json_encode($array, JSON_PRETTY_PRINT));  
				fclose($fp);

			}
		
	?>

    </body>
</html>