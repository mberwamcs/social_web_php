
    <div id="post">
        <div>
            <?php 
             $image = "image/mile2.jpg";
               // $ROW_USER = $user_date;
             if ($ROW_USER['gender'] == "Female"){
                 $image = "image/mile2.jpg";
             }

             //check if user have profile_image
             $image_class = new Image();
             if (file_exists($ROW_USER['profile_image'] )){
                 $image = $image_class->get_thumb_profile($ROW_USER['profile_image']);
             }
             
            ?>
            <img src="<?php echo $image; ?>" style="width: 75px; margin-right: 4px; border-radius: 50%;"> 
            
        </div>
        <div style="width: 100%;">
            <div style="font-weight: bold; color: #405d9b">

                <?php 
                    echo htmlentities(htmlspecialchars($user_data['first_name'])) . " " . htmlentities(htmlspecialchars($user_data['last_name']));
                    
                    if($ROW['is_profile_image']){
                        $pronoun = "his";
                        if($ROW_USER['gender'] == "Female"){
                            $pronoun = "her";
                        }
                        echo "<span style='color: #aaa'> updated $pronoun profile image. </span>";
                    }

                    if($ROW['is_cover_image']){
                        $pronoun = "his";
                        if($ROW_USER['gender'] == "Female"){
                            $pronoun = "her";
                        }
                        echo "<span style='color: #aaa'> updated $pronoun cover image. </span>";
                    }
                ?>
            </div>

                <?php
                    echo htmlentities(htmlspecialchars($ROW['post']));
                    //echo htmlspecialchars($ROW['post']);

                ?>
                    <br><br> 
                <?php
                    if(file_exists($ROW['image'])){
                        $post_image = $image_class->get_thumb_post($ROW['image']);
                        echo "<img src='$post_image' style= 'height:200px;' />"; 
                    }
                ?>
                    <br>
        </div>
    </div>