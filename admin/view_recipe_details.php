<?php
session_start();
require_once "admin_guard.php";
include_once "partials/header.php";
require_once "classes/Admin.php";
if(isset($_GET['id'])){
    $recipe_id = $_GET['id'];
    $a = new Admin;
    $result =$a->fetch_recipesbyid($recipe_id);
}
// echo '<pre>';
// print_r($result);
// echo '</pre>';
?>

        <div class="row mt-4">
            <div class="col-md-8 offset-md-3">
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <img src="../uploads/<?php echo $result['recipe_cover']?>" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h3>Recipe name: <?php echo $result['recipe_name']?></h3>
                        <span>Category:  <?php echo $result['category_name']?></span>
                        <p><b>By: <?php echo $result['firstname'].' '.$result['lastname']?></b></p>
                        <h5>Description</h5>
                        <p><?php echo $result['recipe_description']?></p>
                        <h5>Procedures</h5>
                        <p><?php echo $result['procedures']?></p>
                    </div>
                </div>
                <div class="col offset-md-3 mb-3">
                    <input type="button" value="Approve" class="btn btn-success">&nbsp;&nbsp;
                    <input type="button" value="Decline" class="btn btn-danger">
                    <p id="response" class="mt-2 text-info"></p>
                    <a href="admin_dashboard.php">Go back to dashboard</a>
                </div>
            </div>
        </div>

<?php
    include_once "partials/footer.php";
?>