<?php
ini_set("display_errors", '1'); //for testing purposes..

include_once("/home/u590828029/domains/aguanit.com/public_html/php/connection.php");

class Index_Segments{
    public static function header($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $site_mining_page_url = SITE_MINING_PAGE_URL, $Hi_user = "", $title=SITE_NAME){
        if (isset($_GET["ref"])) {
            $ref = htmlentities($_GET["ref"]);

            if(isset($_COOKIE["ref"])){
                //delete existing referer cookie
                setcookie("ref", $ref, time()-(24*3600), "/");
            }

            //set new referer cookie:
            setcookie("ref", $ref, time()+(12*3600), "/");
        }

        $css_version = filemtime("/home/u590828029/domains/aguanit.com/public_html/static/style.css");

        echo <<<HTML
        <!doctype html>
        <html lang="en">
        <head>
          
            <link rel="stylesheet" href="$site_url/static/style.css?$css_version"/>
            <link rel="icon" type="image/x-icon" href="$site_url/static/images/favicon.png"/>
            <!--<link rel="stylesheet" href="/home/u590828029/domains/aguanit.com/public_html/static/style.css?$css_version"/>-->
            <!--<link rel="stylesheet" href="/static/font-awesome-4.7.0/css/font-awesome.min.css"/>-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong|Arimo|Prompt"/>
            
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                
            <title>$title</title>
              
        </head>
        <body>
            <div class="headers">  
                <div style="margin:-16px 19px 0px 14px">
                    <a href="/"><h3 class="site_name">$site_name</h3></a>
                </div>
            
                <div class="menu-icon">
                    <label for = "menu-box">
                        <i class="fa fa-bars"></i>
                    </label>
                </div> 
            </div> 
        
            <a name="#top"></a>
              
            <div class="menu-list-div">  
                <input type="checkbox" id="menu-box" class="menu-box"/>
                <ul class="menu-list">
                                
                    <li class="x"><label for="menu-box"><i class="fa fa-times"></i></label></li>
                    
                    <!--<li><a href="/about-us">About</a></li>-->
                    <li><a href="/login">Login</a></li>
                    <li><a href="/sign-up">Sign Up</a></li>
                    <li><a href="/claim-airdrop">Airdrop</a></li>
                    <li><a href="">White Paper</a></li>
                    <li><a href="">Distribution</a></li>
                    <li><a href="">Roadmap</a></li>
                    <li><a href="#faqs">Faq</a></li>
                    <li><a href="/smart-contract">Smart Contract</a></li>
                    <li><a href="">CEX Listing</a></li>
                </ul> 
            </div> 
       HTML;
       }
                
        public static function body($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $site_mining_page_url = SITE_MINING_PAGE_URL){
            echo <<<HTML
            <div class="site_top_page">
                <div class="intro" style="font-size:27px">
                <!--$site_name is a revolutionary project that merges the expertise of $site_name Cybersecurity.-->
                In an age where digital transformation is reshaping industries,
                </div>

                <b>$site_name</b> Token emerges as a cryptocurrency aimed at revolutionizing the fields of historical preservation and research by leveraging blockchain technology and artificial intelligence (AI). 

                <p>Powered by Avalanche, $site_name token offers a unique ecosystem of features and utilities.</p>
                
                <br />
                <a href="$site_mining_page_url" class="buy_presale">START MINING</a>
                <br /><br />
                <div style="width:100%">
                    <img src = "/static/images/coin_image.png" class="coin_image"/>
                </div>
            </div>
                  
            <div class="white_background">
                <div class="site_images_div">
                    <img src="/static/images/about_aguanit1.png" class="site_images"/>
                </div>
                         
                <div class="header_text">What is $site_name Token?</div>
                         
                <div class="what_is_body">
                    <p><b>$site_name Token</b> is the world's first Decentralized Art (DeArt) token that leverages artificial intelligence (AI), blockchain technology, smart contracts, and tokenized incentives to democratize historical research.</p>
                    
                    <p>We aim to create a decentralized platform that incentivizes the documentation, preservation, and sharing of historical artifacts and knowledge.</p>
                    
                    <p>Our mission is to empower communities, historians, and institutions to participate actively in preserving the world's cultural heritage while providing a sustainable economic model.</p>
                </div>
                                         
                <a href="/white-paper" class="buy_presale2">DOWNLOAD WHITE PAPER</a>
                                          
                <div class="header_text" style="text-align:center">Project Features</div>
                          
                <div class="flex-div">
                    <div class="project_features_subdivs">
                        <i class="fa flaticon-decentralized"></i>
                        $site_name <br />
                        DEX
                    </div>
                          
                    <div class="project_features_subdivs">
                        <i class="fa flaticon-decentralized"></i>
                        Minable <br />
                        Airdrops Platform
                    </div>
                        
                    <div class="project_features_subdivs">
                        <i class="fa flaticon-decentralized"></i>
                        Encrypted <br />
                        Online Drive
                    </div>
                            
                    <div class="project_features_subdivs">
                        <i class="fa flaticon-decentralized"></i>
                        Robust Smart <br />
                        Contract Audits
                    </div>
                </div>
            </div>
                         
            <div class="token_distribution">
                <div class="token_distribution_head">Token Distribution</div>
                
                <ul class ="token_distribution_list">
                    <li><span class="token_percentages">100%</span> Liquidity pool</li>
                    <li><span class="token_percentages">12.5%</span> Airdrop</li>
                    <li><span class="token_percentages">25% </span>Pre-sale</li>
                    <li><span class="token_percentages">25% </span>Mining Pool</li>
                    <li><span class="token_percentages">12.5% </span>Partnerships and collaborations</li>
                    <li><span class="token_percentages">25% </span>Founding Team</li>
                </ul>
                
                <!--
                <div class="site_images_div">
                    <img src="/static/images/token_distribution.png" class="site_images" style="border-radius:12px"/>
                </div>
                -->
                <div class="site_images_div">
                    <img src="/static/images/prospective_listing_partners.png" class="site_images" style="border-radius:12px"/>
                </div>
            </div>
                      
                        
                   
            <div class="white_background">     
                <div class="header_text">Roadmap </div>
                       
                <div style="font-size:15px; color:#888;text-align:center">We have big plans for the future of $site_name Token.</div>
            </div>
                      
            <div class="faq"> <a name="#faqs"></a>
                <div class="header_text">Frequently Asked Questions</div>
                                   
                <!--
                <div class="faq_divs">Where can I mine the airdrop?</div>
                You can mine $site_name Airdrop from our telegram mini app. Click the Mine button below to mine now.
                <div class="faq_divs">What blockchain is $site_name Token in?</div>
                <div class="faq_divs">When is $site_name token Listing?</div>
                <div class="faq_divs">Will there be presale?</div>
                -->
            </div>
                            
            <div class="white_background" style="text-align:center;padding-bottom:60px">
                <div class="header_text" style="font-size:24px;padding-bottom:24px">$site_name token airdrop is now live</div>
                <a href="/claim-airdrop" class="buy_presale2">Airdrop</a>
            </div>
        HTML;
       }


