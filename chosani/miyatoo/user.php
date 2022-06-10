<?php

    class User {
        //a function that gets user's infomation and save it in a variable ($row_user);
        public function get_data($id){
            $query = "SELECT * from user where  user_id = '$id' limit 1";
            $DB = new Database();
            $result = $DB->read($query);
            if($result){
                $row_user = $result[0];
                return $row_user;
            }else {
                return false;
            }
        } 
/*
        public function read_user($id){
            $query = "SELECT * from user where user_id = '$id' limit 1";
            $DB = new Database;
            $result = $DB->read($query);
            if ($result){
                return $result[0];
            }else {
                return false;
            }
        } 
*/
         //a function that gets user's FREINDS and save them in a variable ($freinds);
        public function read_friends($id){
            $query = "SELECT * from user where user_id != '$id' ";
            $DB = new Database;
            $result = $DB->read($query);
            if($result){
                $freinds = $result[0];
                return $freinds;
            }else {
                return false;
            }
        } 

        public function get_following($id,$type){ 

            $DB = new Database(); 
            $type = addslashes($type);

            if(is_numeric($id)){
             //get following details
                $sql = "select following from likes where type='$type' && contentid = '$id' limit 1";
                $result = $DB->read($sql);
                if(is_array($result)){
                    $following = json_decode($result[0]['following'], true); 
                    return $following;
                }
            }
    
            return false;
        }
    // like function **************************************************************
        public function follow_user($id, $type, $user_userid){

                $DB = new Database(); // intiating class  
                //save likes details
                $sql = "select following from likes where type='$type' && contentid = '$user_userid' limit 1";
                $result = $DB->read($sql);
                if(is_array($result)){

                    $likes = json_decode($result[0]['following'], true); 
                   
                    $user_ids = array_column($likes, "userid"); 
            
                        if(!in_array($user_userid, $user_ids)){

                            $arr["userid"] = $id;
                            $arr["date"] = date("Y-m-d H:i:s"); 
    
                            $likes[] = $arr;
                
                            $likes_string = json_encode($likes); 
                            $sql = "update likes set following = '$likes_string' where type='$type' && contentid  = '$user_userid' limit 1 ";
                            $DB->save($sql);
                            
                        }else{
                            //search who and where
                            $key = array_search($user_userid, $user_ids);
                            //unset that search
                            unset($likes[$key]);
                            //save again
                            $likes_string = json_encode($likes); 
                            $sql = "update likes set following = '$likes_string' where type='$type' && contentid  = '$user_userid' limit 1 ";
                            $DB->save($sql);
                        }
                   
                }else {//the first entry (likes)
                    //var_dump($result. $sql);
                    $arr["userid"] = $id;
                    $arr["date"] = date("Y-m-d H:i:s"); //sql date and time

                    $arr2[]= $arr; //array inside array

                    //convote array into string
                    $following = json_encode($arr2); //to send date to another computer we use json
                    $sql = "insert into likes (type, contentid, following) values ('$type','$user_userid','$following')";
                    $DB->save($sql);
                    
                    }
    
        }
    }
?>