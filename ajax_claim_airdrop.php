<?php

//include_once($_SERVER["DOCUMENT_ROOT"]."/php/account-manager.php");
include_once("/home/u590828029/domains/aguanit.com/public_html/php/account-manager.php");

if($data) {
?>

<?
} else {
    echo "<div class='pop_up'> Kindly Login or Sign up now to access this feature </div>";
    //sleep(3000);
    header("location:/login");
}
?>