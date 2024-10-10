<?php
session_start();
include_once "partials/header.php";
?>

        <div class="row justify-content-center" style="min-height: 500px">
            <div class="col-md-6 mt-5">
                <h3 class="text-center">LOGIN</h3>
                <?php
                    if(isset($_SESSION['warning'])){
                        echo "<div class='alert alert-danger'>".$_SESSION['warning']."</div>";
                        unset($_SESSION['warning']);
                      }
                ?>

                <?php
                    if(isset($_SESSION['success'])){
                        echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
                        unset($_SESSION['success']);
                      }
                ?>
                <form action="process/login_process.php" method="post">
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" >Password</label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
                <div>
                    <button type="submit" name="subbtn" class="btn btn-warning col-8 ms-5">Login</button>
                </div>
            </form>
            </div>
        </div>
   <?php
   require_once "partials/footer.php";
   ?>