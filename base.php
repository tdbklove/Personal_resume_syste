<?php

  session_start();
  date_default_timezone_set("Asia/Taipei");

  $ts=[
    'infor'=>'個人基本資料管理',
    'autobio'=>'自傳管理',
    'wxper'=>'學經歷管理',
    'skills'=>'技能管理',
    'port'=>'作品集管理',
    'image'=>'圖片管理',
    'cond'=>'求職目標管理',
    'total'=>'進站總人數管理',
    'admin'=>'帳號管理',
    'sh'=>'顯示項目管理',
  ];

  $as=[
    'infor'=>'新增個人基本資料',
    'autobio'=>'新增自傳',
    'wxper'=>'新增經歷',
    'skills'=>'新增技能',
    'port'=>'新增作品',
    'image'=>'新增圖片',
    'cond'=>'新增項目',
    'total'=>'進站總人數管理',
    'admin'=>'註冊',
  ];

  $ims=[
    'port'=>'更換作品圖片',
    'avatar'=>'更換頭像圖片',
    'background'=>'更換背景圖片',
  ];

  class DB{
      private $dsn = "mysql:host=localhost;charset=utf8;dbname=s1100202";
      private $root = "s1100202";
      private $password = "s1100202";
      private $table;
      private $pdo;

      public function __construct($table){
        $this->table = $table;
        $this->pdo = new PDO($this->dsn,$this->root,$this->password);
      }

      public function all(...$arg){
        $sql = "select * from $this->table ";
        if(isset($arg[0])){
          if(is_array($arg[0])){
            foreach($arg[0] as $key => $value){
              $tmp[] = sprintf("`%s`='%s'",$key,$value);
            }
            $sql = $sql . " where " . implode(" && ",$tmp);
          }else{
            $sql = $sql . $arg[0];
          }
          if(isset($arg[1])){
            $sql = $sql . $arg[1];
          }
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchAll();
      }

      public function count(...$arg){
        $sql = "select count(*) from $this->table ";
        if(isset($arg[0])){
          if(is_array($arg[0])){
            foreach($arg[0] as $key => $value){
              $tmp[] = sprintf("`%s`='%s'",$key,$value);
            }
            $sql = $sql . " where " . implode(" && ",$tmp);
          }else{
            $sql = $sql . $arg[0];
          }
          if(isset($arg[1])){
            $sql = $sql . $arg[1];
          }
        }
        return $this->pdo->query($sql)->fetchColumn();
      }

      public function sum($col){
        $sql="select sum($col) from $this->table ";
        //echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
      }

      public function find($id){
        $sql = "select * from $this->table ";
        if(is_array($id)){
          foreach($id as $key => $value){
            $tmp[] = sprintf("`%s`='%s'",$key,$value);
          }
          $sql = $sql . " where " . implode(" && ",$tmp);
        }else{
          $sql = $sql . " where `id`= '$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
      }

      public function math($math,$col){
        $sql = "select $math($col) from $this->table ";

        return $this->pdo->query($sql)->fetchColumn();
      }

      public function del($id){
        $sql = "delete from $this->table ";
        if(is_array($id)){
          foreach($id as $key => $value){
            $tmp[] = sprintf("`%s`='%s'",$key,$value);
          }
          $sql = $sql . " where " . implode(" && ",$tmp);
        }else{
          $sql = $sql . " where `id`= '$id'";
        }
        return $this->pdo->exec($sql);
      }

      public function save($array){
        if(isset($array['id'])){
          foreach($array as $key => $value){
            if($key != 'id'){
              $tmp[] = sprintf("`%s`='%s'",$key,$value);
            }
          }
          $sql = "update $this->table set " . implode(",",$tmp) . " where `id` = '{$array['id']}'";
        }else{
          $sql = "insert into $this->table 
          (`" . implode("`,`",array_keys($array)) . "`) values
          ('" . implode("','",$array) . "')";
        }
        //echo $sql;
        return $this->pdo->exec($sql);
      }
  }

  function to($url){
    header("location:" . $url);
  }

  $Infor = new DB("infor");
  $Autobio = new DB("autobio");
  $Wxper = new DB("wxper");
  $Port = new DB("port");
  $Total = new DB("total");
  $Image = new DB("image");
  $Cond = new DB("cond");
  $Skills = new DB("skills");
  $Admin = new DB("admin");
  $Sh = new DB("sh");

  if($Total->count(['date'=>date("Y-m-d")]) <= 0){
    $Total->save(['date'=>date("Y-m-d"),'total'=>0]);
  }

  if(!isset($_SESSION['total'])){
    $total = $Total->find(['date'=>date("Y-m-d")]);
    $total['total']+=1;
    $Total->save($total);
    $_SESSION['total'] = 1;
  }

  $allTime = ["日班","夜班","大夜班","假日班"];
  $allNature = ["全職","兼職","實習","工讀"];

?>