<?php
session_start();
require_once("classes/Admin.php");
$admin = new Admin;
$admin->logout_admin();

session_start();
$_SESSION['success'] = "You are now logged out...";
header("location:admin_login.php");
exit();


?>