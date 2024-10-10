<?php
session_start();
include_once "partials/header.php";
require_once "autoloader.php";
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $r = new Recipe;
    $recipedeets = $r->fetch_recipesbyid($id);
    $c = new Comment;
    $comments = $c->get_all_commentsbyid($id);
    $numOfComments = $c->get_no_of_comments($id);
    // print_r($recipedeets);
    $pics = $r->fetch_picby_id($id);
    $_SESSION['recipe_id'] = $id;
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
}else{
    header("location:index.php");
    exit();
}
?>

<div class="row box" style="background-color: white;">
    <div class="col-md-10 offset-md-1 p-3 px-4 my-4 shadow content" style="border: 1px dotted peach;">
        <h3 class="text-center mt-2" style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><img src="assets/images/chef-hat.png" alt="" width="30" style="border-radius: 30%;" class="d-inline-block align-text-top"> Recipe Title: <?php echo $recipedeets['recipe_name']?></h3><br>
            <div class="row">
                <div class="col-md-4 offset-4 p-3 mb-4">
                    <img src="uploads/<?php echo $recipedeets['recipe_cover']?>" alt='recipe cover pic' class="img-fluid">
                </div>
            </div>

    
        <p><?php echo $recipedeets['recipe_description']?></p>
        <p></p>
        <h3 class="text-center" style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><img src="assets/images/clipboard.png" alt="" width="30" style="border-radius: 30%;" class="d-inline-block align-text-top"> Procedures</h3><br>
        <p style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><?php echo $recipedeets['procedures'];?></p>
        <div id="alert"></div>
        <input type="hidden" name="" id="rpid" value="<?php echo $_SESSION['recipe_id']?>">
        <input type="hidden" name="" id="usid" value="<?php  if(isset($_SESSION['user_id'])){ echo $_SESSION['user_id'];}?>">
        <a href="#" class="anchor-book" id="bookmark"><i class="fa-regular fa-heart bookmark-icon p-1"></i></a>
        <div class="row mt-3">
        <?php
            foreach($pics as $pic){
        ?>
        
        <div class="col-md-4">
            <div><img src="uploads/<?php echo $pic['picture_file']?>" alt='recipe pics' class="img-fluid"></div>
        </div>
    
     
    <?php
        }
    ?>
    </div>
    <div class="row my-5">
        <div class="col-md-7">
            <div id="response">

            </div>
            <h5>Leave a Comment</h5>
            <form action="" id="comment">
                <textarea name="comment" id="txt-comment" class="form-control mb-3"></textarea>
                <button type="submit" class="btn btn-sm col-12" style="color:white; background-color: #031a48;" name="subcom">Send</button>
            </form>
        </div>
        <div class="col-md-7 mt-5">       
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
               
            <h6 style="border-bottom: 1px solid #3d405b;" class="mb-3"><?php if($numOfComments > 1){echo $numOfComments." comments";}else{echo $numOfComments." comment";} ;?></h6>
            <?php foreach($comments as $comment){
                ?>
                    <div>
                    <h6 class="my-0">
                        &nbsp;<img src="uploads/<?php echo $comment['dp']?>" alt="dp" width="50" style="border-radius: 50%;" class=" align-text-top">
                        <?php echo $comment['firstname']." ".$comment['lastname'];?></h6>
                        <p class="offset-md-1 text-muted" style="font-size: small;"><?php echo $comment['comment'];?></p>
                
                    </div>
                <?php
            }?>
            
            
        </div>
    </div>
    </div>
    <div>

    </div>
</div>



<?php
    include_once "partials/footer.php";
?>