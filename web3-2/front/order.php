<div class="ord">
  <form action="">
    電影：<select name="name" id="name">
      <?php
      $today = date("Y-m-d");
      $ondate = date("Y-m-d", strtotime("-2 days"));
      $movie = $Movie->all(['sh' => 1], " && `date` >= '$ondate' && `date` <= '$today' ");
      foreach ($movie as $m) {
        $chk = ($m['id'] == $_GET['id']) ? "selected" : "";
      ?>
        <option value="<?= $m['id'] ?>" <?= $chk ?>><?= $m['name'] ?></option>
      <?php
      }
      ?>
    </select><br>
    日期：<select name="date" id="date"></select><br>
    場次：<select name="session" id="session"></select><br>
    <button type="button" onclick="go()">送出</button><input type="reset" value="重置">
  </form>
</div>


<style>
  .seat {
    display: flex;
    flex-wrap: wrap;
    width: 410px;
  }

  .item {
    width: 80px;
    height: 100px;
    border: 1px solid #000;
    text-align: center;
  }

  .aaa {
    display: none;
  }

  #checkbox {
    float: right;
  }
</style>
<div class="aaa">
  <div class="seat">

    <?php
    for ($i = 0; $i < 20; $i++) {
      $r = floor($i / 5) + 1;
      $c = ($i % 5) + 1;
      echo '<div class="item"><img src="icon/03D02.png"><br>' . $r . '排' . $c . '號<input type="checkbox" id="checkbox" name="seat[]" value="' . $i . '"></div>';
    }
    ?>
  </div>
  <div id="m"></div>
  <div id="t"></div>
  <div id="o"></div>
</div>






<script>
  getdate();
  $("#name").on("change", function() {
    getdate();
  })

  function getdate() {
    let movie = $("#name").val();
    $.post("api/getdate.php", {
      movie
    }, function(res) {

      $("#date").html(res);

      getsession();

      $("#date").on("change", function() {
        getsession();
      })
    })
  }


  function getsession() {
    let m_id = $("#name").val();
    let date = $("#date").val();
    $.post("api/getsession.php", {
      m_id,
      date
    }, function(res) {
      $("#session").html(res);
    })
  }


  function go() {
    $(".ord").hide();
    $(".aaa").show();
    let movie = $("#name").val();
    let date = $("#date").val();
    let session = $("#session").val();
    console.log(movie,date,session);
    $("#m").html(`您選擇的電影是：${movie}`)
    $("#t").html(date+" "+session);
    $("#o").html(`您已勾選了0張票，最多可以購買四張票`)
  }
</script>