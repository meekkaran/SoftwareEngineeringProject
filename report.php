<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>report incidence</title>
    <link rel="stylesheet" href="report.css">
</head>

<body>

    <div class="topbar">
        <div id="logo">
            <img src="./img/cuff.png">
            <h1><span class="highlight">Report </span>Crimes</h1>
        </div>
    </div>


    <div class="container">
        <div class="top">
            <h1>Report incidence</h1>
            <p>Incident Reporting Form</p>
        </div>
        <form action="/action_page.php" onsubmit="myFunction()">
            <div class="input-group">
                <select id="Station Selection" name="stationName">
                    <option value="1">Select Station to report the case</option>
                    <option value="2">Makupa</option>
                    <option value="3">Chaani</option>
                    <option value="4">Ongata</option>
                    <option value="5">Langata Baracks</option>
                    <option value="6">Westlands</option>
                    <option value="7">Docks</option>
                </select>

            </div>
            <div class="input-group">
                <select id="Case category" name="caseCategory">
                    <option value="1">Select Case Category</option>
                    <option value="2">Theft</option>
                    <option value="3">Wanted</option>
                    <option value="4">Assault</option>
                    <option value="5">Robbery</option>
                    <option value="6">Domestic Violence/Rape</option>
                    <option value="7">Miscallenous</option>
                </select>

            </div>

            <div class="input-group">
                <label>Date:</label>
                <input type="date" name="casDate">
            </div>
            <div class="input-group">
                <label>Time:</label>
                <input type="time" name="caseTime">
            </div>
            <div class=input-group>
                <label>Male</label><br/>
                <input type="radio" name="victimGender" value="male">
                <label>Female</label>
                <input type="radio" name="victimGender" value="female">
            </div>
            <div class="input-group">
                <label>Brief Description About The Incident</label>
                <textarea type="text" name="caseDescription" class="describe" rows="10" cols="54"></textarea>
            </div>
            <div class="input-group">
                <button type="submit" name="submit" class="btn">SUBMIT</button>
            </div>
        </form>
        <script>
            function myFunction() {
                alert("Your case has been recorded and submitted successfully");
            }
        </script>
    </div>













    <!----------PHP PART-------------------->
    <?
      
      //INITIALIZING REORTING CRIMINAL CONTENT DATA
      $stationName=" ";
      $caseCategory=" ";
      $caseDate=" ";
      $caseTime=" ";
      $victimGender=" ";

      //CREATING CONNECTION
      $db = "crimes";
    $conn = new mysqli("localhost","root","", "crimes");

     // CHECKING CONNECTION
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    //CONVERTING HTML TO PHP
    if(isset($_POST['submit'])){
        $stationName = $_POST['stationName'];
        $caseDate = $_POST['caseDate'];
        $caseTime = $_POST['caseTime'];
        $victimGender = $_POST['victimGender'];
        $caseDescription = $_POST['caseDescription'];
    }

    //ensuring that data is valid....error handling logic gate
    if(empty($stationName)){
        echo '<script>alert("A Name is required")</script>';
    }
    else if(empty($caseDate)){
        echo '<script>alert("Date is required")</script>';
    }
    else if(empty($caseTime)){
        echo '<script>alert("Time is required")</script>';
    }
    else if(empty($victimGender)){
        echo '<script>alert("Gender is required")</script>';
    }
    else if(empty($caseDescription)){
        echo '<script>alert("Description is required")</script>';
    }
    //If data is clean then we feed it to the DB
    else{
        $sql = "INSERT INTO cases(stationName, caseDate,caseTime,victimGender,caseDescription)
                VALUES('$stationName', '$caseDate','$caseTime','$victimGender','caseDescription')";
    }
     //Feedback if data has been inserted
    if(isset($_POST['submit'])){
        if(mysqli_query($conn, $sql)){
            echo '<script>alert("Your details have been captured. We are solving your case in a few.")</script>';
        }
        else{
            echo '<script>alert("Error: Information was not captured well. Try again!!")</script>';
        }
    }
    ?>


</body>

</html>