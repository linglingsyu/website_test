<fieldset>
  <legend>目前位置：首頁 > 問券調查</legend>
  <table>
<tr>
  <td>編號</td>
  <td>問券題目</td>
  <td>投票總數</td>
  <td>結果</td>
  <td>狀態</td>
</tr>

  <?php
  $rows = $Que->all(['parent'=>0]);
  
  foreach($rows as $key => $row){
    $c = $Que->q("select sum(`count`) from `que` where `parent`='".$row['id']."'");
  ?>

<tr>
  <td><?= $key+1 ?></td>
  <td><?= $row['text'] ?></td>
  <td><?= $c[0][0] ?></td>
  <td><a href="?do=result&id=<?=$row['id'] ?>">結果</a></td>
  <td>
    <?php

    if(empty($_SESSION['user'])){
      echo '  <a href="?do=login">請先登入</a>';
    }else{
      echo '  <a href="?do=vote&id='.$row['id'].'">參與投票</a>';;
    }
?>


</td>
</tr>
  


<?php
  }
?>
  </table>
</fieldset>