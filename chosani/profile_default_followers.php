<div style="min-height:250px; background-color: white; text-align:center;">
    <div style="padding: 10px; ">
        <?php
            $images_class = new Image();
            $post_class = new Post();
            $user_class = new User();

            $followers = $post_class->get_likes($user_data['userid'], "user");
    
            if(is_array($followers)){
               
                foreach($followers as $follower) {
 
                    $friend_row = $user_class;//->like_post($id, $type, $user_userid);
                    include("friends.php");
                }
                
            }else{
                echo "No followers were found!";
            }
        ?>
    </div>
</div>