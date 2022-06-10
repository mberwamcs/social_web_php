<?php

    include('autoload.php');

    $login = new Login();
    $user_data = $login->check_id($_SESSION['userid']);

    //$user_class = new User();
    $post = new Post();
    $likes= false;

    $ERROR = "";
    if(isset($_GET['id']) && isset($_GET['type'])){

       $likes = $post->get_likes($_GET['id'], $_GET['type']);
    }else {
           $ERROR = "No likes were found!";
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Likes | user</title>
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
   <!--cover area-->
   <div id="page-cover" >
            <div>
        
                <br>        
                        <?php
                        $User = new User();
                        $image_class = new Image();

                            if(is_array($likes)){
                                foreach ($likes as $row){
                                   
                                    $friend_row = $User->read_user($row['userid']);
                                    include("friends.php");
                                }
                            }
                        ?>
                    <br style="clear: both">
            </div>

    </div>
</body>
</html>