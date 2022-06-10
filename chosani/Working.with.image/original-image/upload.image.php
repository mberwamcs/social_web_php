<?php

function resize_image($image, $max_image) {

    if(file_exists($image)) {
        $original_image = imagecreatefromjpeg($image);

        //what is the resolution
        $original_width = imagesx($original_image);
        $original_height = imagesy($original_image);

       //try width first 
        $ratio = $max_image/ $original_width ;   
        $new_width = $max_image;
        $new_height = $original_height * $ratio;

        //if it didnot work
        if($new_height > $max_image){
            $ratio = $max_image/ $original_height ;   
            $new_height = $max_image;
            $new_width = $original_width * $ratio;
        }

        if($original_image){
            $new_image = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
        
            imagejpeg($new_image, $image, 90);

            
        }
    }
}
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_FILES['image']['name'])) {
        
            foreach($_FILES['image'] as $key => $value){
            move_uploaded_file($_FILES['image']['tmp_name'], $_FILES['image']['name']);

             $image = $_FILES['image']['name'];

             resize_image($image, 200);

            echo "<img src='$image'>";
            //var_dump($image);

            }
        }
    }   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Location: http://localhost/social_website/chosani/Working.with.image/original-image/upload.image.php <hr>
    <h1>Original image</h1> <br>
    <h3>Upload image</h3>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="upload" name="upload">

    </form>
    <div>
        <?php

        ?>
    </div>

   
</body>
</html>