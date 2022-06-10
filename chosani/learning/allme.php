<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All me </title>
    <style>
        body{
            padding-top: 0; background-color: #03cffcf4; margin: auto;
        }
/*-----------------------wave disgn --------------------------------------------------- */
    ib{
        background-color: #902484;
    }
    .main-top {
    position: absolute;
    bottom: 0%;
    top: 40%;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    transform: rotate(0deg);
}

.main-top svg {
    position: absolute;
    display: block;
    width: calc(127% + 1.3px);
    height: 45%;
    /*background-color: #152;*/
}

.main-top .shape-fill {
    fill: #4d1cd4db;
}
/*-------END----------------wave disgn ------------------------------------------------- */
        #main-bottom, #main-top {
            width: 100%; margin: auto; min-height: 260px; 
        }
        #main-top{
            background-color: #4d1cd4db;
        }
        .main-header, a{
            color: white; text-decoration: none;
        }
        .main-header {
            width: 100%; background-color: #5142edf4; height: 60px;  padding-top: 15px;
        }
        .main-name{
            padding: 25px 30px; font-size:35px; font-weight: bolder;
        }
        .nav {
            float: right; padding: 10px 25px;
        }
        a {
            margin: 10px;
        }
        .main-welcome {
            width: 100%; text-align: center; font-size: 1.6em;
        }
        .welcome{
            margin-bottom: 0px; width: 100%; color: #e5ede4;
        }

/*-------------bottom part of the webside -------------------------------------------------------------------------------*/
        #main-bottom {
            text-align: center; padding-top: 50px;
        }
        
        .option{
            margin: 0px; display: inline-block; width: 150px; height: 150px; border: 1px solid black; background-color: #7b9678f4; 
            border-radius:50% 0% /10% 30%  35% 0%; position: relative;
        }
    </style>
</head>
<body>
<div>
    </div>
    <div class="main-top">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
            
    </div>
    <div id="main-top">
        <div class="main-header"> <span class="main-name">All-Me</span> 
            <div class="nav">
                <a href="">Home</a>
                <a href="">About</a>
                <a href="">Contect</a>
                <a href="">Member</a>
            </div>
        </div>
        <br>
        <div class="main-welcome"><br>
            <span class="welcome">Awesome...</span><br>
            <form action="">
                <input type="text" style=" border-radius: 2px; border:none; width:300px; padding:4px; margin-right: 0px;">
                <input type="submit" value="Search" style=" border-radius: 2px; border:none; padding:4px; margin-left: 0px;">
            </form>
        </div>
    </div>
<!-------------bottom part of the webside ------------------------------------------------------------------------------->
        <br><br><br>
    <div id="main-bottom">
        <a href=""><div class="option">Videos</div></a>
        <a href=""><div class="option">Business</div></a>
        <a href=""><div class="option">Social</div></a>
        <a href=""><div class="option">Learning</div></a>
    </div>
</body>
</html>