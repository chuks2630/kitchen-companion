<?php
session_start();
require_once "../classes/Admin.php";
if(isset($_POST['subbtn'])){
    $email = $_POST['email'];
    $status = isset($_POST['status']) ? $_POST['status'] : "";
    if(empty($email) || empty($status)){
        $_SESSION['warning'] = "Please provide an email and status";
        header("location:../view_all_users.php");
        exit();
    }else{
        $a = new Admin;
        $res = $a->update_user_status($status, $email);
        if($res){
            $_SESSION['success'] = "User status has been Changed";
            header("location:../view_all_users.php");
            exit();
        }
    }


}else{
    header("location:../admin_login.php");
    exit();
}

?>