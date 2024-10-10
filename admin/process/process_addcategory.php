<?php
session_start();
require_once "../classes/Category.php";

if(isset($_POST['subbtn'])){

    $cat_name = $_POST['category'];
    $c= new Category;
    $res = $c->add_category($cat_name);
    if($res){
        $_SESSION['success'] = "Category has been created!";
        header("location:../recipe_category.php");
        exit();
    }
}else{
    header("location:../recipe_category.php");
    exit();
}
?>