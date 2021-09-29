<?php include_once "./base.php"; ?>
<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登入</title>
  <!-- css -->
  <link rel="stylesheet" href="plugins/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/login_style.css">
  <!-- jq -->
  <script src="plugins/jquery-3.6.0.min.js"></script>
</head>
<?php $background = $Image->find(['sh'=>1,'sort'=>2]); ?>
<body style="background-image: url(img/<?=$background["img"]?>);">
  <div class="register" style="display: none;"></div>

  <div class="box" style="box-shadow: 0 2px 15px 0 #aaa;">
    <h4 class="fw-bold">後台登入</h4>
    <hr>
    <form>
      <div class="mb-3">
        <label for="acc" class="form-label">帳號：</label>
        <input type="text" name="acc" id="acc" class="form-control">
      </div>
      <div class="mb-3">
        <label for="pwd" class="form-label">密碼：</label>
        <input type="password" name="pwd" id="pwd" class="form-control">
      </div>
      <div class="re text-danger mb-3"></div>
      <div class="text-end">
        <a class="text-decoration-underline">註冊</a>
        <input type="button" value="登入" class="btn btn-success" id="login">
        <input type="reset" value="清除" class="btn btn-success">
      </div>
    </form>
  </div>

</body>
</html>

<script>
  // 登入驗證
  $("#login").on("click",function(){
    let acc = $("#acc").val(),
        pwd = $("#pwd").val();
        console.log(acc,pwd);
    $.post("api/acc.php",{acc,pwd},function(re){
      if(re == "登入成功"){
        location.href="../resume/backend.php";
      }else{
        $(".re").prepend(re);
      }
    })
  })
  
  // 帳號註冊
  $("a").on("click",function(){
    $(".register").css("display","flex");
    $(".register").html(`
    <div class="box">
    <h3 class="fw-bold"><?=$as['admin'];?></h3>
    <hr>
    <form>
      <div class="mb-3">
        <label for="re_acc" class="form-label">帳號：</label>
        <input type="text" name="acc" id="re_acc" class="form-control">
      </div>
      <div class="mb-3">
        <label for="re_pwd" class="form-label">密碼：</label>
        <input type="password" name="pwd" id="re_pwd" class="form-control">
      </div>
      <div class="re_re text-danger mb-3"></div>
      <div class="text-end">
        <input type="button" value="確定" class="btn btn-success">
        <input type="button" value="取消" class="btn btn-success">
        <input type="hidden" name="table" value="admin">
      </div>
    </form>
    </div>
    `);

    $("input[value='取消']").on("click",()=>{
      $(".register").fadeOut();
    });

    $("input[value='確定']").on("click",function(){
      $(".re_re").text("");
      let
        acc = $("#re_acc").val(),
        pwd = $("#re_pwd").val();

      $.post("api/register.php",{acc,pwd},function(re){
        if(re != "註冊成功"){
          $(".re_re").prepend(re);
        }else{
          $(".register").fadeOut();
          $("body").prepend(`
            <div class="alert alert-success" role="alert">${re}</div>
          `);

          $(".alert").delay(3000).fadeOut();
        }
      })

    })
  })

</script>