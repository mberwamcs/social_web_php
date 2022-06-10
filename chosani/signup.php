<?php  

    //session_start();
    include('autoload.php');
    
    $fname = "";
    $lname = "";
    $gender = "";
    $email = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $signup = new Signup();
        $results = $signup->evaluate($_POST);
    
        if($results != ""){
            echo "<div style='text-align:center;font-size:14px;color:white;background-color:gray;'>";
            echo "The following error occured: <br><br>";
            echo $results;
            echo "</div>";
        }else {
            //$signup = new Signup();
           // $result = $signup->create_user($_POST);
            
            //return $results;
            header("location: signin.php");
            //die;
        }

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
    }    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | All-Me</title>
    <link rel="stylesheet" href="thecss.css">
    <style>
        body {
            background-image: url();
        }
       #gender {
            margin: auto;
            margin-top: 10px;
            padding-left:2px;
            border:.5px solid grey;
            border-radius: 1px;
            width: 100%;
            font-size:1.3em;
       }
        #fname{
            background-image: url("image/face.png");
            background-repeat: no-repeat;
            background-position: right;
            background-size:20px;
       }
       #lname{
            background-image: url("image/face.png");
            background-repeat: no-repeat;
            background-position: right;
            background-size:20px;
       }
       #email{
            background-image: url("image/email.jpg");
            background-repeat: no-repeat;
            background-position: right;
            background-size:35px;
       }
       #pass{
            background-image: url("image/password.jpg");
            background-repeat: no-repeat;
            background-position: right;
            background-size:45px;
       }
    
        .wrong{color:red;}
        #below-hearder {
            background-color: azure;
            width: 600px;
            margin: auto;
            margin-top: 50px;
            text-align: center;
            border-radius: 5px;
            padding: 10px;
        } 
    </style>
</head>
<body>
    <div class="header">
        <div id="main-name"> 
        <a href="index.php" style="color: white; text-decoration: none">All-Me</a> 
        <input type="text" id="search_box" placeholder="Search for friends">
       <!-- <img src="image/storr_emg_44.jpg" alt="" width="35" style="float: right" id="img">-->
        <a href="logout.php">
        <span style="font-size: 15px; float:right; margin:10px; color:white">Login</span>
        </a>
        </div>
   </div> 
    
    <div idatebox>
        
    </div>

	<div id="below-hearder">
        <form method="post" action="">
        <!--<div name="wrong" id="wrong">hussein</div> -->
           <span style="font-weight:bold; margin:auto;"> Register in All-Me</span><br>
            <input value = "<?php echo $fname ?>" id="fname" type="text" name="fname" class="signin-input" placeholder="First name"><br>
            <input value = "<?php echo $lname ?>" id="lname" type="text" name="lname" class="signin-input" placeholder="Last name"><br>
            <input value = "<?php echo $email ?>" id="email" type="text" name="email" class="signin-input" placeholder="Email address"><br>
            <span style="font-size: 1.2em; width: 100%; margin: 0;">Gender:</span> <br>
            <select name="gender" id="gender" >
                <option><?php echo $gender ?> </option>
                <option>Male</option>
                <option>Female</option>
            </select>
            <input id="pass" type="password" name="password" class="signin-input" placeholder="Password"><br>
            <input id="pass" type="password" name="password2" class="signin-input" placeholder="Retype password"><br>
           
        <!--SIGN IN BUTTON -->
            <input type="submit" id="button" value="Signup"><br><br>
            <p>Already have an account <a href="signin.php" style="text-decoration: none;">LOGIN</a></p>
        </form>
          
    </div>
	<!-- <p><a href="welcomepage.php">BACK TO HOME PAGE</a></p> -->
</body>
</html>