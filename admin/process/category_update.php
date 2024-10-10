<?php
session_start();
require_once "../classes/Category.php";
if(isset($_POST['action'])){
    $cat_id = $_POST['cat_id'];
    $cat_name = $_POST['edit_cat'];
    $c = new Category;
    if($_POST['action']=="Update"){
        $res = $c->edit_category($cat_name, $cat_id);
        if($res){
            $_SESSION['success'] = "Category has been updated!";
            header("location:../recipe_category.php");
            exit();
        }
    }elseif($_POST['action']=="Delete"){
        $res = $c->delete_category($cat_id);
        if($res){
            $_SESSION['success'] = "Category has been deleted!";
            header("location:../recipe_category.php");
            exit();
        }
    }


}else{
    header("location:../recipe_category.php");
    exit();
}

?>