<?php
ini_set("display_errors", '1'); //for testing purposes..
include_once("php/connection.php");

class Index_Segments{
    public static function header($site_name = SITE_NAME_SHORT, $site_url = SITE_URL){
        if (isset($_GET["ref"])) {
            $ref = htmlentities($_GET["ref"]);

            if(isset($_COOKIE["ref"])){
                //delete existing referer cookie
                setcookie("ref", $ref, time()-(24*3600), "/");
            }

            //set new referer cookie:
            setcookie("ref", $ref, time()+(12*3600), "/");
        }

        $css_version = filemtime($_SERVER["DOCUMENT_ROOT"]."/static/style.css");

        echo <<<HTML
        <!doctype html>
        <html lang="en">
        <head>
          
            <link rel="stylesheet" href="/static/style.css?$css_version"/>
            <!--<link rel="stylesheet" href="/static/font-awesome-4.7.0/css/font-awesome.min.css"/>-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong|Arimo|Prompt"/>
    
            <link rel="stylesheet" href="/static/themify-icons.css"/>
    
    
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            
            <title>$site_name</title>

        </head>
        <body>
            <div class="headers">  
                <div style="margin:-16px 19px 0px 14px">
                    <a href="/" style="color:#2b8eeb"><h3 class="site_name">$site_name</h3></a>
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

                    <li><a href="/about-us">About</a></li>
                    <li><a href="">White Paper</a></li>
                    <li><a href="">Distribution</a></li>
                    <li><a href="">Roadmap</a></li>
                    <li><a href="#faqs">Faq</a></li>
                    <li><a href="">Smart Contract</a></li>
                </ul> 
            </div> 

            <!-- id ajax utilizes this for pop up notices on users' investments -->    
            <div id="invest"></div>
            <!-- end of ajax pop up div -->

            <div class="site_top_page">
                <div class="intro">
                $site_name is a revolutionary project that merges the expertise of $site_name Cybersecurity.
                </div>

                Built on The Open Network (TON), $site_name token offers a unique ecosystem of features and utilities.
                
                <br /><br />
                <a href="/buy-presale" class="buy_presale">BUY PRESALE</a>
                <br /><br />

                <div>
<<<<<<< HEAD
                    <!--<img src = "/static/images/coin_image.png" class="coin_image"/>-->
=======
                    <img src = "/static/images/coin_image.png" class="coin_image"/>
>>>>>>> ec394d49b70e7b765640aaf5ba6534e882f6a72f
                </div>
            </div>

            <div class="white_background">
                <div class="about_img_div" style="width:100%">
                    <img src="/static/images/about_img1.png" class="site_images"/>
                </div>

                <div class="header_text">What is $site_name Token?</div>

                <div class="what_is_body">
                    $site_name token is a revolutionary project that merges the expertise of $site_name Cybersecurity, a leading cybersecurity firm, with the innovative potential of crypto currency. Built on The Open Network (TON), $site_name token offers a unique ecosystem of features and utilities designed to enhance online security, empower users, and foster a thriving community.
                </div>
                
                <a href="/white-paper" class="buy_presale">DOWNLOAD WHITE PAPER</a>
                
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
                <div class="token_distribution_head" style="color:#2b8eeb">Token Distribution</div>
                
                <ul class ="token_distribution_list">
                    <li><span class="token_percentages">32%</span> liquidity pool</li>
                    <li><span class="token_percentages">10%</span> Airdrop and community rewards</li>
                    <li><span class="token_percentages">3% </span>Pre-sale</li>
                    <li><span class="token_percentages">10%</span> Team and advisors (vested for 5 years)</li>
                    <li><span class="token_percentages">15%</span> Cybersecurity research and development</li>
                    <li><span class="token_percentages">15%</span> Partnerships, marketing and collaborations</li>
                    <li><span class="token_percentages">20%</span> Reserved for future initiatives</li>
                </ul>

                <div style="width:100%">
                    <img src="/static/images/token_distribution.png" class="site_images" style="border-radius:12px"/>
                </div>
            </div>
                
                
                
  
            <div class="white_background">     
                <div class="header_text">Roadmap </div>

                <div style="font-size:15px; color:#888;text-align:center">We have big plans for the future of $site_name Token.</div>
            </div>

            <div class="faq"> <a name="#faqs"></a>
                <div class="header_text" style="color:#2b8eeb">Frequently Asked Questions</div>
                
                <!--
                <div class="faq_divs">Where can I mine the airdrop?</div>
                You can mine $site_name Airdrop from our telegram mini app. Click the Mine button below to mine now.
                <div class="faq_divs">What blockchain is $site_name Token in?</div>
                <div class="faq_divs">When is $site_name token Listing?</div>
                <div class="faq_divs">Will there be presale?</div>
                -->
            </div>

            <div class="white_background" style="text-align:center;padding-bottom:60px">
                <div class="header_text" style="font-size:24px;padding-bottom:24px">$site_name token presale is now live</div>
                <a href="" class="buy_presale2">Buy presale</a>
            </div>

            <div class="footer">
                <div class="footer_fa_links">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-telegram"></i></a>
                </div>
                <div class="footer_copyright">
                    © 2024 $site_name Token.
                </div>
            </div>
            
    HTML;
    }
}

?>

<script>
function ajax_invest(){
obj = new XMLHttpRequest;
obj.onreadystatechange = function(){
    if(obj.readyState == 4){
        document.getElementById("invest").innerHTML = obj.responseText;
    }
}

obj.open("GET","/ajax_invest.php");
obj.send(null);
}  


<!-- Smartsupp Live Chat script -->

<!--End of smartsupp Script-->
</script>

</body>
</html>