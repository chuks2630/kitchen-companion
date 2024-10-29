<?php 
require_once "classes/Category.php";
$cat = new Category;
$categories = $cat->view_all_categories();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"  >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mogra&family=Palanquin+Dark:wght@400;500;600;700&family=Playwrite+NO:wght@100..400&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Tienne:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rasa:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="assets/FA/css/all.css">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css" />
    <title>Kitchen Companion</title>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col mx-0 px-0 border-bottom border-light">
           <!--Navigation-->
          <nav class="navbar navbar-expand-lg mynav p-2 py-3">
            <div class="container-fluid">
              <a class="navbar-brand logo" href="index.php">
                <img src="assets/images/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Kitchen Companion
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item dropdown" style="background-color: #031a48 !important;">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Categories
                    </a>
                    <ul class="dropdown-menu user-profile" style="border-radius: 0px;background-color: #031a48;">
                      <li><a class="dropdown-item category" href="#" data-value = "0">All Categories</a></li>
                      <?php
                        foreach($categories as $value){
                          ?>
                          <li><a class="dropdown-item category" href="#" data-value = "<?php echo $value['category_id']?>" ><?php echo $value['category_name']?></a></li>
                          <?php
                        }
                      ?>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="aboutus.php">About us</a>
                  </li>
              
                </ul>
                <div style="width:3%"></div>
                <?php
                  if(isset($_SESSION['user_id'])){
                    ?>
                    <div class="dropdown user-menu">
                  <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Quick action
                  </a>
                
                  <ul class="dropdown-menu user-profile" style="border-radius: 0px;background-color: #031a48;">
                    <li><a class="dropdown-item" href="user_recipes.php">My recipes</a></li>
                    <li><a class="dropdown-item" href="user_profile.php">Profile</a></li>
                    <li><a class="dropdown-item" href="bookmarks.php">Bookmarks</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  </ul>
                </div>
                    <?php
                  }
                ?>
                
                <?php
                  if(!isset($_SESSION['user_id'])){
                    ?>
                    <div class="ms-1"><a href="login.php" class="nav-link">
                    <img src="assets/images/profile.png" width="30" style="border-radius: 50%;"> Login</a></div>
                    <?php
                  }
                ?>
                
                <div style="width:3%"></div>
              </div>
            </div>
          </nav>
      </div>
    </div>
  