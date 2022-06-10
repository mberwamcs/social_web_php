<?php
    class Login {
        private $error = "";
    
        public function evaluate($data) {
            
            $email = addsLashes($data['email']);
            $password = addsLashes($data['password']);
            
            $query = "SELECT * FROM user WHERE email = '$email' limit 1";

            $DB = new Database();
            $result = $DB->read($query);
            if ($result){
               /* echo "<pre>";
                var_dump($result);
                echo "</pre>";
                //die;*/
                $row = $result[0];
            //    if ($password == $row['password']) - before hashed password
                if ($password == $row['password']){
                    //create session data
                    $_SESSION['userid'] = $row ['userid'];
                   // $_SESSION['user_username'] = $row ['First_name'];

                }else {
                    $this->error .= "password incorrect! <br>";
                }
            } else {
               $this->error .= "No such email was found <br>";
            }
            return $this->error;
        }
    //password AS TEXT
        private function hash_text($text){
            $text = hash("sha1", $text);
            return $text;
        }
        public function check_id($id) {
            if(is_numeric($id)) {
                $query = "SELECT * FROM user WHERE userid = '$id' limit 1";

                $DB = new Database();
                $result = $DB->read($query);
                if($result){
                    $user_data = $result[0];
                    return $user_data;
                }else{
                    //header("location: signin.php");
                   // die;
                } 
            }else{
                header("location: signin.php");
                die;
            }
        }       
    }

?>