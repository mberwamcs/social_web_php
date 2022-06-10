<div id="friends" style="display: inline-block;">

    <?php
        $user_class = new User();
        
        $image = "image/mile2.jpg";
        
        if(is_array($friend_row)){
        if($friend_row['gender'] == "Female"){
            $image = "image/femile2.jpg";
        }
    
 // ******** if user has a profile image **************
        if (file_exists($friend_row['profile_image'] )){

            $image = $image_class->get_thumb_profile($friend_row['profile_image']);
        }
    }
    ?>
 <!-- ************** if user does not have a profile image-->

    <a href="profile.php?ID=<?php echo $friend_row['userid']?>" >
        <img id="friends_img" src="<?php echo $image ?>" width="110px"> 
        <br>

        <?php 
            echo $friend_row['first_name'] . " " . $friend_row['last_name']; 
        ?>
    </a>
       
</div>
