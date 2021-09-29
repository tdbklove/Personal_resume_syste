<?php include "base.php";
  if(!isset($_SESSION['user']) || $Admin->count(['acc'=>$_SESSION['user']]) == 0) to('../resume/login.php');
?>
<style>
  *{
    color: #334b66;
  }
</style>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0068)?do=admin&redo=title -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>線上履歷管理系統</title>
  <!-- <link href="./css/css.css" rel="stylesheet" type="text/css"> -->
  <link rel="stylesheet" href="plugins/bootstrap.min.css">
  <script src="plugins/bootstrap.bundle.min.js"></script>
  <script src="plugins/jquery-3.6.0.min.js"></script>
  <script src="plugins/js.js"></script>
  <!-- icon -->
  <script src="https://kit.fontawesome.com/587e13d6a7.js" crossorigin="anonymous"></script>
  <!-- css -->
  <link rel="stylesheet" href="plugins/custom.css">
  
</head>

<body class="bg-light vh-100">
  <div id="cover" style="display:none;">
    <div id="coverr" style="border-radius:10px;">
      <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9999;padding:50px 30px;"></div>
      <i class="far fa-times-circle fs-4 position-absolute" style="right:10px; top:10px; cursor:pointer; z-index:9999;"></i>
    </div>
  </div>

  <!-- 導覽列 -->
  <nav class="navbar navbar-dark bg-cadetblue">
    <div class="container">
      <a class="navbar-brand" href="#">後台管理</a>
      <div>
        <button class="btn btn-outline-light me-2" onclick="location.replace(&#39;index.php&#39;)">回到前台</button>
        <button class="btn btn-outline-light" onclick="location.replace(&#39;logout.php&#39;)">登出</button>
      </div>
    </div>
  </nav>
  <article class="container pt-2">
    <!-- 選單區 -->
      <div class="row">
        <nav class="col-2">
          <div class="list-group sticky-top pt-3" style="z-index:0">
            <!--主選單放此-->
            <a class="list-group-item list-group-item-action" href="./backend.php?do=infor">
              <?=$ts['infor']?>
            </a>
            <a class="list-group-item list-group-item-action" href="?do=autobio">
              <?=$ts['autobio']?>
            </a>
            <a class="list-group-item list-group-item-action" href="?do=cond">
              <?=$ts['cond']?>
            </a>
            <a class="list-group-item list-group-item-action" href="?do=wxper">
              <?=$ts['wxper']?>
            </a>
            <a class="list-group-item list-group-item-action" href="?do=skills">
              <?=$ts['skills']?>
            </a>
            <a class="list-group-item list-group-item-action" href="?do=port">
              <?=$ts['port']?>
            </a>
            <a class="list-group-item list-group-item-action" href="?do=image">
              <?=$ts['image']?>
            </a>
            <a class="list-group-item list-group-item-action" href="?do=sh">
              <?=$ts['sh']?>
            </a>
            <a class="list-group-item list-group-item-action" href="?do=admin">
              <?=$ts['admin']?>
            </a>
          </div>
        </nav>
        <section class="col-10 mb-5">
          <!--正中央-->
          <?php
            $do=(isset($_GET['do']))?$_GET['do']:'infor';
            $file="backend/".$do.".php";
            // 先判斷檔案是否存在
            if(file_exists($file)){
              include $file;
            }else{
              include "backend/infor.php";
            }
          ?>
        </section>
      </div>
  </article>
  <footer class="bg-secondary w-100 position-fixed bottom-0 p-1">
    <div class="container-xxl text-end">
      <span class="text-light me-5">今日瀏覽人數 : <?=$Total->find(['date' => date('Y-m-d')])['total'];?></span>
      <span class="text-light">總瀏覽人數 : <?=$Total->sum('total');?></span>
    </div>
  </footer>
</body>
</html>
<script>
  $("i.fa-times-circle").click(function(){
    $("#cover").fadeOut();
  })
</script>