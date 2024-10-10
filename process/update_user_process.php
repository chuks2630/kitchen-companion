<?php
session_start();
require_once "autoloader.php";
require_once "../classes/utility.php";
if(isset($_POST['subbtn'])){

    $firstname = sanitizer($_POST['fname']);
    $lastname = sanitizer($_POST['lname']);
    $gender = $_POST['gender'];
    $bio = sanitizer($_POST['bio']);
    $dp = $_FILES['dp'];
    if(empty($firstname) || empty($lastname) || empty($gender) || empty($bio)){
        $_SESSION['warning'] = "Please all * field are required for profile update";
        header("location:../user_profile.php");
        exit();
    }else{
        $user = new User;
       $user->update_user($firstname,$lastname,$bio,$gender,$dp);
       header("location:../user_profile.php");
        exit();
    }

}else{
    $_SESSION['warning'] = "Please Provide details and submit for profile update";
    header("location:../user_profile.php");
    exit();
}

?>