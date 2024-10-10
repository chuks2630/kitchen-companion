<?php
require_once "Db.php";

class User extends Db{

    private $dbcon;

    public function __construct(){
        $this->dbcon = $this->connect();
    }

    public function register_user($fname,$lname,$email,$pass){
        $sql ="INSERT INTO users(firstname,lastname,email,pass)VALUES(?,?,?,?)";
        $stmt =$this->dbcon->prepare($sql);
        $hashpass = password_hash($pass,PASSWORD_DEFAULT);
        $stmt->execute([$fname,$lname,$email,$hashpass]);
        $id = $this->dbcon->lastInsertId();
        return $id;
    }

    public function check_email($email){
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->rowCount();
        return $result;
    }

    public function login_user($email, $pass){

        try{
            $sql = "SELECT * FROM users WHERE email=? LIMIT 1";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute([$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){
                $hashpass = $result['pass'];
                $verify_pass = password_verify($pass,$hashpass);
                if($verify_pass){
                    return $result['id'];
                }else{
                    $_SESSION['warning'] = "Incorrect password";
                }
            }else{
                $_SESSION['warning'] = "Invalid email";
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
    public function get_user_byid($id){
        $sql = "SELECT * FROM users WHERE id=?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function update_user($fname,$lname,$bio,$gender,$dp){

        if($dp['name'] !=""){
            $temp = $dp['tmp_name'];
            $type = $dp['type'];
            $size = $dp['size'];
            $allowed = ['png','jpg','jpeg'];
            $name = $dp['name'];
            

            $max_size_allowed = 2 * 1024 * 1024;

         if($size > $max_size_allowed){
                $_SESSION['warning']= "Your file size is too large. The maximum is 2mb";
                exit;
         }
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $newname = "dp".uniqid().".".$extension;
            $to = "../uploads/$newname";
            
            if(!in_array($extension,$allowed)){
                $_SESSION['warning'] = "Please upload either of png, jpg,jpeg";
                return 0;
            }else{
                move_uploaded_file($temp,$to);
                $sql = "UPDATE users SET firstname = ?, lastname =?, bio =?, gender =?, dp=? WHERE id=?";
                $stmt = $this->dbcon->prepare($sql);
                $stmt->execute([$fname,$lname,$bio,$gender,$newname,$_SESSION['user_id']]);
                $_SESSION['success'] = "File uploaded and records updated";
                return 1;
            }
           
        }else{
            $sql = "UPDATE users SET firstname = ?, lastname =?, bio =?, gender =?, dp=? WHERE id=?";
                $stmt = $this->dbcon->prepare($sql);
                $stmt->execute([$fname,$lname,$bio,$gender,"",$_SESSION['user_id']]);
                $_SESSION['success'] = " Records updated";
                return 1;
        }
    }

    public function logout_user(){
        unset($_SESSION['user_id']);
        session_unset();
        session_destroy();
    }
}

?>