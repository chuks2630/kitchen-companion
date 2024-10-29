<?php
session_start();
include_once "partials/header.php";
require_once "classes/Category.php";
require_once "classes/Recipe.php";
require_once "classes/Restaurant.php";
$r = new Recipe;
$c = new Category;
$rest = new Restaurant;
$recipes = $r->get_all_recipes();
$categories=$c->view_all_categories();
// $rests = $rest->get_restaurants();
// if(is_array($rests)){
//   $restaurants= array_slice($rests->data->data,0,6);
// };

// echo "<pre>";
// print_r($restaurants);
// echo "<pre>";
?>
        <div class="row my-3  ">
          <div class="col text-center py-3">
                  <h2 class=" intro_h">SIMPLE RECIPES FOR EVERYDAY LIFE</h2> 
                </div>
                <form action="" id="search-form">
                  <div class="row gx-0">
                  <div class=" col-md-4 offset-md-3">
                  <input type="text" name="" id="index-input" class="form-control" placeholder="Find a recipe" >
                    </div>
                    <div class="col-md-2">
                      <button class="btn btn-warning  col-10" id="searchbtn">Search</button>
                    </div>
                </div>
            </form>
            </div>
            
        <div class="row intro py-3 px-2">
           <div class="col-md-10 offset-md-1">
              <div class="row" id="recipe-cat">

          <?php foreach($recipes as $recipe){
            if($recipe['recipe_cover']==""){
              continue;
            }else{
            ?>
                <div class="col-md-4 my-4">
                  <a href="recipe_details.php?id=<?php echo $recipe['recipe_id']?>" style="text-decoration: none;">
                    <div>
                      <img src="uploads/<?php echo $recipe['recipe_cover']?>" class="img-fluid" alt='recipe cover pic'>
                    </div>
                  <div class="descriptions pix">
                      <h6 style="color: white;"><?php echo $recipe['recipe_name']?></h6>
                      <p><b>Description</b>: <?php echo substr($recipe['recipe_description'],0,70);?></p>
                  </div>
                  </a>
      
                </div>
                
            <?php
            }
          }?>
              </div>
              </div>
          </div>  
   
      <div class="row mt-3">
          <h3 class="mb-3 text-center intro_h">Restaurants around me </h3>
        <div class="col-md-12">
          <div class="row justify-content-around">
          <?php
          if(isset($restaurants)){
            foreach($restaurants as $restaurant){
              ?>
                <div class="col-md-5 mb-3 p-3 " style="background: white;">
                  <div class="row">
                    <div class="col">
                      <img src="<?php echo $restaurant->squareImgUrl?>" alt='restaurant cover pic' class="img-fluid">
                    </div>
                    <div class="col p-2">
                      <a href="https://www.tripadvisor.com/<?php echo $restaurant->restaurantsId?>.html" class="btn btn-outline-dark mb-1">Visit Restaurant</a>
                      <h5><?php echo $restaurant->name;?></h5>
                      <p>Average Rating: <?php echo $restaurant->averageRating;?></p>
                      <small class="text-muted">Location: <?php echo $restaurant->parentGeoName;?></small>
                    </div>
                  </div>
                </div>
              <?php
            }
          }else{
            echo "<div class='text-center my-3'><p style='font-size: 100px;'>&#128532;</p><h5 class='text-muted'>You need internet connection to view restaurants</h5></div>";
          }
          ?>
          </div>
        </div>
      </div>

      <?php
      include_once "partials/footer.php";
    ?>