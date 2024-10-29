<?php
session_start();
require_once "user_guard.php";
include_once "partials/header.php";
require_once "autoloader.php";
$cat = new Category;
$user = new User;
$userdeets = $user->get_user_byid($_SESSION['user_id']);
if(isset($_GET['id'])){
    $recipe_id = $_GET['id'];
    $r = new Recipe;
    $recipe_category = $cat->view_all_categories();
    $recipe = $r->fetch_recipesbyid($recipe_id);
    $recipe_pics = $r->fetch_picby_id($recipe_id);
    $_SESSION['recipe_id'] = $recipe_id;
}else{
    header("location:user_recipes.php");
    exit();
}

?>
        <div class="row mb-5 create-int pb-5">
 <?php include_once "partials/user_menu.php";
     ?>
            <div class="col-md-9  mt-3 ">
                <div class="row">
                    <div class="col-12">                 
                        <h3 class="text-center mb-5">Edit Recipe</h3>
                        <div class="row">
                            <div class="col-md-4 mb-3 offset-md-4">
                                <img src="uploads/<?php echo $recipe['recipe_cover']?>" alt="recipe cover" class='img-fluid'>
                            </div>
                            <form action="process/process_edit_recipe.php" method="post" enctype="multipart/form-data">
                                <div class="col-md-8 offset-md-2 mb-3">
                                    <input type="text" name="recipe_name" value="<?php echo $recipe['recipe_name']?>" class="form-control border-dark" placeholder="Enter Recipe Name">
                                </div>
                                <div class=" col-md-8 offset-md-2 mb-3">
                                        <label for="" >Change category</label>
                                            <select name="category" id="" class="form-select">
                                                <option value="<?php echo $recipe['category_id']?>"><?php echo $recipe['category_name']?></option>
                                                <?php
                                                    foreach($recipe_category as $category ){
                                                        if($category['category_name'] == $recipe['category_name']){
                                                            continue;
                                                    ?>      
                                                        <option value="<?php echo$category['category_id']?>"> <?php echo $category['category_name']?></option>
                                                        <?php
                                                        }
                                                        
                                                    
                                                    }
                                                ?>
                                            </select>
                                </div>
                    
                                <div class="col-md-8 mb-3 p-2 offset-md-2">
                                <textarea name="description"  placeholder="Enter description" class="form-control border-dark"><?php echo $recipe['recipe_description']?></textarea>
                                </div>
                                <div class="col-md-8 mb-3 p-2 offset-md-2">
                                <textarea name="procedure"  placeholder="Enter procedures" class="form-control editor border-dark"><?php echo htmlspecialchars($recipe['procedures'], ENT_QUOTES, 'UTF-8');?></textarea>
                                </div>
                                <div class="col-md-8 offset-md-2 mb-3">
                                    <button type="reset" class="btn btn-sm btn-danger">Clear all fields</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" name="btnrecipe" class="btn  btn-outline-success col-8">Update Recipe</button>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-md-8 offset-md-2 mb-3">
                                <div class="row">
                                    <p class="text-center">Other recipe images</p>
                            <?php
                            if(!empty($recipe_pics)){
                                foreach($recipe_pics as $pics){
                            
                                
                                ?>
                                <div class="col-4">
                                    <img src="uploads/<?php echo $pics['picture_file']?>" alt="" class="img-fluid" >
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
            </div>
        </div>
        <?php
        include_once "partials/footer.php";
        ?>