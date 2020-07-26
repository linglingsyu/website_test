<?php 
  $title = $Que->find($_GET['id']);
  $rows = $Que->all(['parent'=>$_GET['id']]);
?>
<fieldset>
  <legend>目前位置：首頁 > 問券調查 > <?= $title['text'] ?> </legend>
  <form action="api/vote.php" method="post">
  <table>
<h2><?= $title['text'] ?></h2>
<?php
  foreach($rows as  $row){
    echo '<input type="radio" name="opt" value="'.$row['id'].'">'.$row['text']."<br>";
  }

  ?>
  <input type="submit" value="我要投票">
  </table>
  </form>
</fieldset>

