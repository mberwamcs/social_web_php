<?php
    include('autoload.php');
    
    $login = new Login();
    $user_data = $login->check_id($_SESSION['userid']);

    $Post = new post();

    $ERROR = "";
    if(isset($_GET['id'])){
        
        $ROW = $Post->get_one_post($_GET['id']);

        if(!$ROW){
            $ERROR = "No such post was found!";
        }else {
            if($ROW['userid'] != $_SESSION['userid']){
                $ERROR = "Accesses denied! you can't delete.";
            }
        }

    }else {
           $ERROR = "No such post was found!";
        }

    //if something was posted
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $Post->delete_post($_POST['postid']);
        header("Location: profile.php");

        die;
        //print_r($_POST);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Delete post | user</title>
    <link rel="stylesheet" href=" ">

	<style>
        body {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        background-color: rgb(207, 193, 193);
        margin: 0;

        }
        
        #page-cover {
            background-color:white;
            padding: 10px;
            margin: 10px auto;
            width:60%;
            min-height: 50%;
        }
     h1 {margin: auto;}   
    #post_button { 
        float: right; 
        background-color: blue;
        border: none;
        color: white;
        padding: 4px;
        font-size: 14px;
        border-radius: 2px;
        width: 50px;
    }
    
    </style>  
</head>
<body>
    <div>
        <?php
            include('head.php');
        ?>
    </div>
   <!--*********************************end of the header************************-->
    
        
        <div id="page-cover" >
            <div>
        
                <br>
                <form action="" method="post">
                    <?php 
                        if($ERROR != ""){
                            echo $ERROR;
                        } else{
                            echo "Are you sure you want to delete this post??";
                            echo "<br><br>";
                            $user = new User();
                            $ROW_USER = $user->read_user($ROW['userid']);
                        
                            //include("post_delete.php");
                            echo "<div style= 'float:;'>";
                                include("post_delete.php");
                            echo "</div>";
                            echo "<input name ='postid' type='hidden' value= '$ROW[postid]'>"; 
                            echo "<input id='post_button' type='submit' value='Delete'>"; 
                    }
                    ?>
        
                    <br>
                </form> 
            </div>

        </div>
      
    <footer>
        footer
        <div class="today">
	        Today's new
        </div>
    </footer>
</body>
</html>