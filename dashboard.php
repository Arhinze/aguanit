<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/views/Dashboard_Segments.php");

    if($data){
        // that means user is logged in:

        //cookie variables:
        $form_user_id = $_COOKIE["username_or_email"];
        $form_password = $_COOKIE["password"];
     
        //display header:
        Dashboard_Segments::header($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $site_mining_page_url = SITE_MINING_PAGE_URL, $Hi_user = $data->username);
        
?>

<div style="margin-top:150px">
    <center>
    <!--Start Mining Form Starts--> 
    <form method="post" action="<?=$site_mining_page_url?>">
        <input type="hidden" name="f_username_or_email" value="<?=$form_user_id?>"/>
        <input type="hidden" name="f_password" value="<?=$form_password?>"/>
    
        <button type="submit" class="mining_button"><b><i class="fa fa-power-off"></i> Start Mining</b></button>
    </form>
    <!--Start Mining Form ends--> 
    </center>
    
    <!-- Referral Link section starts -->
    <div style="padding:12px">
        <h3 style="color:#fff">Your Referral Link</h3>
            
        <input style="height:24px;border:1px solid #2b8eeb;
            border-right:30px solid #0bee3ccc;width:80%;
            border-radius:4px;margin-top:8px" id = 'referral_link'
            value="https://<?=$site_url_short?>/?ref=<?=$data->username?>"/>
            
        <i style="margin-left:-27px" class="fa fa-copy" onclick="copyText('referral_link')"></i>
        <br /> 
    </div>
    <!-- Referral Link section ends -->
</div>

<?php
Dashboard_Segments::footer();
    } /*end of count($data) for cookie name and pass*/ else {
        header("location:/login");
    } 
?>