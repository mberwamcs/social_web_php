
<?php
    include("dictionary.function.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiziguwa dictionary</title>
</head>
<body>
    <div style="text-align: center;"> 
        <h1>Kiziguwa to English</h1>
        <hr>
        <nav>
            <a href="k_dictionary.php"> Home</a>
        </nav>
        <hr>
            <form action="" method="POST">
                <input type="text" name="word" placeholder="new word here" ><br><br>
                <textarea name="meaning" id="meaning" cols="22" rows="10" placeholder="meaning and exmple here" ></textarea><br>
                <input type="submit" value="Enter" name="submit" style="width: 182px;"><br>
                <input type="submit" value= "View All"name="veiw" style="width: 182px;"><br>
            </form>

            <?php
               
            
                if(isset($_POST['submit'])){
                    $word = $_POST['word'];
                    $meaning = $_POST['meaning'];
            //insert data**************************************
                    if(!empty($_POST['word']) && !empty($_POST['meaning'])){ 
                    $insert = "INSERT INTO dictionary(word, meaning) VALUES ('$word','$meaning')";
                    $result = mysqli_query($connection, $insert);
                    }else {
                        echo "You need to enter a Kizigula word and a English meaning of the word";
                    }
                }
                   
    //read from the DB
                    if(isset($_POST['view'])){ 
                    $read = "SELECT * FROM dictinary";
                    $result = mysqli_query($connection, $insert);
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $data[] = $row;
                            echo $data;
                        }return $data;
                    }
                }
                
            ?>
        </div>
    <!-----------display data from the database------------------------------------------------------------>
                <div>
                    <?php 
                        //
                    ?>
                </div>
        <p><b>Note: </b>Now you can search by letter but we need to be able to search by whole word.</p>
    </div>
</body>
</html>