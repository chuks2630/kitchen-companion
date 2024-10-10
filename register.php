<?php
session_start();
 include_once "partials/header.php";

?>
  <!--register-->
  <div class="row justify-content-center m-5" id="register">
                <div class="col-md-6">
                    <h3 class="text-center">User Registration</h3>
                    <form action="process/process_register.php" method="post">
                        <?php
                           if(isset($_SESSION['warning'])){
                            echo "<div class='alert alert-danger'>".$_SESSION['warning']."</div>";
                            unset($_SESSION['warning']);
                           }
                        ?>
                        <div class="mb-3">
                            <label for="firstname">First name</label>
                            <input type="text" name="firstname"  class="form-control">
    
                        </div>
                        <div class="mb-3">
                            <label for="lastname">Last name</label>
                            <input type="text" name="lastname"  class="form-control">
    
                        </div>
                    <div class="mb-3">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" id="email" class="form-control">
                        <span id='email_feedback' class='text-danger'></span>

                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="Password" name="pass1" id="Password" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label for="password">Confirm Password</label>
                        <input type="Password" name="pass2" id="Password" class="form-control">

                    </div>
                    <div>
                        <button type="submit" name="register" class="btn btn-primary col-12" id="btnregister">Register</button>
                    </div>
                    </form>
                    <p>Have an account? <a href="login.php">Login</a></p>
                </div>
        </div> 
<?php
 include_once "partials/footer.php";

?>