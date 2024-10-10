<div class="col-md-2" style="background-color: #031a48;">
                <div class=" text-center p-3   my-3" style="border-bottom: 1px solid white">
                <img src="uploads/<?php echo $userdeets['dp']?>" alt="" width="100" style="border-radius: 50%;">
                    <h4 style="color: white;" class="mt-2">
                       <?php
                       echo $userdeets['firstname']
                       ?> 
                    </h4>
                </div>
                <div class="d-flex flex-column  p-2 dashboard p-2">
                    <ul class="flex-column">
                        <li class=" ps-2 py-1">
                            <a href="user_dashboard.php">
                                <img src="assets/images/home.png" alt="" width="30" style="border-radius: 30%;" class="d-inline-block align-text-top">
                                Dashboard
                            </a>
                        </li>
                        <li class=" ps-2 py-1">
                            <a href="user_recipes.php"><img src="assets/images/recipec.png" alt="" width="30" style="border-radius: 30%;" class="d-inline-block align-text-top"> 
                                My Recipes</a>
                        </li>
                        <li class=" ps-2 py-1">
                            <a href="bookmarks.php"><img src="assets/images/bookmark.png" alt="" width="30" style="border-radius: 30%;" class="d-inline-block align-text-top"> 
                                Bookmarks</a>
                        </li>
                        <li class="ps-2 py-1">
                            <a href="user_profile.php"><img src="assets/images/edit.png" alt="" width="30" style="border-radius: 30%;" class="d-inline-block align-text-top">  
                                Profile</a>
                        </li>
                        <li class=" ps-2 py-1">
                            <a href="create_recipe.php"><img src="assets/images/create.png" alt="" width="30" style="border-radius: 30%;" class="d-inline-block align-text-top"> 
                                Create Recipe</a>
                        </li>
                        <li class="ps-2 py-1">
                            <a href="logout.php">
                                <img src="assets/images/power.png" alt="" width="30" style="border-radius: 30%;" class="d-inline-block align-text-top" > 
                                Logout
                            </a>
                        </li>
                    </ul>

                </div>
            </div>