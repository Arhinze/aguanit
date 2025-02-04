<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/views/connection.php");

$data = false;

if((isset($_COOKIE["username_or_email"])) && ((isset($_COOKIE["password"])))){
    $user_id = $_COOKIE["username_or_email"];
    $password = $_COOKIE["password"];

    $stmt = $pdo->prepare("SELECT * FROM miners WHERE (username = ? OR user_email = ?) AND `password` = ?");
    $stmt->execute([$user_id, $user_id, $password]);
    
    $data = $stmt->fetch(PDO::FETCH_OBJ);
}

if($data) { //that means user is logged in
    $aguat_wa = (htmlentities($_GET["aguat_wallet_add"]) !== null) ? htmlentities($_GET["aguat_wallet_add"]) : " ";
    if ($data->airdrop_status !== "participated") {//user has not participated ~ insert user
  
        $air_stmt = $pdo->prepare("UPDATE miners SET aguat_wallet_address = ? WHERE user_id = ?");
        $air_stmt->execute($aguat_wa, $data->user_id);

        echo "<div class='pop_up'>Congratulations. You've been successfully added to the waitlist. 
        <span style='float:right;position:absolute;top:6px;right:6px'>
            <i class='fa fa-times' onclick='close_pop_up()'></i>
        </span>
        </div>";
    } else {//user has already participated ~ update again, because he/she might be trying to change the wallet addrress, then remind him/her that they have participated in the past
        $air_stmt = $pdo->prepare("UPDATE miners SET aguat_wallet_address = ? WHERE user_id = ?");
        $air_stmt->execute($aguat_wa, $data->user_id);

        echo "<div class='pop_up'>Congratulations. You've already been added to the waitlist. 
        <span style='float:right;position:absolute;top:6px;right:6px'>
            <i class='fa fa-times' onclick='close_pop_up()'></i>
        </span>
        </div>";
    }  
?>

<?php
} else {
    echo "<div class='invalid'>Kindly <b><a href='/login' style='color:#042c06'>Login</a></b> to access this feature. 
    <span style='float:right;margin:4px 18px'><i class='fa fa-times' onclick='hide_invalid_div()'></i></span>
    </div>";
}
?>