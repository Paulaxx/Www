<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    session_start();
    if(isset($_POST["type_of_form"])){
        $_SESSION = array();
        session_destroy();
        header("location: index.php");
    }
    else if(isset($_POST["delete_account"])){
        $_SESSION['want_delete'] = true;
        header("location: index.php");
        //dodac przekierowanie na strone na ktorej sie aktualnie jest
    }
    else if(isset($_POST["yes_delete"])){
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "portfolio";
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        if(!$conn)
        {
        die("Connection failed: " . mysqli_connect_error());
        }
        $username = $_SESSION['username'];
        $user_id = $_SESSION['id'];
        $sql2 = "DELETE from comments where user_id like '$user_id';";
        $conn->query($sql2);
        $sql = "DELETE from users where username like '$username';";
        $result = $conn->query($sql);

        $_SESSION = array();
        session_destroy();
        header("location: index.php");
    }
}
?>