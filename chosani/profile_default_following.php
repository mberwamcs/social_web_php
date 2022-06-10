<div style="min-height:250px; background-color: white; text-align:center;">
    <div style="padding: 10px; ">
        <?php
            $images_class = new Image();
            $post_class = new Post();
            $user_class = new User();

            $following = $user_class->get_following($user_data['userid'], "user");
            
            if(is_array($following)){
               echo "here";
                foreach($following as $follower) {
                    # code ....
                    #$friend_row = $user_class;
                    $friend_row = $user_class->follow_user($id, $type, $user_userid);

                    include("friends.php");
                }
                
            }else{
                echo "This user is not following anyone!";
            }
        ?>
    </div>
</div>