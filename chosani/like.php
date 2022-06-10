<?php 

    include('autoload.php');
        
    $login = new Login();
    $user_data = $login->check_id($_SESSION['userid']);


    if(isset($_SERVER['HTTP_REFERER'])){
        
        $return_to =  $_SERVER['HTTP_REFERER'];
    }else{
        $return_to = "profile.php";
    }
    

    if(isset($_GET['type']) && isset($_GET['id'])) {
       
        if(is_numeric($_GET['id'])){ 
    //white listing 
            $allowed[] = 'post';
            $allowed[] = 'user';
            $allowed[] = 'comment';

           if(in_array($_GET['type'], $allowed)){

                $post = new Post();
                $user_class = new User();

                $post->like_post($_GET['id'], $_GET['type'], $_SESSION['userid']);
               if($_GET['type'] == "user"){
                //follow_user($id, $type, $user_userid);
                   //$user_class->follow_user($id, $type, $user_userid);
                   $user_class->follow_user($_GET['id'], $_GET['type'], $_SESSION['userid']);
               }
           }
           
        }
    }
    
    header("Location: " . $return_to);
//die;