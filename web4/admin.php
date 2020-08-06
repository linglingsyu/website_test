<?php
include_once "base.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0057)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>┌精品電子商務網站」</title>
        <link href="css/css.css" rel="stylesheet" type="text/css">
        <script src="js/js.js"></script>
        <script src="js/jquery-3.4.1.min.js"></script>
</head>

<body>
        <iframe name="back" style="display:none;"></iframe>
        <div id="main">
                <div id="top">
                        <a href="?">
                                <img src="icon/0416.jpg">
                        </a>
                        <img src="icon/0417.jpg">
                </div>
                <div id="left" class="ct">
                        <div style="min-height:400px;">
                                <a href="?do=admin">管理權限設置</a>
                                <?php
                                
                                $row = $Admin->find(['acc'=>$_SESSION['admin']]);
                                $pr = unserialize($row['pr']);
                                foreach($pr as  $p){
                                   switch ($p){
                                     case 1: echo ' <a href="?do=th">商品分類與管理</a>';
                                     break;
                                     case 2: echo ' <a href="?do=order">訂單管理</a>';
                                     break;    
                                     case 3: echo ' <a href="?do=mem">會員管理</a>';
                                     break;    
                                     case 4: echo '<a href="?do=bottom">頁尾版權管理</a>';
                                     break;    
                                     case 5: echo '<a href="?do=news">最新消息管理</a>';
                                     break;        
                                   }
                                }
                                ?>
                                   <a href="api/logout.php" style="color:#f00;">登出</a>
                        </div>
                </div>
                <div id="right">
                        <?php
                        $do = empty($_GET['do']) ? "admin" : $_GET['do'];
                        $file = "backend/" . $do . ".php";
                        if (file_exists($file)) {
                                include $file;
                        } else {
                                include "backend/admin.php";
                        }
                        ?>
                </div>
                <div id="bottom" style="line-height:70px; color:#FFF; background:url(icon/bot.png);" class="ct">
                        <?php
                        $bot = $Bottom->find(1);
                        echo $bot['bottom'];
                        ?>
                </div>
        </div>

</body>

</html>