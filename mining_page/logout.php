<?php

$cookies = ["username_or_email","password","admin_name","admin_password"];
foreach($cookies as $c){
    if(isset($_COOKIE["$c"])){
        setcookie($c, $_COOKIE["$c"], time()-(24*3600), "/");
    }
}

header("location:https://aguanit.com/logout")

?>