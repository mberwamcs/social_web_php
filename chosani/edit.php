<?php
    include('autoload.php');
    
    $login = new Login();
    $user_data = $login->check_id($_SESSION['user_userid']);

    $Post = new post();

    $ERROR = "";
    if(isset($_GET['id'])){
        
        $ROW = $Post->get_one_post($_GET['id']);

        if(!$ROW){
            $ERROR = "No such post was found!";
        }else {
            if($ROW['userid'] != $_SESSION['user_userid']){
                $ERROR = "Accesses denied! you can't delete.";
            }
        }

    }else {
           $ERROR = "No such post was found!";
        }

   
    if(isset($_SERVER['HTTP_REFERER']) && !strstr($_SERVER['HTTP_REFERER'], "edit.php")){
            $_SESSION['$return_to'] =  $_SERVER['HTTP_REFERER'];
        }
    //if something was posted
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $Post->edit_post($_POST,$_FILES);
        
        header("Location: ". $_SESSION['$return_to']);
        die;
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
    textarea {
        border: none; width:99%;
    }
    textarea:hover  {
        border: none;
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
                <form action="" method="post" enctype="multipart/form-data">
                    <?php 
                        if($ERROR != ""){
                            echo $ERROR;
                        } else{
                            echo "Edit post<br><br>";
                            echo    '<textarea name="post" placeholder="What is in your mind?">'.$ROW['post'].'</textarea><br>
                                    <input type="file" name="file" id="image_post">';
                           
                        
                            //include("post_delete.php");
                            echo "<div style= 'float:;'>";
                               // include("post_delete.php");
                            //echo "</div>";
                            echo "<input name ='postid' type='hidden' value= '$ROW[postid]' > 
                                    
                                   <br>
                                    
                                    "; 

                            if(file_exists($ROW['image'])){
                                $image_class = new Image();
                                $post_image = $image_class->get_thumb_post($ROW['image']);
                                echo "<div style='text-align: center;'><img src='$post_image' style= 'width:30%; text-align:center;' /></div>
                                
                                "; 
                            }
                            echo "<input id='post_button' type='submit' value='Sava'><br>";
                    }
                    ?>
        
                    <br>
                </form> 
            </div>

        </div>
      
    <footer>
       
    </footer>
</body>
</html>