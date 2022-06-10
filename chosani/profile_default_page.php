<div style=" display:flex; padding-top:5px;">
        <div style="min-height: 400px; flex:1;" >
            <div id="friends_bar">
               <span style="text-align: center;"> Friends</span> <br>
                <?php
                if ($friends){
                    foreach ($friends as $friend_row){
                        $friends = $User->read_friends($id);
                         include("friends.php");           
                    }
                }
            ?>
            </div>
           
        </div> 
        <!-- friends_bar -->
        <div style="min-height:400px; flex:3; padding:10px; padding-right:1px;">
            <div style="border: solid thin #aaa; padding: 10px 10px 0 10px; background-color: white; min-height:115px"> 
                <form action="" method="post"  enctype="multipart/form-data">
                    <textarea name="post" id="" cols="" rows="4" placeholder="What is in your mind?"></textarea>
                    <input type="file" name="file" id="image_post">
                    <input id="post_button" type="submit" value="Post"> <br>
                </form>
            </div> 
             <!-- post ****************************--> 
            <div id="post_bar">

            <?php
            //how to display the post infomation/ who and what.
                if ($posts){
                    foreach ($posts as $row){
                        //$user = new User(); //??
                        //who posted info from user.php
                        //$row_post = $user->get_data($row['userid']); //???
                        include("post.php"); //the whole post page.
                    }
                }
            ?>

            </div> 
        </div> <!-- end -->
    </div>