<?php
require_once "../classes/Admin.php";
if(isset($_POST['recipe_id'])){
    $status = $_POST['status'];
    $recipe_id = $_POST['recipe_id'];

    $a = new Admin;
    if($status=='Approve'){
        $response = $a->recipe_status('approved',$recipe_id);
        if($response==true){
            echo "Recipe has been approved";
        }
    }else{
        $response = $a->recipe_status('declined',$recipe_id);
        if($response==true){
            echo "Recipe has been declined";
        }
    }
    
    

}

?>