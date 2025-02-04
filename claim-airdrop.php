<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/views/Index_Segments.php");

//if($data) {
    Index_Segments::header($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $site_mining_page_url = SITE_MINING_PAGE_URL, $Hi_user = "", $title="Claim Airdrop - Aguanit Token");
?>
    <div class = "dashboard_div" style="background-color:<?=$site_color_dark?>">
        <input class="input" id="aguat_wa_id" name="aguat_wallet_address" placeholder = "Enter Your $<?=$token_name?> Wallet Address" value="" style="width:99%" minlenth="9"/> 


        <!-- Where to get your $Aguat wallet address? -->
        <b style = "color:<?=$site_color_light?>;font-weight:bold;font-size:12px;margin:9px 0"  onclick="show_div('where_to_get_wallet_address')"><i class="fa fa-question-circle"></i> Where to get your $<?=$token_name?> wallet address?</b>

        <div style = "margin:15px 0 9px 0">
            <button class="long-action-button" onclick="claim_airdrop()" style="width:100%">Claim Airdrop</button>
        </div>

        <?php include($_SERVER["DOCUMENT_ROOT"]."/views/where_to_get_wa.php"); ?>
    </div>

    <div id = "ajax_claim_airdrop"></div>
<?php  
    Index_Segments::footer();
//}