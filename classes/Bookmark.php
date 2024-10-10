<?php
require_once "Db.php";

class Bookmark extends Db{
    private $dbcon;

    public function __construct(){
        $this->dbcon = $this->connect();

    }

    public function store_bookmark($recipeid,$userid){
        $sql = "INSERT INTO saved_recipe(recipe_id,user_id)VALUES(?,?)";
        $stmt = $this->dbcon->prepare($sql);
       $stmt->execute([$recipeid,$userid]);
       $result= $this->dbcon->lastInsertId();
       return $result;
    }

    public function get_bookmarks_byuserid($id){
        $sql = "SELECT * FROM saved_recipe WHERE user_id=?";
        $stmt = $this->dbcon->prepare($sql);
       $stmt->execute([$_SESSION['user_id']]);
       $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
       return $result;
    }
}

?>