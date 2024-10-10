<?php
require_once "autoloader.php";
if(isset($_POST['userid']) && is_numeric($_POST['userid'])){
    $rcid = $_POST['recipeid'];
    $usid = $_POST['userid'];
    $b = new Bookmark;
    $res = $b->store_bookmark($rcid,$usid);
    if($res > 0){
        $response = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  Recipe added to bookmarks
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
    }
    echo $response;
}





?>