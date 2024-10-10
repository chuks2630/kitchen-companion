<?php
session_start();
require_once "../classes/User.php";
require_once "../classes/utility.php";
$u = new User;

if(isset($_POST['login'])){

    $email = sanitizer($_POST['email']);
    $password = sanitizer($_POST['password']);
    $response = $u->login_user($email,$password);
    if($response){
        $_SESSION['user_id'] = $response;
        header("location:../user_dashboard.php");
        exit();
    }else{
        header("location:../login.php");
        exit();
    }

}else{
    $_SESSION['warning'] = "Please provide login details";
    header("location:../login.php");
    exit();
}
?>