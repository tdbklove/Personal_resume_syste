<?php include_once "../base.php";

  $acc = $_POST['acc'];
  $pwd = $_POST['pwd'];

  $admin_acc = $Admin->count(['acc' => $acc]);
  $admin = $Admin->count(['acc' => $acc , 'pwd' => $pwd]);

  // echo $admin;

  if($admin_acc > 0){
    echo "帳號重複";
  }elseif($admin > 0){
    echo "密碼重複";
  }else{
    $Admin->save($_POST);
    echo "註冊成功";
  }

?>