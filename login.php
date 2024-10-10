<?php
    session_start();
   include_once "partials/header.php";
   ?>
        <div class="row justify-content-center m-5 " id="login">
            <div class="col-md-6">
                <h3 class="text-center">LOGIN</h3>
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
                <form action="process/process_login.php" method="post">
                <div class="mb-3">
                    <label for="email">Email Address:</label>
                    <input type="text" name="email" id="email" class="form-control">
    
                </div>
                <div class="mb-3">
                    <label for="password">Password:</label>
                    <input type="Password" name="password" id="Password" class="form-control">
    
                </div>
                <div class="mb-2">
                    <button type="submit" name="login" class="btn btn-primary col-12">Login</button>
                </div>
                </form>
                <p>Don't have an account yet? <a href="register.php">Register</a></p>
            </div>
       </div> 
   <?php
   include_once "partials/footer.php";
   ?>