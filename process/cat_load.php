<?php
require_once "autoloader.php";

if(isset($_POST['category'])){
    $cat_id = $_POST['category'];
    $r = new Recipe;
    if($cat_id==0){
        $res=$r->get_all_recipes();
    }else{
         $res = $r->get_recipes_by_catid($cat_id);
    }
   
    $recipes ="";
    foreach($res as $r){
        if($r['recipe_cover']==""){
            continue;
          }else{
        $rid = $r['recipe_id'];
        $rfile=$r['recipe_cover'];
        $rname = $r['recipe_name'];
        $rdesc = substr($r['recipe_description'],0,100)."...";
        


        $recipes .= "<div class='col-md-4 my-4'>
        <a href='recipe_details.php?id=$rid' class='text-dark' style='text-decoration: none;'><div><img src='uploads/$rfile' class='img-fluid' alt='recipe cover pic'></div><div class='descriptions pix'><h5>$rname</h5><p>$rdesc</p></div></a></div>";
    }
}

    echo $recipes;
}

?>