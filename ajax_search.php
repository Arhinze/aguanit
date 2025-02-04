<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/php/connection.php");
if(isset($_COOKIE["admin_name"]) && isset($_COOKIE["admin_password"])){
    $stmt = $pdo->prepare("SELECT * FROM `admin` WHERE admin_name = ? AND admin_password = ?");
    $stmt->execute([$_COOKIE["admin_name"], $_COOKIE["admin_password"]]);

    $data = $stmt->fetch(PDO::FETCH_OBJ);
    if($data){

if(isset($_GET["search_query"])){
    if(!empty($_GET["search_query"])){
        $search_q = htmlentities($_GET["search_query"]);
        $page = htmlentities($_GET["page"]);
    
    
    $search_stmt = $pdo->prepare("SELECT * FROM miners WHERE username LIKE ? LIMIT ?, ?");
    $search_stmt->execute(["%$search_q%", 0, 100]);
    $search_data = $search_stmt->fetchAll(PDO::FETCH_OBJ);

    foreach($search_data as $sd){
?>
        <div style="border-bottom:1px solid #888;padding:12px 6px;background-color:#fff">
            <a href ="/<?=$page?>/<?=$sd->username?>" style="color:#2b8eeb"><?=$sd->username?></a>
        </div>
<?php 
       }
    }
}
    } else {
        echo "Stop that nonsense !";
    }
} else {
    echo "Stop that nonsense !!!";
}
?>