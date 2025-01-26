<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/views/Dashboard_Segments.php");
 
if(($data) || ((isset($_POST["username_or_email"])) && ((isset($_POST["password"]))))) {
    Dashboard_Segments::header(); 
    echo "<br /><br /><br /><br /><br /><br />Everything goes here...<br /><br /><br /><br /><br /><br />";
    Dashboard_Segments::dashboard_footer(); 

    if ((isset($_POST["username_or_email"])) && ((isset($_POST["password"])))) {
        
    }
} else {
    //header("location:$site_url/login");
    echo "Data no dey here o";
}

?>