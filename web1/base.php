<?php

session_start();
date_default_timezone_set("Asia/Taipei");


if(empty($_SESSION['total'])){
  $db = new DB("total");
  $come = $db->find(1);
  $come['total'] = $come['total']+1;
  $_SESSION['total'] = $come['total'];
  $db->save($come);
}

class DB{
  private $dsn = "mysql:host=localhost;charset=utf8;dbname=db99";
  private $root = "root";
  private $password = "";
  private $pdo;
  private $table;

  //newDB的時候會優先執行這個function
  public function __construct($table){
    $this->table = $table;
    $this->pdo = new PDO($this->dsn,$this->root,$this->password); 
  }

  public function all(...$arg){
    $sql = "select * from $this->table";
    if(!empty($arg[0]) && is_array($arg[0])){
      foreach ($arg[0] as $key => $value){
        $tmp[] = sprintf("`%s`='%s'",$key,$value);
      }
      $sql = $sql ." where " . implode(" && " , $tmp);
    }
    if(!empty($arg[1])){
      $sql = $sql . $arg[1];
    }
    return $this->pdo->query($sql)->fetchAll();
  }

  public function find($arg){
    $sql = "select * from $this->table ";
    if(is_array($arg)){
      foreach ($arg as $key => $value){
        $tmp[] = sprintf("`%s`='%s'",$key,$value);
      }
      $sql = $sql ." where " . implode(" && " , $tmp);
    }else{
      $sql = $sql . " where `id` = '" .$arg. "'";
    }
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
  }

  public function count(...$arg){
    $sql = "select count(*) from $this->table  ";
    if(!empty($arg[0]) && is_array($arg[0])){
      foreach ($arg[0] as $key => $value){
        $tmp[] = sprintf("`%s`='%s'",$key,$value);
      }
      $sql = $sql . " where " .implode(" && " , $tmp);
    }
    if(!empty($arg[1])){
      $sql = $sql . $arg[1];
    }
    return $this->pdo->query($sql)->fetchColumn();
  }

  public function q($sql){
    return $this->pdo->query($sql)->fetchAll();
  }

  public function del($arg){
    $sql = "delete from $this->table ";
    if(is_array($arg)){
      foreach ($arg as $key => $value){
        $tmp[] = sprintf("`%s`='%s'",$key,$value);
      }
      $sql = $sql ." where ". implode(" && " , $tmp);
    }else{
      $sql = $sql . " where `id` = '" .$arg. "'";
    }
    echo $sql;
    return $this->pdo->exec($sql);
  }

  public function save($arg){
    if(!empty($arg['id'])){
      foreach ($arg as $key => $value){
        if($key != "id"){
          $tmp[] = sprintf("`%s`='%s'",$key,$value);
        }
      }
      $sql = "update $this->table set " . implode(" , ",$tmp) . " where `id`='" . $arg['id'] . "'";
    }else{
      $sql = "insert into `$this->table` (`" . implode("`,`",array_keys($arg)) . "`) values ('" . implode("','",$arg) ."')";
    }
    return $this->pdo->exec($sql);
  }


}

function to($url){
  header("location:".$url);
}


?>

