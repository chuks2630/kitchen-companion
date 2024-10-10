<?php
spl_autoload_register(function($classname){
    $filename = "classes/$classname.php";
    //always check if file exist before loading it
    if(file_exists($filename)){
        require_once $filename;
    }
});
?>