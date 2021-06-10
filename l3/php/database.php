<?php

function connect() {
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "portfolio";
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if(!$conn)
    {
    die("Connection failed: " . mysqli_connect_error());
    }
    new_visitor($conn);
    sum_visites($conn);
    mysqli_close($conn);
}

function show_counter(){
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "portfolio";
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if(!$conn)
    {
    die("Connection failed: " . mysqli_connect_error());
    }
    echo sum_visites($conn);
    mysqli_close($conn);
}

function new_visitor(mysqli $conn){
    $ip = get_ip_address();
    $sql = "SELECT * FROM visitors WHERE id LIKE '$ip';";
    $result = $conn->query($sql);
    if($result == TRUE && $result->num_rows == 0){
        add_visitor($conn, $ip);
    }
    else if($result == TRUE && $result->num_rows > 0){
        increment_counter($conn, $ip);
    }
}

function add_visitor($conn, $ip){

    $sql = $conn->prepare("INSERT INTO visitors(id, counter, last_visit) VALUES (?, ?, ?)");
    $date = date('Y-m-d H:i:s');
    $one = 1;
    $sql->bind_param("sss", $ip, $one, $date);
    $sql->execute();
    $sql->close();
}

function increment_counter($conn, $ip){
    $sql = "SELECT last_visit as last_visit from visitors where id like '$ip';";
    $result = $conn->query($sql);
    if($result == TRUE && $result->num_rows > 0){
        $date = $result->fetch_assoc();
        $date2 = $date['last_visit'];
        if($date2 != date("Y-m-d")){
            $sql1 = "update visitors set counter = (select counter from visitors where id like '$ip')+1 where id like '$ip';";
            $conn->query($sql1);
            $sql2 = "update visitors set last_visit = curdate() where id like '$ip';";
            $conn->query($sql2);
        }
    }
}

function get_ip_address()
{ 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } 
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function sum_visites(mysqli $conn){
    $sql = "SELECT sum(counter) as counter from visitors;";
    $result = $conn->query($sql);
    if($result == TRUE && $result->num_rows > 0){
        $sum = $result->fetch_assoc();
        $sum2 = $sum['counter'];
        return "Licznik odwiedzin: ".$sum2;
    }
}

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = $login_err = "";

function sign_up(){
    global $username_err, $username, $password_err, $password, $confirm_password_err, $confirm_password;

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "portfolio";
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if(!$conn)
    {
    die("Connection failed: " . mysqli_connect_error());
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //username
        if(empty(trim($_POST["username"]))){
            $username_err = "Wpisz login";
        } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
            $username_err = "Login może zawierać tylko litery, liczby i podkreślnik";
        } else{
            $param_username = trim($_POST["username"]);
            $sql = "SELECT id from users where username like '$param_username';";
            $result = $conn->query($sql);
            if($result == TRUE && $result->num_rows > 0){
                $username_err = "Ten login jest już zajęty";
            }
            else{
                $username = trim($_POST["username"]);
            }
        }

        //password
        if(empty(trim($_POST["password"]))){
            $password_err = "Wpisz hasło";    
        } elseif(strlen(trim($_POST["password"])) < 6){
            $password_err = "Hasło musi zawierać conajmniej 6 znaków";
        } else{
            $password = trim($_POST["password"]);
        }

        //confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Potwierdź hasło";     
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Hasła nie są takie same";
            }
        }

        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $userInsert = $username;
            $passInsert = $param_password;

            $sql = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $sql->bind_param("ss", $userInsert, $passInsert);
            $result = $sql->execute();
            if($result == TRUE){
                header("location: sign_in.php");
            }
        }

        mysqli_close($conn);
    }

}

function sign_in(){
    global $username_err, $username, $password_err, $password, $login_err;

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "portfolio";
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if(!$conn)
    {
    die("Connection failed: " . mysqli_connect_error());
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty(trim($_POST["username"]))){
            $username_err = "Wpisz login";
        } else{
            $username = trim($_POST["username"]);
        }

        if(empty(trim($_POST["password"]))){
            $password_err = "Wpisz hasło";
        } else{
            $password = trim($_POST["password"]);
        }

        if(empty($username_err) && empty($password_err)){
            $sql = "SELECT password as password FROM users WHERE username LIKE '$username'";
            $result = $conn->query($sql);
            $sql2 = "SELECT id as id FROM users WHERE username LIKE '$username'";
            $result2 = $conn->query($sql2);
            if($result == TRUE && $result->num_rows == 1 && $result2 == TRUE && $result2->num_rows == 1){
                $hash = $result->fetch_assoc();
                $hashed_password = $hash['password'];

                $id = $result2->fetch_assoc();
                $id2 = $id['id'];
                if(password_verify($password, $hashed_password)){
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['id'] = $id2;
                    $_SESSION['want_delete'] = false;
                    $_SESSION['date'] = date("Y-m-d");
                    $_SESSION['hour'] = date('H:i');
                    $_SESSION['LAST_ACTIVITY'] = time();
                    header("location: index.php");
                }
                else{
                    $login_err = "Nieprawidłowy login lub hasło";
                }
            }
        }
        mysqli_close($conn);
    }
}

function comment(){

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "portfolio";
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if(!$conn)
    {
    die("Connection failed: " . mysqli_connect_error());
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SERVER['REQUEST_METHOD']=='POST' && isset($_POST["my_content"]))
	{
		if(!empty(trim($_POST["my_content"]))){
            $id = $_SESSION['id'];
            $text = trim($_POST["my_content"]);
            $website = explode("/", $_SERVER['REQUEST_URI']);
            $project_name = $website[count($website)-1];
            $sql = $conn->prepare("INSERT INTO comments (user_id, text, comm_date, website_name) VALUES (?, ?, ?, ?)");
            $date = date('Y-m-d H:i:s');
            $text_to_insert = htmlspecialchars($text);
            $sql->bind_param("ssss", $id, $text_to_insert, $date, $project_name);
            $sql->execute();
            $sql->close();
        }
	}
    else if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST["my_content"])){
        header("location: sign_in.php");
    }
}

?>