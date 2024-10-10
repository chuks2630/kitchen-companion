<?php
session_start();
require_once "../classes/Admin.php";
require_once "../classes/utility.php";

if(isset($_POST['subbtn'])){
    $username = sanitizer($_POST['username']);
    $password = sanitizer($_POST['password']);

    if(empty($username) || empty($password)){
        $_SESSION['warning'] = "All fields are required";
        header("location:../admin_login.php");
        exit();
    }else{
        $a = new Admin;
        $response = $a->login_admin($username,$password);
        $_SESSION['admin_id'] = $response;
        header("location:../admin_dashboard.php");
        exit();
    }
}else{
    $_SESSION['warning'] = "Please complete the form";
    header("location:../admin_login.php");
    exit();
}

?>