<?php
session_start();
require_once "admin_guard.php";
include_once "partials/header.php";
require_once "classes/Category.php";
$c = new Category;
$response = $c->view_all_categories();

// echo '<pre>';
// print_r($response);
// echo '</pre>';


?>

        <div class="row" style="min-height: 600px">
                <div class="col-md-3" style="background-color: #031a48;">
                    <div class="text-center p-2 my-3" style="border-bottom: 1px solid white">
                        <img src="../assets/images/dp.png" alt="" width="60" style="border-radius: 30%;">
                        <h4 style="color: white;">Admin</h4>
                    </div>
                    <div class="dashboard p-2">
                        <ul class="">
                            <li class=" ps-2 py-1">
                                <a href="admin_dashboard.php">
                                    <img src="assets/images/home.png" alt="" width="30" style="border-radius: 30%;" class="d-inline-block align-text-top">
                                    Dashboard
                                </a>
                            </li>
                            <li class=" ps-2 py-1">
                                <a href="view_all_users.php"><img src="assets/images/view.png" alt="" width="30" style="border-radius: 30%;" class="d-inline-block align-text-top"> 
                                    View all users</a>
                            </li>
                            <li class="ps-2 py-1">
                                <a href="recipe_category.php"><img src="assets/images/edit.png" alt="" width="30" style="border-radius: 30%;" class="d-inline-block align-text-top">  
                                    Recipe category</a>
                            </li>
                            
                            <li class="ps-2 py-1">
                                <a href="admin_logout.php">
                                    <img src="assets/images/power.png" alt="" width="30" style="border-radius: 30%;" class="d-inline-block align-text-top" > 
                                    Logout
                                </a>
                            </li>
                        </ul>
    
                    </div>
                </div>
            <div class="col-md-8">
               <div class="row my-4">
                    <div class="col-md-11 offset-md-1">
                        <h3 class="text-center">Recipe Categories</h3>
                        
                        <form action="process/process_addcategory.php" method="post">
                            <div class="d-flex justify-content-end mt-4">
                                <div class="me-2">
                                    <input type="text" name="category" class="form-control mb-3" placeholder="Add new category">
                                </div>
                                <div class="mt-1">
                                    <button type="submit" name="subbtn" class="btn btn-outline-info btn-sm">Add Category</button> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 offset-md-1">
                        <h5 class="text-center">List of Categories</h5>
                        <?php
                        if(isset($_SESSION['success'])){
                            echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
                            unset($_SESSION['success']);
                        }
                        ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Action &nbsp; &nbsp;
                                    <button id="edit" class="bg-warning">Click to here to Edit</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($response as $res){
                                    ?>
                                    <tr>
                                        <td><?php echo $res['category_name']?></td>
                                        <td>
                                            <form action="process/category_update.php" method="post" class="action d-none">
                                                <input type="text" name="edit_cat" value="<?php echo $res['category_name']?>">
                                                <input type="hidden" name="cat_id" value="<?php echo $res['category_id']?>">
                                                <input type="submit" name="action" Value="Update" class="btn btn-primary btn-sm">
                                                <input type="submit" name="action" value="Delete" class="btn btn-danger btn-sm">
                                            </form>
                                            
                                        </td>
                                    </tr>
                                    <?php
                                };
                                ?>
                            </tbody>
                        </table>
                    </div>
               </div>
            </div>
        </div>

<?php
    include_once "partials/footer.php";
?>