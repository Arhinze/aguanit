<?php
ini_set("session.use_only_cookies", 1);
include_once("/home/u590828029/domains/aguanit.com/public_html/php/connection.php");

$data = false;

if((isset($_COOKIE["username_or_email"])) && ((isset($_COOKIE["password"])))){
    $user_id = $_COOKIE["username_or_email"];
    $password = $_COOKIE["password"];

    $stmt = $pdo->prepare("SELECT * FROM miners WHERE (username = ? OR user_email = ?) AND `password` = ?");
    $stmt->execute([$user_id, $user_id, $password]);
    
    $data = $stmt->fetch(PDO::FETCH_OBJ);
        
    //} else {
    //    header("location:$site_url/login");
}

// then call 'if data(){ ... }' for all necessary dashboard related page.