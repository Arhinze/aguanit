<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/views/Dashboard_Segments.php");
 
Dashboard_Segments::header(); 
Dashboard_Segments::dashboard_footer(); 

if (isset($data)) {
    echo "<br /><br /><br />Everything goes here...<br /><br /><br />";
}
?>