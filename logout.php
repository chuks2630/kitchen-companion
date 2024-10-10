<?php
session_start();
require_once("classes/User.php");
$user = new User;
$user->logout_user();

session_start();
$_SESSION['success'] = "You are now logged out...";
header("location:login.php");
exit();

/**Go to partials/header.php and link the logout link to this page */
?>