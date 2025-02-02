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

        header("location:$site_url/redirect_to_mining_page");
    } else {
        echo "Incorrect username/email combination. Wait a minute though, How did you get here in the first place? :)";
    }
} 

if ($data){//$data from account-manager.php
    Dashboard_Segments::header($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $site_mining_page_url = SITE_MINING_PAGE_URL, $Hi_user = $data->username); 

    $mining_stat = $data->mining_status;
    $amount_mined = $data->total_amount_mined;
    
    if ($mining_stat == "active"){
        $amount_mined += ((time() - strtotime($data->mining_start_time))*0.0000058);   
    }
?>
    <div style="margin-top:120px">
    <center>
        <div id="mining_status" style="display:none"><?=$mining_stat?></div>
        
        <div id="ajax_mine"></div>

        <div style="font-size:30px;font-weight:bold;font-family:Arial;margin-bottom:30px;display:flex;justify-content:center">
            <div style="margin-right:15px;margin-top:-20px"><img src="<?=$site_url?>/static/images/logo.png" style="width:45px;height:45px"/></div>
            <div><span id="amount_mined"><?=$amount_mined?></span></div>
        </div>

        <button class="mining_button" onclick="start_mining(u_name='<?=$data->username?>', u_password='<?=$data->password?>')" style="height:180px;width:180px;background-color:#0bee3ccc;border-radius:600px;text-align:center;color:#fff;font-weight:bold">Click me to start mining</button>
    </center>
    </div>

<?php
    Dashboard_Segments::dashboard_footer(); 
} else {
    header("location:$site_url/login");
}
?>