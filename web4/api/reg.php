<?php
include_once "../base.php";

$data = [
  "name"=>$_POST['name'],
  "acc"=>$_POST['acc'],
  "pw"=>$_POST['pw'],
  "tel"=>$_POST['tel'],
  "email"=>$_POST['email'],
  "addr"=>$_POST['addr']
];

$Member->save($data);

?>