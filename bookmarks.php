<?php
session_start();
include_once "partials/header.php";
require_once "autoloader.php";
$user = new User;
$userdeets = $user->get_user_byid($_SESSION['user_id']);
$r = new Recipe;
$recipes = $r->fetch_saved_recipes();

// echo "<pre>";
// print_r($recipes);
// echo "</pre>";


?>
        <div class="row mb-5 create-int pb-5" style="min-height: 600px">
           <?php
           include_once "partials/user_menu.php";
           ?>
            <div class="col-md-8  mt-3 ">
                <div class="row">
                    <h3 class="text-center"><img src="assets/images/bookmark.png" alt="icon" width="30" style="border-radius: 30%;" class="d-inline-block">  Bookmarks</h3>
                    <?php
                if(!empty($recipes)){

                
                    foreach($recipes as $recipe){
                        ?>
                <div class="col-md-4 my-3 p-3 px-4 recipe-display shadow">
                    <img src="uploads/<?php echo $recipe['recipe_cover']?>" alt='recipe cover pic' class="img-fluid">
                    <h5 ><?php echo $recipe['recipe_name'];?></h5>
                    <p><?php echo substr($recipe['recipe_description'],0,100);?></p>
                    <a href="recipe_details.php?id=<?php echo $recipe['recipe_id']?>" class="btn btn-sm btn-warning">View Details</a>
                </div>
                        <?php
                    }
                }
                ?>
            </div>
            </div>
        </div>
        <?php

include_once "partials/footer.php";
?>