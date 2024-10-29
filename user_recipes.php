<?php
session_start();
include_once "partials/header.php";
require_once "autoloader.php";
$user = new User;
$r = new Recipe;
$recipes = $r->fetch_user_recipesbyid($_SESSION['user_id']);

$userdeets = $user->get_user_byid($_SESSION['user_id']);
?>
<div class="row mb-5 create-int pb-5" style="min-height: 600px;">
        <?php
        include_once "partials/user_menu.php";
        ?>  
            <div class="col-md-8  mt-3 ">
                <div class="row">
                    <div class="col-md-11 offset-md-1">
                        <div class="row">
                    <h3 class="text-center mb-3"><img src="assets/images/recipec.png" alt="" width="30" style="border-radius: 30%;" class="d-inline-block "> My Recipes</h3>
                <?php
                    if(isset($_SESSION['success'])){
                        echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
                        unset($_SESSION['success']);
                      }
                ?>
                <?php
                    if(isset($_SESSION['warning'])){
                        echo "<div class='alert alert-danger'>".$_SESSION['warning']."</div>";
                        unset($_SESSION['warning']);
                      }
                ?>
                <?php
                if(!empty($recipes)){

                
                    foreach($recipes as $recipe){
                        ?>
                <div class="col-md-4  my-3 p-3 shadow">
                    <img src="uploads/<?php echo $recipe['recipe_cover'];?>" alt="recipe cover pic" class="img-fluid">
                    <h5 ><?php echo $recipe['recipe_name'];?></h5>
                    <p><?php echo substr($recipe['recipe_description'],0,70);?></p>
                    <a href="edit_recipe.php?id=<?php echo $recipe['recipe_id']?>" class="btn btn-sm btn-warning">Edit</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $recipe['recipe_id']?>">
                    Add picture
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $recipe['recipe_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Picture</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" class="add_pic" enctype = "multipart/form-data">
                        
                        <div class="modal-body">
                            <div class="mb-3">
                            <input type="hidden" name="recipe_id"  value ="<?php echo $recipe['recipe_id']?>"> 
                                <input type="file" name="image" class="form-control border-dark recipe_image">
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Upload</button>
                        </div>
                        </form> 
                        </div>
                    </div>
                    </div>
                </div>
                        <?php
                    }
                }
                ?>
                </div>
                </div>
            </div>
            </div>
        </div>
        <?php

include_once "partials/footer.php";
?>