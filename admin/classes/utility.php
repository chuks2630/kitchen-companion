<?php
    function sanitizer($evilstring){
        $safe_string = strip_tags($evilstring);
        $safe_string = addslashes($safe_string);
        $safe_string = htmlspecialchars($safe_string);
        return $safe_string;
    }


?>