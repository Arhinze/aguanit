<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/php/connection.php");

if(isset($_COOKIE["username_or_email"]) && ((isset($_COOKIE["password"])))){
    $user_id = $_COOKIE["username_or_email"];
    $password = $_COOKIE["password"];

    $stmt = $pdo->prepare("SELECT * FROM miners WHERE (username = ? or email = ?) AND `password` = ?");
    $stmt->execute([$user_id, $user_id, $password]);
    
    $data = $stmt->fetch(PDO::FETCH_OBJ);
        
    } else {
        header("location:/login");
    }