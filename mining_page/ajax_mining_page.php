<?php

$dbhost = "localhost";
$dbname = "u590828029_mining_site";
$dbuser = "u590828029_CryptoMiner";
$dbpass = "...CryptoMiner9...";

$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$site_name = "Aguanit Token";
$site_url="https://aguanit.com";
$site_url_short="aguanit.com";
$site_mining_page_url = "https://mine.aguanit.com";

define("SITE_NAME", "Aguanit");
define("SITE_NAME_SHORT", "Aguanit");
define("SITE_URL", "https://aguanit.com");
define("SITE_URL_SHORT", "aguanit.com");
define("SITE_MINING_PAGE_URL", "https://mine.aguanit.com");

date_default_timezone_set('Europe/Malta');
ini_set("display_errors", '1');

$data = false;

if((isset($_GET["un"])) && ((isset($_GET["up"])))){
    $user_id = htmlentities($_GET["un"]);
    $password = htmlentities($_GET["up"]);

    $stmt = $pdo->prepare("SELECT * FROM miners WHERE (username = ? OR user_email = ?) AND `password` = ?");
    $stmt->execute([$user_id, $user_id, $password]);
    
    $data = $stmt->fetch(PDO::FETCH_OBJ);
        
    if ($data) {
        if ($data->mining_status != "active"){
            $sel_upd_stmt = $pdo->prepare("SELECT * FROM miners WHERE username = ?");
            $sel_upd_stmt->execute([$data->username]);

            $sel_upd_data = $sel_upd_stmt->fetch(PDO::FETCH_OBJ);

            if ($sel_upd_data) {
                echo "<br /><br /><br /><br /><br /><br /> User Exists".$data->mining_status;
            }

            $update_stmt = $pdo->prepare("UPDATE miners SET mining_status = ? AND mining_start_time = ? WHERE `username` = ?");
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