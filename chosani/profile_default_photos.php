<div style="min-height:250px; background-color: white; text-align:center;">
    <div style="padding: 10px; ">
        <?php
            $DB = new Database();
            $sql = "SELECT image,postid FROM posts WHERE has_image = 1 &&  userid = $user_data[userid]  order by id desc limit 30";
            $images =$DB->read($sql);

            $image_class = new Image();
            if(is_array($images)){
            // print_r($images);
                foreach($images as $image_row) {
                    echo "<img src=' ".$image_class->get_thumb_post($image_row['image']) ."'style='width:150px; margin: auto 5px;' />";
                }
                
            }else{
                echo "No images were found!";
            }
        ?>
    </div>
</div>