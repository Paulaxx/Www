<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["type_of_form"])){
        session_start();
        $_SESSION = array();
        session_destroy();
        header("location: index.php");
    }
}

?>