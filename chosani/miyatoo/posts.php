<?php

class Post {
    private $error = "";
    // insert post
    public function create_post($userid, $data, $files){

        if(!empty($data['post']) || !empty($files['file']['name']) || isset($data['is_profile_image']) || isset($data['is_cover_image'])) {

            $myimage = "";
            $has_image = 0;
            $is_cover_image = 0;
            $is_profile_image = 0;

            if(isset($data['is_profile_image']) || isset($data['is_cover_image'])){

                $myimage = $files;
                $has_image = 1;

                if(isset($data['is_cover_image'])){
                    $is_cover_image = 1;
                }
                if(isset($data['is_profile_image'])){
                    $is_profile_image = 1;
                }

            }else{

                if(!empty($files['file']['name'])){
            
                    $folder = "uploads/".$userid . "/";

                    //create folder
                    if(!file_exists($folder)){
                        mkdir($folder, 0777, true);
                        file_put_contents($folder . "index.php", " ");
                    }

                    $image_class = new Image();

                    $myimage = $folder . $image_class->generate_filename(20) . ".jpg";
                    move_uploaded_file($_FILES['file']['tmp_name'],  $myimage);

                    $image_class->resize_image($myimage, $myimage,1500,1500);
                
                $has_image = 1; 
                }

            }
            $post = "";
            if(isset($data['post'])){
                $post = addslashes($data['post']);
            }
            $postid = $this->create_postid();

            $query = "INSERT into posts (userid, postid, post, image, has_image, is_profile_image, is_cover_image) values ('$userid', '$postid', '$post', '$myimage', '$has_image','$is_profile_image','$is_cover_image')";

            $DB = new Database();
            $DB->save($query);
        }else{
            $this->error .= "please type something to post!<br>";
        }
        return $this->error;
    }
    //edit post 
    public function edit_post($data, $files){

        if(!empty($data['post']) || !empty($files['file']['name'])) {

            $myimage = " ";
            $has_image = 0;
           
                if(!empty($files['file']['name'])){
            
                    $folder = "uploads/". "/";

                    //create folder
                    if(!file_exists($folder)){
                        mkdir($folder, 0777, true);
                        file_put_contents($folder . "index.php", " ");
                    }

                    $image_class = new Image();

                    $myimage = $folder . $image_class->generate_filename(20) . ".jpg";
                    move_uploaded_file($_FILES['file']['tmp_name'],  $myimage);

                    $image_class->resize_image($myimage, $myimage,1500,1500);
                
                $has_image = 1; 
                }

            $post = "";
            if(isset($data['post'])){
                $post = addslashes($data['post']);
            }
            $postid = addslashes($data['postid']);

            if($has_image){
                $query = "UPDATE posts set post = '$post', image = '$myimage' where postid = '$postid' limit 1 ";
            } else{
                $query = "UPDATE posts set post = '$post' where postid = '$postid' limit 1 ";
            }

            $DB = new Database();
            $DB->save($query);
        }else{
            $this->error .= "please type something to post!<br>";
        }
        return $this->error;
    }
    // read the post 
    public function read_post($id){

        $query = "SELECT * from posts where userid = '$id' order by id desc limit 10";

        $DB = new Database();
        $result = $DB->read($query);
        if($result){
           return $result;
        }else {
            return false;
        }
    }

    public function get_one_post($postid){

        if(!is_numeric($postid)){
            return false;
        }

        $query = "SELECT * from posts where postid = '$postid' limit 1";

        $DB = new Database();
        $result = $DB->read($query);
        if($result){
           return $result[0];
        }else {
             return false;
        }
    }

    public function delete_post($postid){

        if(!is_numeric($postid)){
            return false;
        }
       
        $query = "DELETE from posts where postid = '$postid' limit 1";

        $DB = new Database();
        $DB->save($query);
        
    }

    public function i_own_post($postid, $userid){

        if(!is_numeric($postid)){
            return false;
        }
       
        $query =  "SELECT * from posts where postid = '$postid' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if(is_array($result)){
            if($result[0]['userid'] == $userid){
                return true;
            }
        }
        return false;
    }
//---who liked function
    public function get_likes($id,$type){

        $DB = new Database(); 
        $type = addslashes($type);

        if(is_numeric($id)){
         //get likes details
            $sql = "SELECT likes from likes where type='$type' && contentid = '$id' limit 1";
            $result = $DB->read($sql);
            if(is_array($result)){

                $likes = json_decode($result[0]['likes'], true); 
                return $likes;
            }
        }

        return false;
    }
// like function **************************************************************
    public function like_post($id, $type, $userid){
     
            $DB = new Database(); // intiating class 
             
            //save likes details
            $sql = "SELECT likes from likes WHERE type='$type' && contentid = '$id' limit 1";
            $result = $DB->read($sql);
            if(is_array($result)){
                $likes = json_decode($result[0]['likes'], true); 
                if(is_array($likes)){
                    $userids = array_column($likes,'userid'); 
        
                    if(!in_array($userid, $userids)){

                        $arr["userid"] = $userid;
                        $arr["date"] = date("Y-m-d H:i:s"); 

                        $likes[] = $arr;
            
                        $likes_string = json_encode($likes); 
                        $sql = "UPDATE likes set likes = '$likes_string' where type='$type' && contentid  = '$id' limit 1 ";
                        $DB->save($sql);
                        //increment the posts table
                        $sql = "UPDATE{$type}s set likes = likes + 1 where {$type}id = '$id' limit 1";
                        $DB->save($sql);
                    
                    }else{
                        //search who and where
                        $key = array_search($userid, $userids);
                        //unset that search
                        unset($likes[$key]);
                        //save again
                        $likes_string = json_encode($likes); 
                        $sql = "UPDATE likes set likes = '$likes_string' where type='$type' && contentid  = '$id' limit 1 ";
                        $DB->save($sql);
                        //decrement the likes number table
                        $sql = "UPDATE {$type}s set likes = likes -1 where {$type}id = '$id' limit 1";
                        $DB->save($sql);
                    }
                }
            }else {//the first entry (likes)
                //var_dump($result. $sql);
                $arr["userid"] = $userid;
                $arr["date"] = date("Y-m-d H:i:s"); //sql date and time
                $arr2[]= $arr; //array inside array
                //convote array into string
                $likes = json_encode($arr2); //to send date to another computer we use json
                $sql = "INSERT into likes (type, contentid, likes) values ('$type','$id','$likes')";
                $DB->save($sql);
                //increment the likes number table
                $sql = "UPDATE {$type} set likes = likes + 1 where {$type}id = '$id' limit 1";
                $DB->save($sql);
                }

    } //END OF LIKE_POST FUNCTION 

    private function create_postid(){
        $length = rand(4,19);
        $number ="";
        for ($i=0; $i < $length; $i++){
            $new_rand = rand(0,9);
            $number = $number .$new_rand;
        }
        return $number;
    }  
}