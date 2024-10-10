<?php
session_start();
require_once "../classes/utility.php";
require_once "autoloader.php";
if(isset($_POST['btnrecipe'])){
    $recipe_name= sanitizer($_POST['recipe_name']);
    $category= $_POST['category'];
    $description= sanitizer($_POST['description']);
    $procedure = $_POST['procedure'];
    $cover = $_FILES['cover'];

    if(empty($recipe_name) || empty($category) || empty($description) || empty($procedure)){
        $_SESSION['warning'] = "All fields are Required";
        header("location:../create_recipe.php");
        exit();
    }else{
        $user_id = $_SESSION['user_id'];
        $recipe = new Recipe;
        $response = $recipe->create_recipe($recipe_name,$description,$procedure,$user_id,$category,$cover);
        if($response){
            $_SESSION['success'] = "Recipe created successfully";
            header("location:../user_recipes.php");
            exit();
        }
    }

}else{
    $_SESSION['warning'] = "Please complete the fields to create a recipe";
    header("location:../create_recipe.php");
    exit();
}

?>