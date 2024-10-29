<?php
session_start();
require_once "../classes/Recipe.php";
$recipe = new Recipe;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['recipe_id'];
    $file = $_FILES['image'];

    $response = $recipe->addPicture($id,$file);

    if($response){
        $response = "Picture Upload Successful";
    }



}
echo $response;
?>