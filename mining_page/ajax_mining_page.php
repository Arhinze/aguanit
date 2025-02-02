<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/php/connection.php");

if((isset($_GET["un"])) && ((isset($_GET["up"])))){
    $user_id = htmlentities($_GET["un"]);
    $password = htmlentities($_GET["up"]);

    $stmt = $pdo->prepare("SELECT * FROM miners WHERE (username = ? OR user_email = ?) AND `password` = ?");
    $stmt->execute([$user_id, $user_id, $password]);
    
    $data = $stmt->fetch(PDO::FETCH_OBJ);
        
    if ($data) {
        if ($data->mining_status === "inactive") {
            $update_stmt = $pdo->prepare("UPDATE miners SET mining_status = ? AND mining_start_time = ? WHERE username = ?");
            $update_stmt->execute(["active", date("Y-m-d h:i:s", time()), $data->username]);

            echo "<br /><br /><br /><br /><br /><br /><br /><br />Congrats, you've successfully initiated the mining cycle.";
        } else {
            echo "<br /><br /><br /><br /><br /><br /><br /><br />Your mining cycle is already on.";
        }
    } else {
        echo "<br /><br /><br /><br /><br /><br /><br /><br /> stop that nonsense !!!";
    }
} else {
    echo "<br /><br /><br /><br /><br /><br /><br /><br /> stop that nonsense";
}