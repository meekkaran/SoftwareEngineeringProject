<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        
        form {
            border: 3px solid #f1f1f1;
        }
        
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        
        button {
            background-color: skyblue;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        
        button:hover {
            opacity: 0.8;
        }
        
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }
        
        .imgcontainer {
            text-align: center;
            margin: 20px 0 10px 0;
        }
        
        img.avatar {
            width: 20%;
            border-radius: 50%;
        }
        
        .container {
            padding: 16px;
        }
        
        span.psw {
            float: right;
            padding-top: 16px;
        }
        
        #message {
            display: none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 20px;
            margin-top: 10px;
        }
        
        #message p {
            padding: 10px 35px;
            font-size: 18px;
        }
        /* Add a green text color and a checkmark when the requirements are right */
        
        .valid {
            color: green;
        }
        
        .valid:before {
            position: relative;
            left: -35px;
            content: "✔";
        }
        /* Add a red text color and an "x" when the requirements are wrong */
        
        .invalid {
            color: red;
        }
        
        .invalid:before {
            position: relative;
            left: -35px;
            content: "✖";
        }
        /* Change styles for span and cancel button on extra small screens */
        
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <h2>Login Form</h2>

    <form action="/action_page.php" method="post">
        <div class="imgcontainer">
            <img src="raven.svg" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="location"><b>Your address</b></label>
            <input type="text" placeholder="Enter address" name="address" required>
            <label for="phone"><b>Mobile-no</b></label>
            <input type="text" placeholder="Enter phone no" name="no" required>
            <label for="Username"><b>Username</b></label>
            <input type="text" placeholder="Enter your Username" name="uname" required>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <div id="message">
                <h3>Password must contain the following:</h3>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
            <button type="submit">Login</button>
            <label>

      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="reset.html">password?</a></span>
        </div>
        <div class="container" style="background-color:#f1f1f1">
            <span class="account">Don't have an account? <a href="sign.html">SignUp</a></span>
        </div>
    



        <!---------PHP CODES------->
        <?php
    //INITIALIZING lOGIN FORM
      $userName=" ";
      $userEmail=" ";
      $address=" ";
      $mobileNumber=" ";
      $password=" ";


        //CREATING CONNECTION
      $db = "crimes";
    $conn = new mysqli("localhost","root"," ", "crimes");

     // CHECKING CONNECTION
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    //CONVERTING HTML TO PHP
    if(isset($_POST['submit'])){
        $userName = $_POST['userName'];
        $userEmail = $_POST['userEmail'];
        $address = $_POST['address'];
        $mobileNumber = $_POST['mobileNumber'];
        $password = $_POST['password'];
    }

    //ensuring that data is valid....error handling logic gate
    if(empty($userName)){
        echo '<script>alert("A Name is required")</script>';
    }
    else if(empty($userEmail)){
        echo '<script>alert("email is required")</script>';
    }
    else if(empty($address)){
        echo '<script>alert("your address is required")</script>';
    }
    else if(empty($mobileNumber)){
        echo '<script>alert("phone number is required")</script>';
    }
    else if(empty($password)){
        echo '<script>alert("password is required")</script>';
    }

    //If data is clean then we feed it to the DB
    else{
        $sql = "INSERT INTO user(userName, userEmail,address,mobileNumber,password)
                VALUES('$userName', '$userEmail','$address','mobileNumber','$password')";
    }
    //Feedback if data has been inserted
    if(isset($_POST['submit'])){
        if(mysqli_query($conn, $sql)){
            echo '<script>alert("login successfull")</script>';
        }
        else{
            echo '<script>alert("dont have an account signup")</script>';
        }
    }

    ?>
    </form>

</body>
<script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
</script>


</html>