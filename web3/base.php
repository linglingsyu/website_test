<?php

session_start();
date_default_timezone_set("Aisa/Taipei");
class DB{
  private $pdo;
  private $table;
  private $dsb = "mysql:host=localhost;charset=utf8;dbname=db03";
  private $root = "root";
  private $password = "";

  public function __construct($table){
    $this->table = $table;
    $this->pdo = new PDO($this->dsn,$this->root,$this->password);
  }

  public function all(...$arg){
    $sql = "select * from `$this->table` ";
    if(!empty($arg[0]) && is_array($arg)){
      foreach($arg[0] as $k => $v){
        $tmp[] = sprintf("`%s`='%s'",$k,$v);
      }
      $sql = $sql . " where " . implode(" && ",$tmp);
    }
    if(!empty($arg[1])){
      $sql = $sql . $arg[1];
    }
    return $this->pdo->query($sql)->fetchAll();
  }

  public function find($arg){
    $sql = "select * from `$this->table` ";
    if(!empty($arg) && is_array($arg)){
      foreach($arg as $k => $v){
        $tmp[] = sprintf("`%s`='%s'",$k,$v);
      }
      $sql = $sql . " where " . implode(" && ",$tmp);
    }else{
      $sql = $sql . " where `id`='".$arg."'";
    }

    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
  }

  public function count(...$arg){
    $sql = "select count(*) from `$this->table` ";
    if(!empty($arg[0]) && is_array($arg)){
      foreach($arg[0] as $k => $v){
        $tmp[] = sprintf("`%s`='%s'",$k,$v);
      }
      $sql = $sql . " where " . implode(" && ",$tmp);
    }
    if(!empty($arg[1])){
      $sql = $sql . $arg[1];
    }
    return $this->pdo->query($sql)->fetchColumn();
  }

  public function del($arg){
    $sql = "delete from `$this->table` ";
    if(!empty($arg) && is_array($arg)){
      foreach($arg as $k => $v){
        $tmp[] = sprintf("`%s`='%s'",$k,$v);
      }
      $sql = $sql . " where " . implode(" && ",$tmp);
    }else{
      $sql = $sql . " where `id`='".$arg."'";
    }

    return $this->pdo->exec($sql);
  }

  public function q($sql){
    return $this->pdo->query($sql)->fetchAll();
  }

  public function save($arg){
    if(!empty($arg['id'])){
      foreach($arg as $k => $v){
          if($k != "id"){
            $tmp[] = sprintf("`%s`='%s'",$k,$v);
          }
      }
      $sql = "update `$this->table` set " .implode(",",$tmp) . "where `id`=' ". $arg['id'] ." '";
    }else{
      $sql = "insert into `$this->table` (`".implode("`,`",array_keys($arg))."`) values ('".implode("','",$arg)."')";
    }
    return $this->pdo->exec($sql);
  }



}

?>