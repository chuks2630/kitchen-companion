<?php
if(!isset($_SESSION['user_id'])){
    $_SESSION['warning'] = "You must be logged in to access the page";
    header("location:login.php");
    exit();
}

?>