<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/views/Dashboard_Segments.php");
 
if (isset($data)) {
    Dashboard_Segments::header(); 
    echo "<br /><br /><br /><br /><br /><br />Everything goes here...<br /><br /><br /><br /><br /><br />";
    Dashboard_Segments::dashboard_footer(); 
}
?>