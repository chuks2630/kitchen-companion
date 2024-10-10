<?php
error_reporting(E_ALL);
require_once("config.php");
class Db{

    private $dbname = DB_NAME;
    private $dbhost = DB_HOST;
    private $dbuser = DB_USERNAME;
    private $dbpass = DB_PASSWORD;
    private $dbconnection;

    

    public function connect(){
        try{
            //connection code goes here
            $dsn = "mysql:host=$this->dbhost;dbname=$this->dbname";
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

            $this->dbconnection = new PDO($dsn, $this->dbuser, $this->dbpass,$options );
            return $this->dbconnection;
        }catch(PDOException $e){
            $e->getMessage();
            return false;
        }
    }//end of connection method

 
}//end of db class



?>