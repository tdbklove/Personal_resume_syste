<?php include_once "../base.php";

  $acc = $_POST['acc'];
  $pwd = $_POST['pwd'];

  $admin = $Admin->count(['acc' => $acc, 'pwd' => $pwd]);

  // echo $admin;

  if($admin > 0){
    $_SESSION['user'] = $acc;
    echo "登入成功";
  }else{
    echo "帳號或密碼有誤";
  }

?>