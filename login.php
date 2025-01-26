<?php

include_once("/home/u590828029/domains/aguanit.com/public_html/php/account-manager.php");
include_once("/home/u590828029/domains/aguanit.com/public_html/views/Index_Segments.php");

Index_Segments::header();

$remember_username = "";

if($data){ //data from php/account-manager.php ~ if true, that means user is already logged in.
    header("location:$site_mining_page_url");
}

if (isset($_POST["username_or_email"]) && isset($_POST["password"])) {
    $user_id = $_POST["username_or_email"];
    $password = $_POST["password"];

    $remember_username = $_POST["username_or_email"];

    $stmt = $pdo->prepare("SELECT * FROM investors WHERE (username = ? OR email = ?) AND `password` = ?");
    $stmt->execute([$user_id, $user_id, $password]);
    
    $data = $stmt->fetchAll(PDO::FETCH_OBJ);

    if(count($data)>0){
        setcookie("username_or_email", $_POST["username_or_email"], time()+(24*3600), "/");
        setcookie("password", $_POST["password"], time()+(24*3600), "/");

        //redirect to dashboard
        header("location:$site_mining_page_url");

    } else {
?>
    <div class = "invalid">
        invalid username/password combination
    </div>
<?php 
    }
}
?>

<!--HTML:-->
<div class="sign-in-page">
    <div class="new-sign-in-head">
        <span class="fa-user-login"><i class="fa fa-user"></i></span> Login to Account
    </div>

    <div class="sign-in-box">
        <form method="post" action="/login"> 
            <div class="flex-div">
                <div class="new-input-div">
                    <input type="text" name="username_or_email" placeholder="Username" value="<?=$remember_username?>" class="new-input" style="margin-bottom:6px"/>    
                    <div class="new-input-fa-icon"> <i class="fa fa-user"></i> </div>
                </div>

                <div class="new-input-div">
                    <input type = "password" name = "password" placeholder = "Password: *****" class="new-input" minlength="8"/><br />
                    <div class="new-input-fa-icon"> <i class="fa fa-key"></i> </div>
                </div>
            </div>

            <div class="sign-in-bottom">
                <button type="submit" class="long-action-button">Login </button> <br />
        
                <div style="font-size:12px;text-align;center;margin-top:21px">
                    Forgot Your Password? <b><a href="/reset-password" style="font-weight:bold;">Recover it now</a></b> <br />
                    Don't have an account? <b><a href="sign-up" style="font-weight:bold;">Sign Up</a></b>.<br/>
                </div>
            </div>
        </form>
    </div>
</div>
    
<?php Segments::footer(); ?>