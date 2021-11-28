<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="../Front-end/css/chat.css">
</head>

<body>
  <div class="signup-form">
    <div class="form-header">
      <h2>Basic Information</h2>
    </div>
    <div class="form-body">
      <div class="form-group">
        <label for="fName" class="label-title">Username:</label>
        <input type="text" name="Username" id="UserName"><br>
      </div>
      <div class="form-group">
        <label for="lName" class="label-title">Email:</label>
        <input type="email" name="email" id="Email"><br>
      </div>
      <div class="form-group">
        <label for="password" class="label-title">Password:</label>
        <input type="password" name="password" id="Password"><br>
      </div>

      <div class="form-group">
        <button type="submit" class="btn" onclick="validateForm()">Confirm</button>

      </div>

    </div>
  </div>


  <script>
        //validate form in js
        function validateForm() {
            var x = document.getElementById("UserName").value;
            var y = document.getElementById("Email").value;
            var z = document.getElementById("Password").value;

        if(x == "" || y == "" || z == ""){
            alert("Please fill in all fields");
            return false;
        }
        else{
            alert("You have successfully registered");
            //ajax call to send data to php
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                console.log(this.responseText);
                if (this.readyState == 4 && this.status == 200) {
                    // document.getElementById("txtHint").innerHTML = 
                    
                }
            };
            xmlhttp.open("POST", "reg-validate.php", true);
            xmlhttp.send("x=" + x+"&y="+y+"&z="+z);

        }
      }
  </script>

</body>

</html>