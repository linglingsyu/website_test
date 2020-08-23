
<form action="api/add_movie.php" method="post" enctype="multipart/form-data">
<table>
  <tr>
    <td>片名</td>
    <td><input type="text" name="name" value=""></td>
  </tr>

  <tr>
    <td>分級</td>
    <td>
    <select name="class" id="">
        <option value="1">普遍級</option>
        <option value="2">保護級</option>
        <option value="3">輔導級</option>
        <option value="4">限制級</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>片長</td>
    <td><input type="text" name="length" value=""></td>
  </tr>
  <tr>
    <td>上映日期</td>
    <td>
    <select name="year" id="">
      <option value="2020">2020</option>
    </select>年
    <select name="month" id="">
      <?php
      for($i=1;$i<=12;$i++){
        echo '<option value="'.$i.'">'.$i.'</option>';
      }
      ?>
    </select>月
    <select name="day" id="">
      <?php
      for($i=1;$i<=31;$i++){
        echo '<option value="'.$i.'">'.$i.'</option>';
      }
      ?>日
    </select>
    </td>
  </tr>
  <tr>
    <td>發行商</td>
    <td><input type="text" name="boss" value=""></td>
  </tr>
  <tr>
    <td>導演</td>
    <td><input type="text" name="director" value=""></td>
  </tr>
  <tr>
    <td>預告影片</td>
    <td><input type="file" name="mv" id=""></td>
  </tr>
  <tr>
    <td>電影海報</td>
    <td><input type="file" name="img" id=""></td>
  </tr>
  <tr>
    <td>劇情簡介</td>
    <td><textarea name="intro" id="" cols="30" rows="10"></textarea></td>
  </tr>
</table>
<input type="submit" value="新增"><input type="reset" value="重置">
</form>