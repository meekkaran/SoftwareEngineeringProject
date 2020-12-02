<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criminal Reporting System </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <header>
        <div class="topbar">
            <div id="logo">
                <img src="img/cuff.png">
                <h1><span class="highlight">Report </span>Crimes</h1>
                <ul>
                    <li id="first"><a href="report.html">Report Criminal Content</a><i class="fa fa-angle-right"></i></li>

                    <li id="second"><a href="fnfn.html">Support</a><i class="fa fa-angle-right"></i></li>
                </ul>
            </div>
        </div>


        <div class="menubar">
            <ul>
                <li><a href="index.html">About us</a></li>
                <li><a href="index.html">Contact us</a></li>
                <li><a href="index.html">Our services</a></li>
                <li><i class="fa fa-user"></i><a href="index.html">Login<i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li><a href="login1.html">LOGIN</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>

    <mainmenu>
        <div class="container">
            <div class ="center">
                <p><a href="reportAdmin.html">Reported cases</a></p>
                    <form>
                    <div class="input-group">
                        <input type="text" placeholder="Enter Case ID" name="enter">
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Enter Station to assign to" name="enter">
                    </div>
                    <h3>Has the case been solved?</h3>
                    <div class=input-group>
                        <label>Yes</label>
                        <input type="radio" name="" value="yes">
                        <label>No</label>
                        <input type="radio" name="" value="no">
                    </div>
                    <div class="input-group">
                        <label>Brief Description About The Incident</label></br>
                        <textarea type="text" name="descrbe" class="describe" rows="10" cols="54"></textarea>
                    </div>
                    <div class="input-group">
                        <button type="submit" name="submit" class="btn">SUBMIT</button>
                    </div>
                    </form>
            </div>
            
            <div class="center1">
                <p><a href="sth.html">Progress cases</a></p>
            </div>

            <div class="center2">
                <p><a href="sth.html">Solved cases</a></p>
            </div>
        </div>
    </mainmenu>
</body>