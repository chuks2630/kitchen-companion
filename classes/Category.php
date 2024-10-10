<?php
require_once "Db.php";

class Category extends Db{

    private $dbcon;

    public function __construct(){
        $this->dbcon = $this->connect();
    }

    public function add_category($cat_name){
        $sql = "INSERT INTO recipe_category(category_name)VALUES(?)";
        $stmt = $this->dbcon->prepare($sql);
       $result= $stmt->execute([$cat_name]);
       return $result;
    }
    

    public function edit_category($cat_name, $cat_id){
        $sql = "UPDATE recipe_category SET category_name = ? WHERE category_id = ?";
        $stmt = $this->dbcon->prepare($sql);
        $result = $stmt->execute([$cat_name,$cat_id]);
        return $result;
    }
    public function view_all_categories(){
        $sql = "SELECT * FROM recipe_category";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function delete_category($cat_id){
        $sql = "DELETE FROM recipe_category WHERE category_id =?";
        $stmt = $this->dbcon->prepare($sql);
       $result = $stmt->execute([$cat_id]);
       return $result;
    }
}

// $c = new Category;
// $res = $c->view_all_categories();
//  print_r($res);

?>