<?php
    include('autoload.php');
    
    $login = new Login();
    $user_data = $login->check_id($_SESSION['all_me_userid']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Change_profile_image</title>
    <link rel="stylesheet" href=" ">

	<style>
        body {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        background-color: rgb(207, 193, 193);
        margin: 0;

        }
        
        #page-cover {
            background-color: lightgray;
            min-height:200px;
            margin:auto;
            width:60%;
        }
        #main-cover {
            text-align: center;
            margin-bottom:10px;
        }
        #pro-pic {
            border-radius: 50%;
            margin-top: -140px;
            padding-bottom: 2px;
            border: 3px solid white;
        }
        #link {
            width: 100%;
            display: inline-block; 
            text-align: center;
        }
        .link {
            display: inline-block; 
            margin: 5px;
            text-align: center;
            padding: 3px;
            color: blue;
            font-size: 1.2em;
            font-weight: bolder;
        }

        #name_img {
            width: 100px;
        }
        #timeline_bar{ 
            min-height: 150px;
            margin-top: 10px;
            color: #405d9b;
            padding: 8px;
            text-align: center;
        }
    .name {
        color: #405d9b; 
        font-size: 1.2em;
        font-weight: bolder;
    }
    
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
    #post_bar {
        margin-top: 10px;
        background-color: white;
        padding: 10px;
        
    }
    #post {
        padding: 4px;
        font-size: 13px;
        display: flex;
        margin-bottom: 20px;
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
            <img src="image/storr_emg_62.jpg" alt="" width="100%" height="300"> 
            <img src="image/storr_emg_44.jpg" alt="" width="120px" height="120" id="pro-pic">
            <div class="name">
                <a href="profile.php" style="text-decoration:none; color:#405d9b"><?php echo $user_data['First_name']." ".$user_data['Last_name']?></a>
            </div>
    <!-- ************************ the button links **************************--> 
            <div id="link">  
                <a href="profile_default_photos.php" style="color: black;"><div class="link">My profile</div></a> 
                <div class="link">About</div>
                <div class="link">Friends</div> 
                <div class="link">Business</div> 
                <div class="link">Room</div>
            </div>
        </div>
    <!--************************ After the links ***********************************-->
    <div style= "display:flex; padding-top:5px;">
        <div style="min-height: 400px; flex:1;">
            <div id="timeline_bar">
                <div id="friends">
                    <img id="name_img" src="image/storr_emg_44.jpg" alt="">
                    <br>
                    <div style="font-weight: bolder; text-align: center;">
                    <a href="profile.php" style="text-decoration:none; color:#405d9b"><?php echo $user_data['First_name']."<br>".$user_data['Last_name']?></a>
                    </div> 
                </div> 
            </div>
           
        </div> <!-- friends_bar -->
        <div style="min-height:400px; flex:3; padding:10px; padding-right:1px;">
            <div style="border: solid thin #aaa; padding: 10px; background-color: white;"> 
                <textarea name="" cols="" rows="3" placeholder="What is in your mind?"></textarea>
                <input id="post_button" type="submit" value="Post"> <br>
            </div> 
        <!--**************************** post ****************************--> 
            <div id="post_bar">

        <!--***************************** post 1 *************************--> 
                <div id="post">
                    <div>
                    <img src="image/storr_emg_44.jpg" style="width: 75px; margin-right: 4px;"> 
                </div>
                <div>
                    <div style="font-weight: bold; color: #405d9b">First Guy</div>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, aliquid? Quaerat illo, voluptates provident suscipit 
                    explicabo cumque.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, aliquid? Quaerat illo, voluptates 
                    provident suscipit explicabo cumque. 
                    <br><br>
                    <a href="#">Like</a>  . <a href="#"> comment</a> . <span style="color:#999;">April 23 2021</span>
                </div>
            </div>

        <!--***** post 2 ****--> 
                <div id="post">
                    <div>
                    <img src="image/storr_emg_62.jpg" style="width: 75px; margin-right: 4px;"> 
                </div>
                <div>
                    <div style="font-weight: bold; color: #405d9b">First Guy</div>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, aliquid? Quaerat illo, voluptates provident suscipit 
                    explicabo cumque.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, aliquid? Quaerat illo, voluptates 
                    provident suscipit explicabo cumque. 
                    <br><br>
                    <a href="#">Like</a>  . <a href="#"> comment</a> . <span style="color:#999;">April 23 2021</span>
                </div>
            </div>


            </div> 
        </div> <!-- end -->
    </div>
       <!-- <div style="width:50%; float:right; background-color: blue;">Message board</div> <br> -->
        main page
    </div><!-- end of the main-->
    <!----
    
        </div>
        </div>       
    -->    
    <footer>
        footer
        <div class="today">
	        Today's new
        </div>
    </footer>
</body>
</html>