<?php
session_start();

if(isset($_SESSION['user_userid'])){
    $_SESSION['user_userid'] = NULL;
    unset($_SESSION['user_userid']);

}
header("location: signin.php");
die;
