<?php
require_once "Db.php";

class Comment extends Db{

    private $dbcon;

    public function __construct(){
        $this->dbcon = $this->connect();

    }

    public function store_comment($comment,$id){
        $sql = "INSERT INTO comments(comment,recipe_id,user_id)VALUES(?,?,?)";
        $stmt = $this->dbcon->prepare($sql);
       $stmt->execute([$comment,$id,$_SESSION['user_id']]);
       $result= $this->dbcon->lastInsertId();
       return $result;
    }

    public function get_no_of_comments($recipe_id){
        $sql = "SELECT * FROM comments WHERE recipe_id=?";
        $stmt = $this->dbcon->prepare($sql);
       $stmt->execute([$recipe_id]);
       $result= $stmt->rowCount();
       return $result;
    }

    public function get_all_commentsbyid($recipe_id){
        $sql = "SELECT * FROM comments JOIN users ON comments.user_id=users.id WHERE recipe_id=?";
        $stmt = $this->dbcon->prepare($sql);
       $stmt->execute([$recipe_id]);
       $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
       return $result;
    }
    
}

?>