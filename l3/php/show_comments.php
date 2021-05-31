<?php
    $website = explode("/", $_SERVER['REQUEST_URI']);
    $project_name = $website[count($website)-1];

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "portfolio";
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if(!$conn)
    {
    die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT user_id, comm_date, text FROM comments WHERE website_name LIKE '$project_name';";
    $result = $conn->query($sql);
    if($result == TRUE && $result->num_rows > 0){
        $rows = array();
        while($row = $result->fetch_assoc())
            $rows[] = $row;
        foreach($rows as $row){
            $sql2 = "SELECT username as username FROM users WHERE id LIKE ".$row['user_id'].";";
            $result2 = $conn->query($sql2);
            if($result2 == TRUE && $result2->num_rows > 0){
                $date = $result2->fetch_assoc();
                $username = $date['username'];
                echo "<div style='border: 1px solid #e8e8e8; padding: 10px;'><b>".$username.", ".$row['comm_date']."</b><br>".$row['text']."</br></div>";
            }
        }
    }
?>