<?php
    class Database {
        private $host        =  'localhost';
        private $username    =  'root';
        private $password    =  '';
        private $database          =  'all_me';
    //create connection to the database
        function connect(){
            $connection = mysqli_connect( $this->host, $this->username, $this->password, $this->database);
            return $connection;
        }

        //insert data into database
        function save($query){
            $conn = $this->connect();
            $result= mysqli_query($conn,$query);
            if(!$result){
                echo mysqli_error($conn);
                return false;
            }else {
                return true;
            }
        }

        //selectting data from the database
        function read($query){
            $conn = $this->connect();
            
            $result = mysqli_query($conn, $query);
                if(!$result){
                    return false;
                }else {
                    $data = false;
                    while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
                }
                return $data; 
            }
        }
    }
    #call the class: 
    // $DB = new Database;

    #call the functions in the class
    //$DB->name of the function();
?>