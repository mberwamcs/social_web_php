<?php
   $cornerimage = "image/mile2.jpg";
    if(isset($USER)){ 
        if(file_exists($USER['profile_image'])){
       
        $image_class = new Image();
        $cornerimage = $image_class->get_thumb_profile($USER['profile_image']);
    }else {
        if($USER['gender'] =="Female"){
            $cornerimage = "image/femile2.jpg";
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
    <title>page header</title>
    <style>
        .header {
            height: 60px;
            background-color: #9e5dab;
            padding-top: 5px;
        }
        #main-name {
            font-size:30px;
            color: white;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: bold;
            margin:auto;
            width: 60%;
            height: 100%;
        }
        #signupBtn {
            background-color: rgb(17, 218, 10);
            width: 80px;
            text-align: center;
            padding:5px;
            border-radius: 3px;
            float: right;
        }
        
        #img {
            border-radius: 3px;
        }
   
        #search_box{
            width: 400px;
            height: 20px;
            border-radius: 3px;
            border: 1px solid gray;
            margin-left: 20px;
            background-image: url("image/searching-icon.jpg");
            background-repeat: no-repeat;
            background-position: right;
            background-size:25px;
        }
        #search_box:hover{
            cursor: pointer;
            background-position: 375px 0px;
            background-size:px;
        }
        #a {
            margin: 20px 5px 0;
            float:right;
        }
        #below-hearder {
            background-color: azure;
            width: 600px;
            margin: auto;
            margin-top: 50px;
            text-align: center;
            border-radius: 5px;
            padding: 10px;
        } 
     /************************ end of header style*/ 
    </style>
</head>
<body>
    
<div class="header">
        <div id="main-name"> 
        <a href="index.php" style="color: white;">All-Me</a>

        <input type="text" id="search_box" placeholder="Search for friends">
        <a href="profile.php">
            <img src="<?php echo $cornerimage ?>" alt="" width="35" style="float: right" id="img">
        </a>
        <a href="logout.php">
        <span style="font-size: 15px; float:right; margin:10px; color:white">Logout</span>
        </a>
        </div>

   </div> 
</body>
</html>