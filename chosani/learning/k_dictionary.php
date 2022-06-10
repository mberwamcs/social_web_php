DICTIONARY  HTML and some PHP CODE                     DATE 2/11/22
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
    <style>
        th {background-color:beige;}
        #box{
            border: 50px solid black;
            border-top: 50px solid plum;
            border-bottom: 50px solid yellow;
            border-right: 50px solid red;
        }
        #box1{
            border: 50px solid black;
            border-top: 50px solid plum;
            border-left: 50px solid green;
            border-right: 50px solid blue;
        }
    </style>
</head>
<body>
    <div style="text-align: center;">
        
        <h1>Kiziguwa to English</h1>
        <hr>
<!------------MEMEBERS---------------------------------------------------------------------------------------- 
        <div id="member_section"  style="float: right;">
            <a href="new-word.php">Member | login</a>
-------------------------------------------------------------------------------------------------------
        </div>    
       
        

        <div style="width: 40%; text-align: left; margin: auto;" >
            
                <table style="border: 1px solid black; margin:auto; width:100%;">
                    <tr>
                        <th>Kizigula Word</th>
                        <th>English Meaning</th>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td> </td>
                    </tr>
                
                </table>
              

            
        </div>
        <p><b>Note: </b> now you can search by letter but we need to be able to search by whole word.</p>
    </div>
----------CSS PRACTICE---------------------------------------------------------------------->
<div>
    <?php
        //echo $hussein;
        echo( $data);
    ?>
</div>
    <div id="box"></div>
    <div id="box1"></div>
</body>
</html>