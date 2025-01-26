<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/views/Dashboard_Segments.php");
 
if (((isset($_POST["f_username_or_email"])) && ((isset($_POST["f_password"]))))) {
    $user_id = $_POST["f_username_or_email"];
    $password = $_POST["f_password"];

    $stmt = $pdo->prepare("SELECT * FROM miners WHERE (username = ? OR user_email = ?) AND `password` = ?");
    $stmt->execute([$user_id, $user_id, $password]);
    
    $f_data = $stmt->fetchAll(PDO::FETCH_OBJ);

    if(count($f_data)>0){
        setcookie("username_or_email", $_POST["f_username_or_email"], time()+(24*3600), "/");
        setcookie("password", $_POST["f_password"], time()+(24*3600), "/");

        header("location:$site_url/redirect_to_mining_page.php");
    } else {
        echo "Incorrect username/email combination. Wait a minute though, How did you get here in the first place? :)";
    }
} 

if ($data) {
    Dashboard_Segments::header(); 
    echo "<br /><br /><br /><br /><br /><br />Everything about the mining page goes here...<br /><br /><br /><br /><br /><br />";
    Dashboard_Segments::dashboard_footer(); 
} else {
    //header("location:$site_url/login");
    echo "Data no dey here o";
}
?>