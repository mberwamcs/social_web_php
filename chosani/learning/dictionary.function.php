                    dictionary PHP CODE                     DATE 2/11/22
<?php
$hussein = "Hussein is here";



//connect to the database
     $host        =  'localhost';
     $username    =  'root';
     $password    =  '';
     $database    =  'account';
//create connection to the database
   
    $connection = mysqli_connect( $host, $username, $password, $database);
    // check if connection is good
    if(!$connection){
        return false;
    }
        $query = "SELECT * FROM `dictionary`";
        $result = mysqli_query($connection, $query);
        if($result){ 
            while($row = mysqli_fetch_assoc($result)){
                $data = $row['word']. " ".$row['meaning'];
        //print_r(" ". $data);
                }

            }
     //return 

        

?>