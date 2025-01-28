<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/views/Dashboard_Segments.php");

    if($data){
        // that means user is logged in:

        //cookie variables:
        $form_user_id = $_COOKIE["username_or_email"];
        $form_password = $_COOKIE["password"];


        //Get Last seen:
        $last_seen_stmt = $pdo->prepare("SELECT * FROM miners WHERE user_id = ?");
        $last_seen_stmt->execute([$data->user_id]);
        $last_seen_data = $last_seen_stmt->fetch(PDO::FETCH_OBJ);

        $last_seen = $last_seen_data->last_seen;

        if($last_seen == null) {
            $last_seen = date("Y-m-d h:i:s", time());
        }

        //update last seen:
        $stmt = $pdo->prepare("UPDATE miners SET last_seen = ? WHERE (username = ? OR user_email = ?) AND `password` = ?");
        $stmt->execute([date("Y-m-d h:i:s", time()), $user_id, $user_id, $password]);

          
        //display header:
        Dashboard_Segments::header($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $site_mining_page_url = SITE_MINING_PAGE_URL, $Hi_user = $data->username);
        
?>


<!--Start Mining Form Starts--> 
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<form method="post" action="<?=$site_mining_page_url?>">
    <input type="hidden" name="f_username_or_email" value="<?=$form_user_id?>"/>
    <input type="hidden" name="f_password" value="<?=$form_password?>"/>

    <button type="submit" style="background-color:green;padding:45px;border-radius:100px;color:#000">Start Mining</button>
</form>
<!--Start Mining Form ends--> 

<!--
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<a href="https://mine.aguanit.com" style="background-color:green;padding:45px;border-radius:100px;color:#000">Start Mining</a>
<br /><br /><br />
-->

<!-- Referral Link section starts -->
<div style="padding:12px">
    <!-- style="color:#afabab" --><h3 style="color:#fff">Your Referral Link</h3>
        
    <input style="height:24px;border:1px solid #2b8eeb;
        border-right:30px solid #0bee3ccc;width:80%;
        border-radius:4px;margin-top:8px" id = 'referral_link'
        value="https://<?=$site_url_short?>/?ref=<?=$_COOKIE['username_or_email']?>"/>
        
    <i style="margin-left:-27px" class="fa fa-copy" onclick="copyText('referral_link')"></i>
    <br /> 
</div>
<!-- Referral Link section ends -->



<?php
Dashboard_Segments::footer();
    } /*end of count($data) for cookie name and pass*/ else {
        header("location:/login");
    } 
?>