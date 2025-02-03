<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/views/Index_Segments.php");

if($data) {
    Index_Segments::header($title="");
?>
    <!-- Every other thing goes here... -->
<?php  
    Index_Segments::footer();
}