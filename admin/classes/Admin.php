<?php
require_once "Db.php";

class Admin extends Db{

    private $dbcon;

    public function __construct(){
        $this->dbcon = $this->connect();
    }
    // public function register_admin($username,$pass){
    //     $sql ="INSERT INTO admin(admin_username,admin_password)VALUES(?,?)";
    //     $stmt =$this->dbcon->prepare($sql);
    //     $hashpass = password_hash($pass,PASSWORD_DEFAULT);
    //     $stmt->execute([$username,$hashpass]);
    //     $id = $this->dbcon->lastInsertId();
    //     return $id;
    // }
    public function login_admin($username, $pass){
        try{
            $sql = "SELECT * FROM admin WHERE admin_username=? LIMIT 1";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute([$username]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){
                $hashpass = $result['admin_password'];
                $verify_pass = password_verify($pass,$hashpass);
                if($verify_pass){
                    return $result['admin_id'];
                }else{
                    $_SESSION['warning'] = "Incorrect username or password";
                    return 0;
                }
            }else{
                $_SESSION['warning'] = "Incorrect username or password";
                return 0;
            }

        }
        catch(PDOException $e){
            $_SESSION['warning'] = $e->getMessage();
            return 0;
        }catch(Exception $e){
            $_SESSION['warning'] = $e->getMessage();
            return 0;
        }
    }

    public function update_user_status($status, $email){
        $sql = "UPDATE users SET status =? WHERE email= ?";
        $stmt = $this->dbcon->prepare($sql);
        $result = $stmt->execute([$status, $email]);
        return $result;
    }

    public function view_all_users(){
        $sql = "SELECT * FROM users";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function recipe_status($status,$recipe_id){
        $sql =  "UPDATE recipes SET status =? WHERE recipe_id= ?";
        $stmt = $this->dbcon->prepare($sql);
        $result = $stmt->execute([$status, $recipe_id]);
        return $result;
    }
    public function fetch_recipesbyid($recipe_id){
        $sql = "SELECT * FROM recipe_category JOIN recipes ON recipe_category.category_id =recipes.recipe_cat_id JOIN users ON users.id =recipes.user_id WHERE recipe_id=?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$recipe_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_recipe_bystatus($status){
        $sql = "SELECT * FROM recipes JOIN recipe_category ON recipes.recipe_cat_id = recipe_category.category_id WHERE status =?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$status]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_numberofusers(){
        $sql = "SELECT * FROM users";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute();
        $result = $stmt->rowCount();
        return $result;
    }

    public function get_numberofrecipes_bystatus($status){
        $sql =  "SELECT * FROM recipes WHERE status =?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$status]);
        $result=$stmt->rowCount();
        return $result;
    }

    public function get_numberof_categories(){
        $sql = "SELECT * FROM recipe_category";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute();
        $result = $stmt->rowCount();
        return $result;
    }

    public function logout_admin(){
        unset($_SESSION['admin_id']);
        session_unset();
        session_destroy();
    }
}
// $a = new Admin;
// $res = $a->recipe_status("pending","1");
// print_r($res);
?>