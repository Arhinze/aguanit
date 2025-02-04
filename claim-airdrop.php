<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/views/Index_Segments.php");

//if($data) {
    Index_Segments::header($title="");
?>
    <div class = "dashboard_div">
        <input class="input" name="aguat_wallet_address" placeholder = "Enter Your $<?=$token_name?> Wallet Address"/> 
        <div>
            <button class="long-action-button">Claim Airdrop</button>
        </div>
    </div>
<?php  
    Index_Segments::footer();
//}