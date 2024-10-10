<?php
session_start();
require_once "../classes/utility.php";
require_once "autoloader.php";
require_once "../classes/Comment.php";
if(isset($_POST['comment'])){
   $comment = sanitizer($_POST['comment']);
   if(!empty($comment)){
      $c = new Comment;
      $res = $c->store_comment($comment,$_SESSION['recipe_id']);
      if($res >0){
         $reply = "<div class='alert alert-success'>Post has been sent</div>";
      }
   }
   echo $reply;
}

?>