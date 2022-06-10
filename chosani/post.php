<?php
    //include('autoload.php');
?>
<style>
    a{ text-decoration: none;
    }

</style>
    <div id="post">
        <div>
            <?php 
                //empty image variable
                $image = "";
                $image = "image/mile2.jpg";

                if ($user_data['gender'] == "Female"){
                 $image = "image/femile2.jpg";
             }

             //check if user have profile_image
             if (file_exists($user_data['profile_image'] )){
                 $image = $image_class->get_thumb_profile($user_data['profile_image']);
             }
             
            ?>
            <img src="<?php echo $image; ?>" style="width: 100px; margin-right: px; border-radius: 50%;"> 
            
        </div>
        <div style="width: 100%; margin-left: 7%;">
            <div style="font-weight: bold; color: #405d9b">

                <?php 
                    echo htmlentities(htmlspecialchars($user_data['first_name'])) . " " . htmlentities(htmlspecialchars($user_data['last_name']));
                    
                    if($row['is_profile_image']){
                        $pronoun = "his";
                        if($user_data['gender'] == "Female"){
                            $pronoun = "her";
                        }
                        echo "<span style='color: #aaa'> updated $pronoun profile image. </span>";
                    }

                    if($row['is_cover_image']){
                        $pronoun = "his";
                        if($user_data['gender'] == "Female"){
                            $pronoun = "her";
                        }
                        echo "<span style='color: #aaa'> updated $pronoun cover image. </span>";
                    }
                ?>
            </div>

                <?php
                    echo htmlentities(htmlspecialchars($row['post']));
                    //echo htmlspecialchars($row['post']);

                ?>
                    <br>
                <?php
                    if(file_exists($row['image'])){
                        $post_image = $image_class->get_thumb_post($row['image']);
                        echo "<img src='$post_image' style= 'width:85%; height: 70%; ' />"; 
                    }
                    //if likes have more then one
                    $likes = "";
                    if($row['likes'] > 0){
                       $likes = "(". $row['likes'].")";
                    }
                    else{
                        $likes =" ";
                    }
                ?>
                <br>
                <a href="like.php?type=post&id=<?php echo $row['postid'] ?>">Like <?php echo $likes ?></a>  . <a href="#"> comment</a> 

                <span style="color:#999;">

                    <?php echo(" | ". $row['date']);?>
                </span>

                <span style="color:#999; float:right;">
                    <?php
                        $post = new Post();
                        if($post->i_own_post($row['postid'], $_SESSION['userid'])){
                            echo "
                                <a href='edit.php?id= $row[postid]'> Edit</a> |
                                <a href='delete.php?id= $row[postid]'> Delete</a>

                            
                            ";
                        }
                    ?> 
                </span>
            <div>
                <?php
                $i_liked = false;
                if(isset($_SESSION['user_userid'])){
                    $DB = new Database();
                    
                    $sql = "SELECT likes from likes where type='post' && contentid = '$row[postid]' limit 1";
                    $result = $DB->read($sql);
                    if(is_array($result)){
                        $likes = json_decode($result[0]['likes'], true); 

                        $user_ids = array_column($likes, "userid"); 
                        //
                        if(in_array($_SESSION['userid'], $user_ids)){
                            $i_liked = true;
                        }
                    }
                }
                    
                if($row['likes'] > 0) {
                    echo "<a href='likes.php?type=post&id=$row[postid]'>";

                    if($row['likes'] == 1){
                        if($i_liked){
                            echo "You liked this post!";
                        }else{
                            echo "1 person liked this post";
                        }
                    }else{
                        if($i_liked){
                            $pronoun = "others";
                            if($row['likes'] - 1 > 1){
                                $pronoun = "other";
                                echo " You and ".($row['likes'] - 1). " ". $pronoun. " person liked this post";
                            }
                        }else{
                            echo $row['likes'] . " other liked this post";
                        }
                    }
                    echo "</a>";
                }
                ?>
            </div>
        </div>
    </div>