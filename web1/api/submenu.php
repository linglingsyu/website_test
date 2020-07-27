<?php

include_once "../base.php";
$db = new DB("menu");
if (!empty($_POST['id'])) {
  foreach ($_POST['id'] as $key => $id) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
      $db->del($id);
    } else {
      $row = $db->find($id);
      $row['name'] = $_POST['name'][$key];
      $row['link'] = $_POST['link'][$key];
      $db->save($row);
    }
  }
}

if (!empty($_POST['text2'])) {
  foreach ($_POST['text2'] as $key => $text) {
    if (!empty($text)) {
      $data = [];
      $data['name'] = $text;
      $data['link'] = $_POST['link2'][$key];
      $data['parent']  = $_POST['parent'];
      $data['sh'] = 1;
      $db->save($data);
    }
  }
}

to("../admin.php?do=menu");
