<?php
require_once("../classes/User.php");
$u = new User;
//retrieve the email passed from ajax
$email = $_GET['email'];
$check = $u->check_email($email);
if($check){
    echo "Email is in use please pick another one";
};

?>