<?php
   
   /* session_start();
    $_SESSION;

    include("connect.php");
    include("function.php");

    $suer_data = check_login($con);
*/
include('head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Mberwa Main page</title>
	<style>
		body {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        background-color: rgb(207, 193, 193);
        margin: 0;
        } 
		#welcome{
			width: 60%;
			margin: 5% auto ;
			text-align:center;
			font-size:50px;
			background-color: aliceblue;
			padding: 5px;
		}
		h1{
			text-align:center;
			color:rgb(100 250 20);
		}
		p{
			text-align:center;
			font-size:20px;
		}
	</style>
</head>
<body>
	<div>
        <?php
            $mainName;
			$searchBox;
        ?>
		
    </div>

	<div id="welcome">Welcome To<br><h1>All-Me</h1><br>
	<p>PLEASE <a href= "signin.php">SIGN IN </a> TO CONTINUE OR <a href="signup.php">SIGN UP </a> TO BE A MEMBER.</p>
	</div>
</body>
</html>
