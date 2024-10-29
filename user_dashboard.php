<?php
session_start();
require_once "user_guard.php";
include_once "partials/header.php";
require_once "autoloader.php";
$user = new User;
$userdeets = $user->get_user_byid($_SESSION['user_id']);

?>
        <div class="row mb-5 create-int pb-5" style="min-height: 600px">
           <?php
           include_once "partials/user_menu.php";
           ?>
            <div class="col-md-8  mt-3 ">
           
                <div class="row ms-5 dash">
                <h5 class="mt-2">
                    Welcome
                       <?php
                       echo $userdeets['firstname']." ".$userdeets['lastname'];
                       ?> 
                    </h5>
                    <p>
                        We're thrilled to have you back in your kitchen hub!
                        </p>
                        <ul class="">
                            <li><b>Your Recipe Collection:</b> Browse and manage your saved recipes and favorites.</li>
                            <li><b>Discover New Recipes:</b> Find fresh inspiration and exciting new dishes to try.</li>
                        </ul>
                        <p> Need any help or have questions? Our culinary support team is here for you. Happy cooking!</p>
                        
                    

            </div>
            </div>
        </div>
        <?php

include_once "partials/footer.php";
?>