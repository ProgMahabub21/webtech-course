<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webtech Chat</title>
    <style>
        body {
            margin: 0 auto;
            max-width: 800px;
            padding: 0 20px;
        }

        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        .container img.right {
            float: right;
            margin-left: 20px;
            margin-right: 0;
        }

        .time-right {
            float: right;
            color: #aaa;
        }

        .time-left {
            float: left;
            color: #999;
        }
    </style>
    <link rel="stylesheet" href="css/chat.css">
</head>

<body>
    <div class="signup-form" style="height:100%">
     <?php include '../back-end/chatlist.php'; ?>
        <div class="form-header">
        
            <h2>ChatBox</h2>
        </div>
        <div class="form-body">
            <div class="container darker">
                <img src="image/superman.jpg" alt="Avatar" class="right" style="width:100%;">
                <p><?php  
                
                    foreach($chatlist as $row){
                        echo $row['UserName'];
                        echo $row['message'];
                        echo "<br>";
                    }
                
                ?></p>
                <span class="time-left">11:05</span>
            </div>
        </div>
        <div class="form-footer">
                <input type="text" name="message" id="message" class="form-input" placeholder="Type your message here...">
                <button type="submit" class="btn" onclick="validateMsg()">Send</button>
                <span id="result"></span>
        </div>
    </div>

    <script>
        function validateMsg() {
            var msg = document.getElementById("message").value;
            if (msg == "") {
                alert("Please enter a message");
                return false;
            } else {

                // AJAX call to send message
                var xhttp = new XMLHttpRequest();
                
                xhttp.onload = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // document.getElementById("message").value = "";
                        // document.getElementById("result").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "chatdb.php?q=" + msg, true);
                xhttp.send();

                return true;
            }
        }
    </script>


</body>

</html>
