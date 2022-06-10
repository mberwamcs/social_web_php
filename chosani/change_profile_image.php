<?php
    //session_start();
    include('autoload.php');
    
    $login = new Login();
    $user_data = $login->check_id($_SESSION['userid']);
    
    //posting starts here
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        

        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){

            //if is the wrong type of file
            if($_FILES['file']['type'] == "image/jpeg"){

                // if size is large then allowed
                $allowed_size = (1024 * 1024) * 10;
                // see what i did
                echo " Allowed size " .$allowed_size."<br>";
                echo " Uploaded size " .$_FILES['file']['size']."<br>";
            
                 //everything is fine
                    $folder = "uploads/".$user_data['userid'] ."/";

                    //create folder
                    if(!file_exists($folder)){
                        mkdir($folder, 0777, true);
                    }

                    $image = new Image();

                    $filename = $folder . $image->generate_filename(20) .".jpg";
                    move_uploaded_file($_FILES['file']['tmp_name'],  $filename);
                    
                    $change = "profile";
                        
                        //check for mode
                        if(isset($_GET['change'])){
                            $change = $_GET['change'];
                        }

                    if($change == "cover"){
                        if(file_exists($user_data['cover_image'])){
                            unlink($user_data['cover_image']);
                        }
                        $image->resize_image($filename,$filename,1500,1000);
                    }else {
                        if(file_exists($user_data['profile_image'])){
                            unlink($user_data['profile_image']);
                        }
                        $image->resize_image($filename,$filename,600,600);
                    }

                    // if file existing 
                    if(file_exists($filename)){
                        $userid = $user_data['userid'];
                        //var_dump($userid);
                        if($change == "cover"){
                        
                            $query = "UPDATE user set cover_image = '$filename' where userid = '$userid' limit 1";
                            $_POST['is_cover_image'] = 1;
                        }else {
                             $query = "UPDATE user set profile_image = '$filename' where userid = '$userid' limit 1";
                             $_POST['is_profile_image'] = 1;
                        }
                       

                        $DB = new Database();
                        $DB->save($query); 

                         //create an update post
                        $post = new Post();
                        $out = $post->create_post($userid, $_POST, $filename);

                        header('Location: profile.php');
                        die;
                    }

                }else {
                echo "<div style='text-align:center;font-size:14px;color:white;background-color:gray;'>";
                echo "The following error occured: <br><br>";
                echo "oversize image please resize your image";
                echo "</div>";
                }
            }else {
            echo "<div style='text-align:center;font-size:14px;color:white;background-color:gray;'>";
            echo "The following error occured: <br><br>";
            echo "You have wrong type of file";
            echo "</div>";
            }
         
    } else {
        echo "The following error occured: <br><br>";
        echo "<div style='text-align:center;font-size:14px;color:white;background-color:gray;'>";
        echo "</div>";
        echo "Please add an image";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Change Profile image | All-Me</title>
    <link rel="stylesheet" href=" ">

	<style>
        body {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        background-color: rgb(207, 193, 193);
        margin: 0;

        }
        
        #page-cover {
            background-color: lightgray;
            min-height:100px;
            margin:auto;
            width:60%;
        }
        #main-cover {
            text-align: center;
            margin-bottom:10px;
        }
       
    #post_button { 
        float: right; 
        background-color: blue;
        border: none;
        color: white;
        padding: 4px;
        font-size: 14px;
        border-radius: 2px;
        
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
   <div id="page-cover"> 
        <div id="main-cover">
            
        </div>
    <!-- ************************ After the links ***********************************-->
    <div style= "display:flex; padding-top:5px;">
        
        <div style="border: solid thin #aaa; padding: 10px; background-color: white; width:100%"> 
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="file">  
                <input id="post_button" type="submit" value="Change">
                <br>
                <br>
                
                <div style="text-align: center;">
                <?php
                
                    if(isset($_GET['change']) && $_GET['change'] == "cover"){
                        
                        $change = "cover";
                        echo "<img src='$user_data[cover_image]' style='max-width: 500px;'>";
                        
                    }else{
                        //$cornerimage = $user_data['profile_image'];
                        echo "<img src='$user_data[profile_image]' style='max-width: 500px;'>";
                    }
                ?>
                </div>
            </form>
        </div>
         
    </div>
      
    </div><!-- end of the main-->
    
    <footer>
       
    </footer>
</body>
</html>