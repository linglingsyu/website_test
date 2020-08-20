<h1>新增院線片</h1>
<form action="api/edit_movie.php" method="post" enctype="multipart/form-data">
<?php
$row = $Movie->find($_GET['id']);
$date = explode("-",$row['date']);
?>
<table>
  <tr>
    <td>片名</td>
    <td><input type="text" name="name" value="<?=$row['name']?>"></td>
  <input type="hidden" name="id" value="<?=$row['id']?>">
  </tr>
  <tr>
    <td>分級</td>
    <td>
  <select name="class" >
    <option value="1" <?= $row['class']=="1" ? "selected" : "" ?>>普遍級</option>
    <option value="2" <?= $row['class']=="2" ? "selected" : "" ?>>保護級</option>
    <option value="3" <?= $row['class']=="3" ? "selected" : "" ?>>輔導級</option>
    <option value="4" <?= $row['class']=="4" ? "selected" : "" ?>>限制級</option>
  </select>

    </td>
  </tr>
  <tr>
    <td>片長</td>
    <td><input type="text" name="length" value="<?=$row['length']?>"></td>
  </tr>
  <tr>
    <td>上映日期</td>
    <td>
    <select name="year">
      <option value="2020">2020</option>
    </select>年
    <select name="month">
    <?php
      for($i=1;$i<=12;$i++){
        $chk = ($i == $date[1])? "selected" : "";
        echo '<option value="'.$i.'" '.$chk.'>'.$i.'</option>';
      }
    ?>
    </select>月
    <select name="day" value="<?=$row['name']?>">
    <?php
      for($i=1;$i<=31;$i++){
          $chk = ($i == $date[2])? "selected" : "";
        echo '<option value="'.$i.'" '.$chk.'>'.$i.'</option>';
      }
    ?>
    </select>日
    </td>
  </tr>
  <tr>
    <td>發行商</td>
    <td><input type="text" name="boss" value="<?=$row['boss']?>"></td>
  </tr>
  <tr>
    <td>導演</td>
    <td><input type="text" name="director" value="<?=$row['director']?>"></td>
  </tr>
  <tr>
    <td>預告影片</td>
    <td><input type="file" name="mv"></td>
  </tr>
  <tr>
    <td>電影海報</td>
    <td><input type="file" name="img" ></td>
  </tr>
  <tr>
    <td>劇情簡介</td>
    <td><textarea name="intro"  cols="30" rows="10"><?=$row['intro']?></textarea></td>
  </tr>
</table>
<input type="submit" value="編輯"><input type="reset" value="重置">
</form>