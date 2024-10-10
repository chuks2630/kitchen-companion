<?php
error_reporting(E_ALL);
session_start();
require_once "../classes/User.php";
require_once "../classes/utility.php";

$u = new User;
if(isset($_POST['register'])){
    
    $fname = sanitizer($_POST['firstname']);
    $lname = sanitizer($_POST['lastname']);
    $email = sanitizer($_POST['email']);
    $pass1 = sanitizer($_POST['pass1']);
    $pass2 = sanitizer($_POST['pass2']);

    $check_email = $u->check_email($email);
    if($check_email){
        $_SESSION['warning'] = "Email is in use please pick another one";
        header("location:../register.php");
         exit();
    }elseif(($pass1 != $pass2) || empty($pass1)){
        $_SESSION['warning'] = "Passwords do not match";
        header("location:../register.php");
        exit();
    }elseif(empty($fname) || empty($lname) || empty($email)){
        $_SESSION['warning'] = "One or more fields is empty";
        header("location:../register.php");
        exit();
    }else{
        $u->register_user($fname,$lname,$email,$pass1);
        $_SESSION['success'] = "Account creation successful, please login";
        header("location:../login.php");
        exit();
    }

}else{
    $_SESSION['warning'] = "Please complete the form";
    header("location:../register.php");
    exit();
}


?>