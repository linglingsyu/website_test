<form action="api/addmovie.php" method="post" enctype="multipart/form-data">
<table>
  <tr>
    <td>片名</td>
    <td><input type="text" name="name" id=""></td>
  </tr>
  <tr>
    <td>分級</td>
    <td>
      <select name="class" id="">
        <option value="1">普遍級</option>
        <option value="2">輔導級</option>
        <option value="3">保護級</option>
        <option value="4">限制級</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>片長</td>
    <td><input type="text" name="length" ></td>
  </tr>
  <tr>
    <td>上映日期</td>
    <td>
      <select name="year">
        <option value="<?=date("Y")?>"><?=date("Y")?></option>
      </select>年
      <select name="mon">
        <?php
        for($i=1; $i<= 12 ; $i++){
          echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
      </select>月
      <select name="day">
           <?php
             for($i=1; $i<= 31 ; $i++){
               echo '<option value="'.$i.'">'.$i.'</option>';
             }
             ?>
      </select>日
    </td>
  </tr>
  <tr>
    <td>發行商</td>
    <td><input type="text" name="boss" ></td>
  </tr>
  <tr>
    <td>導演</td>
    <td><input type="text" name="director" ></td>
  </tr>
  <tr>
    <td>預告影片</td>
    <td><input type="file" name="mv" ></td>
  </tr>
  <tr>
    <td>電影海報</td>
    <td><input type="file" name="img" ></td>
  </tr>
  <tr>
    <td>劇情簡介</td>
    <td><textarea name="intro" style="width:500px;height:200px"></textarea></td>
  </tr>
</table>
<input type="submit" value="新增"><input type="reset" value="重置">
</form>