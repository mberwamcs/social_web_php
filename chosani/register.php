<?php
    session_start();
   // $_SESSION;

    include("connect.php");
    include("function.php");

    $suer_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Main page</title>
    <style>
		body{
			font-size:media;
			padding-top: px;
			background:rgb(30 100 100);
		}
		#welcome{
            margin: 0 0 0 5%;
			font-size: 2.5em;
		}
		span{
            font-size: .8em; padding: 0 .5%; border-radius: 15px; 
           
            border: 3px solid red;
			margin: 0 0 0 20px;
			color:rgb(100 250 20);
		}
		span:hover{
            background-color: dimgray; cursor: pointer;
		}
        #user{float: right; font-size: 1.2em; margin: -3% 1% 0 auto; padding: 1px 3px;}
        #user:hover {background-color: aliceblue;}
        a:hover {background-color:coral;}
	</style>
</head>
<body>
<div id="welcome">Welcome to <span> Bantus media </span> </div>
    
    <?php 
    
    //echo "<div id='user'> ". " Hello:  ". $suer_data['user_name']. " " .  "<a href='welcomepage.php'> ". " Logout" . "</a>" . "</div>"; 
    
    ?>
    <a href="#">Work Timesheet</a>
<!--<a href="welcomepage.php">Logout</a> -->
    	
</body>
</html>