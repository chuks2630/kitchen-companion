<?php
session_start();
require_once "admin_guard.php";
include_once "partials/header.php";
require_once "classes/Admin.php";
$a = new Admin;
$response = $a->view_all_recipes();
$numOfUsers = $a->get_numberofusers();
$numOfPending = $a->get_numberofrecipes_bystatus('pending');
$numOfApproved = $a->get_numberofrecipes_bystatus('approved');
$numOfCategory = $a->get_numberof_categories();
// echo '<pre>';
// print_r($response);
// echo '</pre>';


?>

            <div class="row create-int" style="min-height: 600px">
                <div class="col-md-3" style="background-color: #031a48;">
                    <div class="text-center p-2 my-3" style="border-bottom: 1px solid white">
                        <img src="../assets/images/dp.png" alt="" width="60" style="border-radius: 30%;">
                        <h4 style="color: white;">Admin</h4>
                    </div>
                    <div class=" dashboard p-2">
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
                <div class="col-md-9 mt-3">
                    <div class="row">

                        <div class="col-md-10 offset-md-1 mt-3">
                            <div class="row justify-content-center">
                                <div class="col-md-3 p-2  text-center shadow" style="background: white;">
                                    <h3><?php echo $numOfUsers?></h3>
                                    <p><b>Total Registered<br> Users</b></p>
                                </div>
                                <div class="col-md-2 p-2  bg-secondary text-center"  style="color: white;">
                                    <h3><?php echo $numOfPending?></h3>
                                    <p><b>Pending Recipes</b></p>
                                </div>
                                <div class="col-md-2 p-2 bg-secondary text-center "  style="color: white;">
                                    <h3><?php echo $numOfApproved?></h3>
                                    <p><b>Approved Recipes</b></p>
                                </div>
                                <div class="col-md-3 p-2  text-center shadow"  style="background: white;">
                                    <h3><?php echo $numOfCategory?></h3>
                                    <p><b>Total Categories</b></p>
                                </div>
                            </div>  
                        </div>
                    </div>

                    <div class="row mt-5">
                                    <h5  class="text-center">Pending Recipes</h5>
                                    <div class="col-10 offset-md-1 p-2 table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr class="table-dark">
                                                <th>Recipe Name</th>
                                                <th>Description</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Action <br> Approve/Decline</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($response as $res){
                                            ?>
                                            <tr>
                                                <td class="table-success"><?php echo $res['recipe_name']?></td>
                                                <td class="table-warning"><?php echo $res['recipe_description']?></td>
                                                <td class="table-success"><?php echo $res['category_name']?></td>
                                                <td class="table-info"><?php echo $res['status']?></td>
                                                <td class="table-light"><a href="view_recipe_details.php?id=<?php echo $res['recipe_id']?>">View details</a></td>
                                            </tr>
                                            <?php
                                            }
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