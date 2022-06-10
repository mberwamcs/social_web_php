<?php 

session_start();

    include("miyatoo/connectsocial.php");
    include("miyatoo/signin.php");

//HASHING THE PASSWORDS FOR USERS WHO PASSWORD WAS PLAN TEXT
/*
    $DB = new Database();
    $sql = "select * from all_me";
    $result = $DB->read($sql);

    if(is_array($result)){
        foreach ($result as $row){
            $id = $row['ID'];
            // hash password
            $password = hash("sha1", $row['Password']);
        
        $sql ="update all_me set Password = '$password' where  id = '$id' limit 1";
    
        $DB->save($sql);
            }
        }
*/

    $email = "";
    $password = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $login = new Login();
        $result = $login->evaluate($_POST);
    
        if($result != ""){
            echo "<div style='text-align:center;font-size:14px;color:white;background-color:gray;'>";
            echo "The following error occured: <br><br>";
            echo $result;
            echo "</div>";
        }else {
            echo "I am in";
            header("location: profile.php");
            die;
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
    }
       
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | All_Me</title>
    <link rel="stylesheet" href="thecss.css">
    <style>
         #email{
            background-image: url("image/face.png");
            background-repeat: no-repeat;
            background-position: right;
            background-size:25px;
       }
       #pass{
            background-image: url("image/password.jpg");
            background-repeat: no-repeat;
            background-position: right;
            background-size:45px;
       }
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
    <div class="header" style="height: 80px;">
        <div class="header">
            <div id="main-name"> 
            <a href="index.php" style="color: white; text-decoration: none">All_Me</a> 
            <input type="text" id="search_box" placeholder="Search for friends">
            <!--<img src="image/storr_emg_44.jpg" alt="" width="35" style="float: right" id="img">-->
            <a href="signup.php">
            <span style="font-size: 15px; float:right; margin:10px; color:white">Sign-Up</span>
            </a>
        </div>
    </div>
    
	<div id="below-hearder">
        <form action="" method="post">
        <!--<div name="wrong" id="wrong">hussein</div> -->
           <span style="font-weight:bold; margin:auto;"> Login to All_Me</span>
            <input value = "<?php echo $email ?>" id="email" type="text" name="email" class="signin-input" placeholder="email/username"><br>
       
            <input value = "<?php echo $password ?>" id="pass" type="password" name="password" class="signin-input" placeholder="password"><br>
        <!--SIGN IN BUTTON -->
            <input id="button" type="submit" value="Login"><br><br>
            <?php $error = "password incorrect! <br>"; 
            ?>
        </form>
          <p>Not a member yet <a href="signup.php" style="text-decoration: none;">SIGN-UP</a></p>
    </div>
	
	<!--<p><a href="welcomepage.php">BACK TO HOME PAGE</a></p>-->
</body>
</html>

</body>
</html>