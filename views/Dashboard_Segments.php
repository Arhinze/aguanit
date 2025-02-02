<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/php/account-manager.php");
include_once("/home/u590828029/domains/aguanit.com/public_html/views/Index_Segments.php");

class Dashboard_Segments extends Index_Segments{
    public static function header($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $site_mining_page_url = SITE_MINING_PAGE_URL, $Hi_user = ""){

    
    $css_version = filemtime("/home/u590828029/domains/aguanit.com/public_html/static/style.css");

    echo <<<HTML
    <!doctype html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="$site_url/static/style.css?$css_version"/>
        <link rel="icon" type="image/x-icon" href="$site_url/static/images/favicon.png"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
        <title>$site_name</title>        
    </head>
    <body>

    <div class="body">
        <div class="headers" style="height:36px;padding:16px 16px 8px 8px"> 
            <div style="font-size:18px;margin:-16px 19px 0px 14px;float:left">
                <h3 class="site_name">
                    <a href="$site_url">$site_name</a>
                </h3>
            </div>

            <div class="menu_and_user_icon">

            <span class="other-menu-icon" style="">
                <label for = "menu-box"><i class="fa fa-bars"></i></label>
            </span>
            </div>
        </div> 

        <div class="hi_user"> 
        
            <!-- Google Translate div -->  
            
            <div class="clear"><div id="google_translate_element" style="position:fixed;float:left;left:13px;top:59px;background-color:#fff;border-radius:4px;padding:0px 3px"></div></div>
            
            <!-- Hi user --> 
            
            <span style="float:right;background-color:#042c06;border-radius:6px;margin:3px;font-size:12px;padding:1px 0 6px 9px">
                Hi $Hi_user

                <i style="background-color:#0bee3ccc;color:#fff; border-radius:6px;padding:6px 8px;text-align:center;margin:6px 9px 0px 6px;" class="fa fa-user"></i> 
            </span>
        </div>
    
        <a name="#top"></a>

        <input type="checkbox" id="menu-box" class="menu-box"/>

        <ul class="menu-list"> 
            
            <li class="x"><label for="menu-box"><i class="fa fa-times"></i></label></li>
            
            <li><a href="$site_url/dashboard">Dashboard</a></li>
            <li><a href="$site_url/settings">Settings</a></li>

            <li class="clear" style="padding-bottom:16px">
                <label for="hidden-menu-item">
                    <span style="float:left">Referrals</span> <i class="fa fa-angle-down" style="float:right"></i> 
                </label>
            </li>

            <input type="checkbox" style="display:none" id="hidden-menu-item" class="hidden-menu-item"/>
            <div class="hidden-menu-div">
                <a href="$site_url/referred-users">Referred Users</a><br />
                <a href="$site_url/referred-commissions">Referred Commissions</a>
            </div>
            
            <li><a href="$site_url/reset-password">Reset Password</a></li>

            <li><a href="$site_mining_page_url/logout.php" style="color:#fff;font-weight:bold;background-color:#0bee3ccc;padding:6px;border-radius:12px">Log out</a></li>
        </ul>     
HTML;
    }



    public static function dashboard_scripts($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $site_mining_page_url = SITE_MINING_PAGE_URL){

        //Index_Segments::index_scripts();

        echo <<<HTML
        <!-- Footer - dashboard_script -->
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
                collection[i].style = "display:block";
                //collection[i].style = "color:pink";
                
                var innerHT = collection[i].innerHTML;

                var newInnerHT = innerHT + "<span style='float:right;margin:4px 18px'><i class='fa fa-times' onclick='show_class_div()'></i></span>";

                collection[i].innerHTML = newInnerHT;
            }

            function show_class_div() {
                //const collection = document.getElementsByClassName("invalid");
                i = 0;

                for (i=0; i<collection.length; i++){
                    collection[i].style.display = "none";
                }      
            }

            function copyText(linkText){
                x = document.getElementById(linkText);
        
                x.select();
                x.setSelectionRange(0, 99999);
        
                //navigator.clipboard.writeText(x.value);
                document.execCommand('copy');
                alert("copied text: " + x.value);
            }
        </script>



        <!-- Mining Scripts -->
        <script>
            function start_mining(u_name, u_password) {
                //alert("Active !!!")
                obj = new XMLHttpRequest;
                obj.onreadystatechange = function(){
                    if(obj.readyState == 4){
                        if (document.getElementById("ajax_mine")){
                            document.getElementById("ajax_mine").innerHTML = obj.responseText;
                        }
                    }
                }
        
                obj.open("GET","/ajax_mining_page.php?un="+u_name+"&up="+u_password);
                obj.send(null);

            }

            setInterval(() => {
                if (document.getElementById("mining_status").innerHTML == "active"){
                    var amount = document.getElementById("amount_mined").innerHTML;
                    var new_amount = Number(amount) + 0.0000058;
                    //alert("Active !!!");
                    document.getElementById("amount_mined").innerHTML = new_amount;
                }
            }, 1500);

        </script>
        <!-- Mining Script ends -->

    <noscript> 
        Texts won't display well. please enable Javascript.
    </noscript>
HTML;
    }

    public static function dashboard_footer(){
        Index_Segments::footer($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $site_mining_page_url = SITE_MINING_PAGE_URL, $additional_scripts = Dashboard_Segments::dashboard_scripts());
    }
}