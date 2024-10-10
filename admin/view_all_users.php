<?php
session_start();
require_once "admin_guard.php";
include_once "partials/header.php";
require_once "classes/Admin.php";
$c = new Admin;
$response = $c->view_all_users();

// echo '<pre>';
// print_r($response);
// echo '</pre>';


?>

        <div class="row mb-5" style="min-height: 600px">
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
               <div class="row mt-3">
                    <h3 class="text-center mb-4">Registered Users</h3>
                    <div class="col-md-11 offset-md-1 mb-5 mt-3">
                        <form action="process/user_status_process.php" method="post">
                        <div class="d-flex mb-3 justify-content-end">
                            <div class="me-3 col-md-4">
                            <input type="text" name="email" class="form-control mb-3" placeholder="Provide user Email to change status">
                            <input type="radio" name="status" id="" value="blocked" checked>Block &nbsp;
                            <input type="radio" name="status" value="active">UnBlock
                            </div>
                            <div class="col-md-2">
                            <button type="submit" class=" btn btn-outline-dark btn-sm mt-1" name="subbtn">Change status</button>
                            </div>
                        </div>   
                        </form>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-11 offset-md-1 table-responsive">
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
                            <p>All registered user accounts are displayed below, please refer to the form above to change a user's status</p>
                            <?php
                            if(isset($_SESSION['success'])){
                                echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
                                unset($_SESSION['success']);
                            }
                        ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="table-warning">
                                    <th>FullName</th>
                                    <th>Email address</th>
                                    <th>Current Status<br> (acive/blocked)</th>
                                    <th>Date Joined</th>
                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($response as $res){
                                    $reg = strtotime($res['date_reg']);
                                    ?>
                                    <tr class="table-<?php if($res['status']=='active'){echo 'success';}else{echo 'danger';}?>">
                                        <td><?php echo $res['firstname']." ".$res['lastname']?></td>
                                        <td><?php echo $res['email']?></td>
                                        <td><?php echo $res['status']?></td>
                                        <td><?php echo date("F j Y",$reg)?></td>
                                        
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
