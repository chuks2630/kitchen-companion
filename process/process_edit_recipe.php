<?php
session_start();
require_once "autoloader.php";
require_once "../classes/utility.php";
if(isset($_POST['btnrecipe'])){
    $recipe_name= sanitizer($_POST['recipe_name']);
    $category= $_POST['category'];
    $description= sanitizer($_POST['description']);
    $procedure = $_POST['procedure'];
    
    if(empty($recipe_name) || empty($category) || empty($description) || empty($procedure)){
        $_SESSION['warning'] = "All fields are Required";
        header("location:../user_recipes.php");
        exit();
    }else{
        $recipe = new Recipe;
        // $recipe->validate_upload_file($file,$_SESSION['recipe_id']);
        $recipe->update_recipe($_SESSION['recipe_id'],$recipe_name,$description,$procedure,$category);
            header("location:../user_recipes.php");
            exit();
        
    }
}

?>