       public static function index_scripts(){

        echo <<<HTML

        <!-- Footer - index_scripts -->
        <script>
            function show_div(vari) {
                if (document.getElementById(vari).style.display == "none") {
                    document.getElementById(vari).style.display = "block";
                } else if (document.getElementById(vari).style.display == "block") {
                    document.getElementById(vari).style.display = "none";
                }
            }
                         
            const collection = document.getElementsByClassName("invalid");
                                 
            for (let i=0; i < collection.length; i++){
                //collection[i].style = "display:none";
                                            
                var innerHT = collection[i].innerHTML;
                            
                var newInnerHT = innerHT + "<span style='float:right;margin:4px 18px'><i class='fa fa-times' onclick='hide_invalid_div()'></i></span>";
                          
                collection[i].innerHTML = newInnerHT;
            }
                           
            function hide_invalid_div() {
                //const collection = document.getElementsByClassName("invalid");
                i = 0;
                               
                for (i=0; i<collection.length; i++){
                    collection[i].style.display = "none";
                }  
            }

            function claim_airdrop(){
                var wallet_add = document.getElementById("aguat_wa_id").value;

                if(((wallet_add).length) >= 8) {
                    obj = new XMLHttpRequest;
                    obj.onreadystatechange = function(){
                        if(obj.readyState == 4){
                            if (document.getElementById("ajax_claim_airdrop")){
                                document.getElementById("ajax_claim_airdrop").innerHTML = obj.responseText;
                            }
                        }
                    }
            
                    obj.open("GET","/ajax_claim_airdrop.php?aguat_wallet_add="+wallet_add.toString());
                    obj.send(null);
                } else {
                    document.getElementById("ajax_claim_airdrop").innerHTML = "<div class='invalid' style='font-weight:bold'>String too short to be \$AGUAT wallet address.<span style='float:right;margin:4px 18px'><i class='fa fa-times' onclick='hide_invalid_div()'></i></span></div>";
                }
            }
            
        </script>
        HTML;
        }


        public static function footer($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $site_mining_page_url = SITE_MINING_PAGE_URL, $additional_scripts = ""){ 
            
            $index_scripts = Index_Segments::index_scripts();    

            echo <<<HTML
            <div class="footer">
                <div class="footer_fa_links"> <!-- social media links -->
                    <a href="https://youtube.com/@aguanittoken?si=2UPwkGxROq7WpLAO"><i class="fa fa-youtube-play"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=61553828145828"><i class="fa fa-facebook"></i></a>
                    <a href="https://t.me/aguanit"><i class="fa fa-telegram"></i></a>
                    <a href="https://x.com/AguanitToken?t=VwVfUCIOP1xBa9KRrfPHkg&s=09"><i class="fa fa-twitter"></i></a>
                </div>
                         
                <div class="footer_copyright">
                    © 2025 $site_name Token.
                </div>
            </div>
            
            $index_scripts
            $additional_scripts
            <br /><br /><br />
        </body>
        </html>    
    HTML;
    }
}
?>