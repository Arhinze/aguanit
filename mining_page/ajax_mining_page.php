<?php

if((isset($_GET["un"])) && ((isset($_GET["up"])))){
    $user_id = $_GET["un"];
    $password = $_GET["up"];

    $stmt = $pdo->prepare("SELECT * FROM miners WHERE (username = ? OR user_email = ?) AND `password` = ?");
    $stmt->execute([$user_id, $user_id, $password]);
    
    $data = $stmt->fetch(PDO::FETCH_OBJ);
        
    if ($data) {
        if ($data->status == "inactive") {
            $update_stmt = $pdo->prepare("UPDATE miners SET mining_start_time = ? AND mining_status = ?");
            $stmt->execute([date("Y-m-d h:i:s", time()), "active"]);

            echo "<br /><br /><br /><br /><br /><br /><br /><br />Congrats, you've successfully initiated the mining cycle.";
        } else {
            echo "<br /><br /><br /><br /><br /><br /><br /><br />Your mining cycle is already on.";
        }
    }
} else {
    echo "<br /><br /><br /><br /><br /><br /><br /><br /> stop that nonsense";
}