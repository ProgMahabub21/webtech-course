<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
<form action="../back-end/login-form.php" method="POST" onsubmit="validateForm()">  
    <fieldset>
        <legend>Login:</legend>

        <label for="username">username:</label><br>
        <input type="text" id="Username" name="Username" >
       
            </input><br>


       <br> <label for="password">password:</label><br>
        <input type="password" id="password" name="password" >
    
            </input><br>

      </fieldset> 
      <input type="submit" value="Submit">
    </form>     


    <script>
        //validate form in js
        function validateForm() {
            var x = document.getElementById("UserName").value;
            var z = document.getElementById("Password").value;

        if(x == "" || z == ""){
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
            xmlhttp.open("POST", "login-form.php", true);
            xmlhttp.send("x=" + x+ "&z="+z);

        }
      }
  </script>
</body>
</html>