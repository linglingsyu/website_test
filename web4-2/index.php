<?php
include_once "base.php"
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
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
                        <div style="padding:10px;">
                                <a href="index.php">回首頁</a> |
                                <a href="?do=news">最新消息</a> |
                                <a href="?do=look">購物流程</a> |
                                <a href="?do=buycart">購物車</a> |
                                <?php
                                if (empty($_SESSION['mem'])) {
                                        echo '<a href="?do=login">會員登入</a>';
                                } else {
                                        echo '<a href="api/mem_logout.php">會員登出</a>';
                                }
                                ?>
                                |

                                <?php
                                if (empty($_SESSION['admin'])) {
                                        echo ' <a href="?do=admin">管理登入</a>';
                                } else {
                                        echo '  <a href="admin.php">返回管理</a>';
                                }
                                ?>

                        </div>
                        <marquee>情人節特惠活動 &nbsp;&nbsp;&nbsp;&nbsp; 年終特賣會開跑了</marquee>
                </div>
                <div id="left" class="ct">
                        <div style="min-height:400px;">
                        <a href="">全部商品(<?=$Goods->count()?>)</a>
                        <?php
$rows = $Type->all(['parent'=>0]);
foreach($rows as $row){
        $tt = $Type->find($row['id']);
?>
        <div class="ww">
                <a href="?do=th"><?=$row['name']?>(<?=$Goods->count(['big'=>$tt['id']])?>)</a>

    <?php
      $sub = $Type->all(['parent'=>$row['id']]);
      foreach($sub as $s){
                $mm = $Type->find($s['id']);
    ?>
     <div class="s">
             <a style="background:#fff" href=""><?=$s['name']?>(<?=$Goods->count(['mid'=>$mm['id']])?>)</a>
        </div>
        
    <?php
      }
    ?>
   </div>
<?php
}
?>
                        </div>
                        <span>
                                <div>進站總人數</div>
                                <div style="color:#f00; font-size:28px;">
                                        00005 </div>
                        </span>
                </div>
                <div id="right">
                        <?php
                        $do = empty($_GET['do']) ? "main" : $_GET['do'];
                        $file = "front/" . $do . ".php";
                        if (file_exists($file)) {
                                include $file;
                        } else {
                                include "front/main.php";
                        }
                        ?>
                </div>
                <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
                        <?= $Bottom->find(1)['bottom'] ?> </div>
        </div>

</body>

</html>