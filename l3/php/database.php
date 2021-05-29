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
    $sql = "INSERT INTO visitors VALUES ('$ip', 1, curdate())";
    $conn->query($sql);
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

?>