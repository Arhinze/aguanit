<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/views/admin_Segments.php");

if(isset($_COOKIE["admin_name"]) && isset($_COOKIE["admin_password"])){
    $stmt = $pdo->prepare("SELECT * FROM `admin` WHERE admin_name = ? AND admin_password = ?");
    $stmt->execute([$_COOKIE["admin_name"], $_COOKIE["admin_password"]]);

    $data = $stmt->fetch(PDO::FETCH_OBJ);
    if($data){
        //that means admin is logged in
        admin_Segments::header();
?>
        <div class="dashboard_div">
            <h1 style="margin:24px 6px;font-size:21px">Airdrop Participants on <?=$site_name?></h1>
            <!-- "refresh" class -->
            <a href = '' style='color:#fff;font-size:19px;margin:0 3px 0 6px;padding:6px 9px;background-color:<?=$site_color_light?>;border-radius:5px' class="refresh">
                <i class='fa fa-refresh'></i><span style="font-size:18px; font-weight:bold">&nbsp; Refresh</span>
            </a> 
            <!-- End of "refresh" class -->

            <br /><br /> 
<?php
        //check if admin is searching for someone:
?>
        <input type="text" onkeyup="ajax_search()" id="search_input" class="input" placeholder="Enter username: try: abc" style="border:1px solid <?=$site_color_light?>;width:75%"/> 
        
        <i class="fa fa-search" onclick ="search_icon()" style="padding:12px;border-radius:4px;font-size:16px;color:#fff;background-color:<?=$site_color_light?>"></i>

        <div id="search" style="position:absolute;width:75%"></div>
        
        <div class='main'>    <!-- 'main' div starts -->

        <?php
            //A Simple Pagination Algorithm:
            $p = 1;
            $num_of_rows = 10;

            if(isset($_GET["page"])){
                $p = htmlentities($_GET["page"]);
                if(!is_numeric($p) || $p < 1){
                    $p = 1;
                }
            }
            
            $page_to_call = ($p - 1)*$num_of_rows;

            //~Select all users who have submitted their wallets for airdrop:
            $sel_stmt = $pdo->prepare("SELECT * FROM miners WHERE airdrop_status = ? LIMIT ?, ?");
            $sel_stmt->execute(["participated", 0, 1000]);

            $sel_data = $sel_stmt->fetchAll(PDO::FETCH_OBJ);
            $i = 0;

            $num_of_airdrop_participants = count($sel_data);
            $max = ceil($num_of_airdrop_participants/$num_of_rows);
            // -- end of pagination algorithm --

            if ($num_of_airdrop_participants > 0) {
                echo "<b style='font-size:15px'>Total numner of participants: </b>", $num_of_airdrop_participants;
                foreach ($sel_data as $sd) {
                    $i += 1;
        ?>
                    <div class="airdrop_users">
                        <div><b><?=$i?>. Username:</b> <?=$sd->username?> </div>
                        <div style="overflow:scroll"><b>$AGUAT Wallet Address:</b> <?=$sd->aguat_wallet_address?> </div>
                    </div>
        <?php
                }
            }
        ?>
        
        <!--Paginator-->
        <div class="clear" style="font-weight:bold;font-size:18px">
            <?php if($p > 1) { ?> 
                <div style="float:left">
                   <b>
                       <a href="?page=<?=$p-1?>" style="color:#fff"><i class="fa fa-angle-left">&nbsp; Previous</i></a>
                    </b>
                </div> 
            <?php } ?>
    
            <?php if($p < $max) { ?> 
                <div style="float:right">
                    <b>
                        <a href="?page=<?=$p+1?>" style="color:#fff">Next &nbsp;<i class="fa fa-angle-right"></i></a>
                    </b>
                </div> 
            <?php } ?>
        </div> <!-- End of Paginator -->
        </div> <!-- End of class 'main_div' -->
    <?php
            }else {
                header("location:/login");
            }
        } else {
            header("location:/login");
        }
?>