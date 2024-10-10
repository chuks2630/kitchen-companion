<?php
session_start();
include_once "partials/header.php";
require_once "autoloader.php";
$user = new User;
$cat = new Category;
$userdeets = $user->get_user_byid($_SESSION['user_id']);
$recipe_category = $cat->view_all_categories();
// echo "<pre>";
// print_r($recipe_category);
// echo "</pre>";

?>
<div class="row mb-5 create-int pb-5" style="min-height: 600px">
    <?php
    include_once "partials/user_menu.php";
    ?>

           
<!--endd-->
            <div class="col-md-9  mt-3 ">

                <div class="row ">
                    <div class="col-md-12">
                    <div class="row">
                    <h3 class="text-center mb-5"><img src="assets/images/create.png" alt="" width="30" style="border-radius: 30%;" class="d-inline-block"> Create New Recipe</h3>
                    <form action="process/process_new_recipe.php" method="post" enctype="multipart/form-data">
                    <div class=" col-sm-8 offset-sm-2 mb-3 p-2">
                        <input type="text" name="recipe_name" class=" form-control recipe-inp p-2" placeholder="Enter Recipe Name">
                    </div>
                    <div class=" col-sm-8 offset-sm-2  mb-3 p-2">
                    <select name="category" id="" class="form-select">
                        <option value="">Please pick a category</option>
                        <?php
                            foreach($recipe_category as $category ){
                                ?>
                                <option value="<?php echo$category['category_id']?>"> <?php echo $category['category_name']?></option>
                                <?php
                            }
                        ?>
                    </select>
                    </div>
                    <div class="col-sm-8 offset-sm-2 mb-3 p-2">
                        <label for="cover" class="text-start">Recipe cover Image<br> <span style="font-size: small; color: red;">(**Note that any recipe without a cover image will not be approved and/or won't be displayed on the homepage )</span></label>
                        <input type="file" name="cover" id="cover"  class="form-control mt-2">
                    </div>
                    <div class=" col-sm-8 offset-sm-2 mb-3 p-2">
                    <textarea name="description" id="" placeholder="Enter brief description" class="form-control p-2"></textarea>
                    </div>
                    <div class="col-sm-8 offset-sm-2 mb-3 p-2">
                        <textarea name="procedure"  placeholder="Enter procedures" class="form-control editor"></textarea>
                    </div>
                    
                    <div class="col-sm-8 offset-sm-2 p-2">
                    <button type="reset" class="btn  btn-outline-danger p-2">Clear all fields</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" name="btnrecipe" class="btn  btn-success col-8 ">Create Recipe</button>
                    </div>
                    
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?php

include_once "partials/footer.php";
?>