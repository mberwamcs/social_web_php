<?php
/* for browzer purposes / web address
    http://localhost/social_website/chosani/profile.php
    logout when computer shuts off or restarts
*/
    include('autoload.php');
    
    $login = new Login();
    $user_data = $login->check_id($_SESSION['userid']);

//getting the corrent user date
    $USER = $user_data;

//checking user id
    if(isset($_GET['ID']) && is_numeric($_GET['ID'])){

        $profile = new profile();
        $profile_data = $profile->get_profile($_GET['ID']);

        if(is_array($profile_data)){
            $user_data = $profile_data[0];
        }
    }
    //for posting start here
    if ($_SERVER['REQUEST_METHOD'] == "POST"){



        $post = new Post();
        $id = $_SESSION['userid'];
        $result = $post->create_post($id, $_POST, $_FILES);


        if($result == ""){
         
           //var_dump($result);

           header('Location: profile.php');
            die;
        }else {
        
            echo "<div style='text-align:center;font-size:14px;color:white;background-color:gray;'>";
            echo "The following error occured: <br><br>";
            echo $result;
            echo "</div>";
        }
    }
    // collect the posts
        $post = new Post();
        $id = $user_data['userid'];

        $posts = $post->read_post($id);  
    
    // collect the friends
        $User = new User();
       
        $friends = $User->read_friends($id); 

        $image_class = new Image();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Profile page | user</title>
    <link rel="stylesheet" href="allme.css">
    <script>
        //alert("Hello Hussein ");
    </script>
	
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
            <?php 
                $image = "image/cover-image.jpg";
                if(file_exists($user_data['cover_image'])){
                    $image = $image_class->get_thumb_cover($user_data['cover_image']);
                }  
            ?>
            <!--cover picture-->
            <img src="<?php echo htmlentities(htmlspecialchars($image)); ?>" alt="" width="100%" height="200px" id="cover-space"> 

         <!-- ***************** profile pics *******************************-->
            <div id="pro-pic">
                
                <?php 
                    $image = "image/mile2.jpg";
                    if($user_data['gender'] == "Female"){
                        $image = "image/femile2.jpg";
                    }
                    if(file_exists($user_data['profile_image'])){
                        $image = $image_class->get_thumb_profile($user_data['profile_image']);
                    }
                    
                ?>
                <img src="<?php echo htmlentities(htmlspecialchars($image)); ?>" alt="profile image" width="100" height="" ><br>
            </div>
         <!-- ************** change profile picture ***************************************-->
            <a href="change_profile_image.php?change=profile" style="text-decoration: none; color:darkgoldenrod">Change: profile image</a> |
         <!-- ************** change cover picture ***************************************-->
            <a href="change_profile_image.php?change=cover" style="text-decoration: none; color:darkgoldenrod">cover image</a> 
        
         <!-- ************** the user name ***************************************-->
            <div class="name">
                <a href="profile.php?id=<?php echo $user_data['userid']?>">
                <?php echo htmlentities(htmlspecialchars($user_data['first_name'])) . " " . htmlentities(htmlspecialchars($user_data['last_name'])); ?>
                </a>
            <!-- ************** number(s) of follower who liked ***************************************-->
                <?php
                    $mylikes = ""; 
                    if($user_data['likes'] > 0){
                        $mylikes = "(".$user_data['likes']. " Follower)";
                        //$sql = "update  user set likes = 1";
                    }else{
                        $mylikes = ""; 
                    }
                ?>
            <!-- ************** The follow button ***************************************-->
                <br>
                
                <a href="like.php?type=user&id=<?php echo $user_data['userid']; ?>">
                    <input id="post_button" type="button" value="Follow <?php echo $user_data['likes'] ?> " style="margin-right: 10px;background-color:#0bb890; width: auto;">
                  
                </a>
            </div>
           
         <!-- the button links**************************-->   
            <div id="link" >  
                <a href="index.php" ><div class="link">Timeline</div></a> 
                <a href="profile.php?section=about"><div class="link">About</div> </a>
                <a href="profile.php?section=followers&id=<?php echo $user_data['userid']?>"><div class="link">Followers</div></a> 
                <a href="profile.php?section=following&id=<?php echo $user_data['userid']?>"><div class="link">Following</div></a> 
                <a href="profile.php?section=photos&id=<?php echo $user_data['userid']?>"><div class="link">Photos</div> </a> 
                <a href="profile.php?section=Setting"><div class="link">Settings</div> </a>
            </div>
        </div>
    <!--************************After the links***********************************-->
        <?php
            $section = "default";
            if(isset($_GET['section'])){

                $section = $_GET['section'];
            }
            if($section == "default"){

                include("profile_default_page.php");

            }elseif($section == "photos"){

               include("profile_default_photos.php");

            }elseif($section == "followers"){

               include("profile_default_followers.php");
    
            }elseif($section == "following"){

               include("profile_default_following.php");
            } 

        ?>
       
    </div><!-- end of the main-->
    <!--
    <footer style="background-color: #607076; padding: 5px; color:white;">
        <div class="today">
            <?php
                $Date = mktime(8,34,00,12,31,2021); 
                echo htmlentities(htmlspecialchars("Today is ". $Date));
	        ?>
        </div>
            Today's news: <br>
	        user coreaia: <br>
    </footer>
        -->
</body>
</html>
