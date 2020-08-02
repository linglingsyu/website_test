<fieldset>
  <legend>目前位置：首頁　> 人氣文章區</legend>
  <table>
    <tr>
      <td>標題</td>
      <td>內容</td>
      <td>人氣</td>
    </tr>
    <?php
    $div = 5;
    $nowpage = !empty($_GET['p']) ? $_GET['p'] : 1;
    $totalpage = ceil(($News->count()) / $div);
    $start = ($nowpage - 1) * $div;
    $rows = $News->all(['sh' => 1], " order by `good` desc limit $start,$div ");
    foreach ($rows as $row) {

    ?>
      <tr>
        <td class="title"><?= $row['title'] ?></td>
        <td style="position:relative;">
          <div class="part"><?= mb_substr($row['text'], 0, 10) ?>...</div>
          <div style="display:none;position:absolute;background:#000000;color:#fff;z-index:999;" class="all"><?= nl2br($row['text']) ?></div>
        </td>
        <td> <span id="vie<?=$row['id'] ?>"><?= $row['good'] ?></span>個人說<img style="width:10%" src="icon/02B03.jpg" alt=""> -

          <?php
          if (!empty($_SESSION['user'])) {
            $log = $Log->find(['user' => $_SESSION['user'], 'news' => $row['id']]);
            if (empty($log)) {
          ?>

              <a href="#" id="good<?= $row['id'] ?>" onclick="good(<?= $row['id'] ?>,'1','<?= $_SESSION['user'] ?>')">讚</a>

            <?php
            } else {
            ?>

              <a href="#" id="good<?= $row['id'] ?>" onclick="good(<?= $row['id'] ?>,'2','<?= $_SESSION['user'] ?>')">收回讚</a>

          <?php
            }
          }
          ?>


        </td>
      </tr>
    <?php

    }
    ?>
  </table>
  <div>
    <?php

    if ($nowpage > 1) {
      echo '<a href="?do=pop&p=' . ($nowpage - 1) . '"> < </a>';
    }

    for ($i = 1; $i <= $totalpage; $i++) {
      $size = ($i == $nowpage) ? "24px" : "16px";
      echo '<a style="font-size:' . $size . '" href="?do=pop&p=' . $i . '">' . $i . '</a>';
    }

    if ($nowpage < $totalpage) {
      echo '<a href="?do=pop&p=' . ($nowpage + 1) . '"> > </a>';
    }
    ?>
  </div>
</fieldset>


<script>
  $(".title").hover(function() {
    $(this).next().children().eq(0).toggle();
    $(this).next().children().eq(1).toggle();
  })
</script>