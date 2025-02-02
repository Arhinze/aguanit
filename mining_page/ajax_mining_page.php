<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/php/connection.php");

$data = false;

if((isset($_GET["un"])) && ((isset($_GET["up"])))){
    $user_id = htmlentities($_GET["un"]);
    $password = htmlentities($_GET["up"]);

    $stmt = $pdo->prepare("SELECT * FROM miners WHERE (username = ? OR user_email = ?) AND `password` = ?");
    $stmt->execute([$user_id, $user_id, $password]);
    
    $data = $stmt->fetch(PDO::FETCH_OBJ);
        
    if ($data) {
        if ($data->mining_status != "active"){

            $update_stmt = $pdo->prepare("UPDATE miners SET mining_status = ?, mining_start_time = ? WHERE `username` = ?");
            $update_stmt->execute(["active", date("Y-m-d h:i:s", time()), $data->username]);

            echo "<div class='pop_up'> Congrats, you've successfully initiated the mining cycle.</div>";
        } else {
            echo "<div class='pop_up'>Your mining cycle is already on.</div>";
        }
    } else {
        echo "<div class='invalid'>stop that nonsense !!!</div>";
    }
} else {
    echo "<div class='invalid'> stop that nonsense ! </div>";
}