<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/views/Index_Segments.php");

Index_Segments::header($title="Smart Contract");
?>

<div class="dashboard_div">
    <div class="smart_contract">
        <div style="font-size:24px;font-weight:bold">Smart Contract</div>
        <hr />
        <div class="smart_contract_texts"><span class="smart_contract_texts_head">Smart Contract Address:</span> 0x2547e1Cf16266a211EE4C651CB6d30f732A1DFd7</div>

        <div class="smart_contract_texts"><span class="smart_contract_texts_head">Network:</span> Avalanche C-Chain</div>
        
        <div class="smart_contract_texts"><span class="smart_contract_texts_head">Token Name:</span> <?=$site_name?></div> 
        
        <div class="smart_contract_texts"><span class="smart_contract_texts_head">Symbol:</span> $<?=$token_name?></div>
        
        <div class="smart_contract_texts"><span class="smart_contract_texts_head">Decimals:</span> 18</div>
        
        <div class="smart_contract_texts"><span class="smart_contract_texts_head">Token Tracker:</span> https://snowtrace.io/token/0x2547e1Cf16266a211EE4C651CB6d30f732A1DFd7?chainid=43114</div>
    </div>
</div>

<?php
Index_Segments::footer();