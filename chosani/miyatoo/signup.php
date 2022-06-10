<?php

    class Signup {
        private $error = "";
        public function evaluate($data) {
            foreach ($data as $key => $value) {
                //if is empty
                if(empty($value)){
                    $this->error = $this->error . $key . " is empty! <br>";
                }
                //if email is invalid
                if($key == "email"){
                    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)){
                        $this->error = $this->error . " invalid email address! <br>";
                    } 
                }
                //if first name has nubmers
                if($key == "fname"){
                    if (is_numeric($value)){
                        $this->error = $this->error . " invalid First name! <br>";

                    }  if (strstr($value," ")){
                        $this->error = $this->error . " invalid First name has spaces! <br>";
                    } 
                }
               
                //if lirst name has a nubmers
                if($key == "lname"){
                    if (is_numeric($value)){
                        $this->error = $this->error . " invalid Last name! <br>";
                    }
                    if (strstr($value," ")){
                        $this->error = $this->error . " invalid last name has spaces! <br>";
                    }  
                }
            }
            // if no error save
            if ($this->error == ""){
                $this->create_user($data);
                } else {
                return $this->error;
            } 
        }

        public function create_user($data) {
            $fname = ucfirst($data['fname']);
            $lname = ucfirst($data['lname']);
            $email = $data['email'];
            $gender = $data['gender'];
            $password = $data['password'];
            
            //create data information
            $url_address = strtolower($fname) . "." . strtolower($lname);
            $userid = $this->create_user_id();
            $query = "INSERT INTO user(userid, first_name, last_name, gender, email, password, url) values ('$userid', '$fname', '$lname','$gender','$email','$password', '$url_address')";
             
           if($query){
            $DB = new Database($data);
            $DB->save($query);
           }else{ 
               //var_dump($query);
           }
            }
        //create user id
        private function create_user_id(){
            $length = rand(4,19);
            $number ="";
            for ($i=0; $i < $length; $i++){
                $new_rand = rand(0,9);
                $number = $number .$new_rand;
            }
            return $number;
        }
    }