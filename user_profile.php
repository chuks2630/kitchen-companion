<?php
session_start();
require_once "autoloader.php";
include_once "partials/header.php";
$user = new User;
$userdeets = $user->get_user_byid($_SESSION['user_id']);

// echo "<pre>";
// print_r($userdeets);
// echo "<pre>";
    
?>
        <div class="row create-int" style="min-height: 600px">
            <?php
            include_once "partials/user_menu.php";
            ?>
            <div class="col-md-8">
                <!-- Profile-->
                <div class="row">
                    <div class="col-md-12 my-3">
                        <h5 class="my-3">Profile Update </h5>
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
                <form method="post" action="process/update_user_process.php" enctype="multipart/form-data">
                    <div class="row mb-3">
                        
                    <label for="fname" class="col-sm-2 col-form-label">First Name <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" name="fname" class="form-control noround border-dark" id="fname" value="<?php echo $userdeets['firstname']?>">
                    </div>
                    <label for="lname" class="col-sm-2 col-form-label">Last Name <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" name="lname" class="form-control noround border-dark" id="lname"  value="<?php echo $userdeets['lastname']?>">
                    </div>
                    
                    </div>
                    <div class="row mb-3">
                    <label for="dp" class="col-sm-2 col-form-label">Profile picture</label>
                    <div class="col-sm-4">
                        <input type="file" name="dp" class="form-control noround border-dark" id="dp" >
                    </div>
                    <label for="gender" class="col-sm-2 col-form-label">Gender <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-select noround border-dark" aria-label="Default select example" name="gender" id="gender">
                            <?php
                                if($userdeets['gender']==1){
                                    ?>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    
                                    <?php
                                }else{
                                  ?>
                                    <option value="2">Female</option>
                                    <option value="1">Male</option>
                                  <?php  
                                }
                                    
                                    
                            ?>
                            
                             
                            </select>
                    </div>
                    
                    </div>
                
                    <div class="row mb-3">
                    
                        <label for="Bio" class="col-sm-2 col-form-label">Bio <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <textarea id="Bio" name="bio" class="form-control border-dark noround"> <?php echo $userdeets['bio']?></textarea>
                        </div>
                    </div>
                
                
                    <div class="row mb-3">
                        
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn custom-btn col-6 noround" name="subbtn">Update Account</button>
                        </div>
                    </div>
                
                
                </form>

            
                    </div>
                </div>
    <!-- End profile-->
            </div>
        </div>
<?php
    include_once "partials/footer.php";
?>
 