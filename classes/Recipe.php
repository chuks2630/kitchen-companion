<?php
require_once "Db.php";
class Recipe extends Db{

    private $dbcon;

    public function __construct(){
        $this->dbcon = $this->connect();
    }

    public function create_recipe($name,$description,$procedure,$user_id,$category,$file){

        if($file['name'] !=""){
            $temp = $file['tmp_name'];
            $type = $file['type'];
            $size = $file['size'];
            $allowed = ['png','jpg','jpeg'];
            $filename = $file['name'];
            

            $max_size_allowed = 2 * 1024 * 1024;

         if($size > $max_size_allowed){
                $_SESSION['warning']= "Your file size is too large. The maximum is 2mb";
                exit;
         }
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $newname = "reci".uniqid().".".$extension;
            $to = "../uploads/$newname";
            
            if(!in_array($extension,$allowed)){
                $_SESSION['warning'] = "Please upload either of png, jpg,jpeg";
                return 0;
            }else{
                //insert query
                move_uploaded_file($temp,$to);
                $sql = "INSERT INTO recipes(recipe_name,recipe_description,procedures,user_id,recipe_cat_id,recipe_cover)VALUES(?,?,?,?,?,?)";
                $stmt = $this->dbcon->prepare($sql);
                $stmt->execute([$name,$description,$procedure,$user_id,$category,$newname]);
                $result = $this->dbcon->lastInsertId();
                return $result;
            }
            //updating recipes query 
        }else{
            //insert query
            $sql = "INSERT INTO recipes(recipe_name,recipe_description,procedures,user_id,recipe_cat_id)VALUES(?,?,?,?,?)";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute([$name,$description,$procedure,$user_id,$category]);
            $result = $this->dbcon->lastInsertId();
            return $result;
        }
        
    }

    public function save_recipe($recipe_id){
        $sql = "INSERT INTO saved_recipe(user_id,recipe_id)VALUES(?,?)";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$_SESSION['user_id'],$recipe_id]);
        $_SESSION['success'] = "Recipe added to bookmarks";
    }

    public function fetch_saved_recipes(){
        $sql = "SELECT * FROM saved_recipe JOIN recipes ON saved_recipe.recipe_id=recipes.recipe_id WHERE saved_recipe.user_id =?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$_SESSION['user_id']]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       return $result;
    }

    public function fetch_user_recipesbyid($user_id){
        $sql = "SELECT * FROM recipes JOIN recipe_category ON recipes.recipe_cat_id = recipe_category.category_id  WHERE user_id=?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$user_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function fetch_picby_id($recipe_id){
        $sql = "SELECT * FROM pictures  WHERE picture_recipe_id=?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$recipe_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function fetch_recipesbyid($recipe_id){
        $sql = "SELECT * FROM recipes JOIN recipe_category ON recipes.recipe_cat_id = recipe_category.category_id WHERE recipe_id=?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$recipe_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addPicture($recipe_id,$file){
        if($file['name'] !=""){
            $temp = $file['tmp_name'];
            $type = $file['type'];
            $size = $file['size'];
            $allowed = ['png','jpg','jpeg'];
            $filename = $file['name'];
            

            $max_size_allowed = 2 * 1024 * 1024;

         if($size > $max_size_allowed){
                $_SESSION['error']= "Your file size is too large. The maximum is 2mb";
                exit;
         }
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $newname = "reci".uniqid().".".$extension;
            $to = "../uploads/$newname";
            
            if(!in_array($extension,$allowed)){
                $_SESSION['error'] = "Please upload either of png, jpg,jpeg";
                return 0;
            }else{
                //inserting into pictures query
                move_uploaded_file($temp,$to);
                $sql= "INSERT INTO pictures(picture_recipe_id,picture_file)VALUES(?,?)";
                $stmt = $this->dbcon->prepare($sql);
                $result = $stmt->execute([$recipe_id,$newname]);
                return $result;
            }  
        }else{
            $_SESSION['error'] = "Please select a file to upload";
            return 0;
        }
    }

    public function update_recipe($recipe_id,$name,$description,$procedure,$cat_id){

        $sql = "UPDATE recipes SET recipe_name =?, recipe_description=?, procedures=?, recipe_cat_id=? WHERE recipe_id= ?";
        $stmt = $this->dbcon->prepare($sql);
        $result=$stmt->execute([$name,$description,$procedure,$cat_id,$recipe_id]);
        if($result == true){
            $_SESSION['success'] = "Recipe successfully updated";
       }
        
    }

    public function get_recipes_by_catid($cat_id){
        $sql = "SELECT * FROM recipes WHERE recipe_cat_id=? And status=?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$cat_id,"approved"]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_all_recipes(){
        $sql ="SELECT * FROM recipes WHERE status = ?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute(['approved']);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_search_recipes($search){
        $sql ="SELECT * FROM recipes WHERE recipe_name LIKE ? OR recipe_description LIKE ?";
        $stmt = $this->dbcon->prepare($sql);
        $searchmod = "%$search%";
        $stmt->execute([$searchmod,$searchmod]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

// $r = new Recipe;
// $res = $r->get_recipes_by_catid(1);
// echo "<pre>";
// print_r($res);
// echo "</pre>";

?>