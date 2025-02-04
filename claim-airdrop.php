<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/views/Index_Segments.php");

//if($data) {
    Index_Segments::header($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $site_mining_page_url = SITE_MINING_PAGE_URL, $Hi_user = "", $title="Claim Airdrop - Aguanit Token");
?>
    <div class = "dashboard_div" style="background-color:<?=$site_color_dark?>">
        <input class="input" id="aguat_wa_id" name="aguat_wallet_address" placeholder = "Enter Your $<?=$token_name?> Wallet Address" value="" style="width:100%"/> 
        <div style = "margin:15px 0 9px 0">
            <button class="long-action-button" onclick="claim_airdrop()" style="width:100%">Claim Airdrop</button>
        </div>
    </div>
<?php  
    Index_Segments::footer();
//}