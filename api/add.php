<?php

include_once "../base.php";


$db = new DB($_POST['table']);

if(isset($_FILES['img']['tmp_name'])){
  move_uploaded_file($_FILES['img']['tmp_name'],"../img/" . $_FILES['img']['name']);
  $data['img'] = $_FILES['img']['name'];
}

switch($_POST['table']){
  case 'infor':
    $data['name'] = $_POST['name'];
    $data['en_name'] = $_POST['en_name'];
    $data['brithday'] = $_POST['brithday'];
    $data['years_old'] = $_POST['years_old'];
    $data['mail'] = $_POST['mail'];
    $data['tel'] = $_POST['tel'];
    $data['github'] = $_POST['github'];
    $data['codepen'] = $_POST['codepen'];
    $data['facebook'] = $_POST['facebook'];
    break;
  case 'wxper':
    $data['name'] = $_POST['name'];
    $data['title'] = $_POST['title'];
    $data['text'] = $_POST['text'];
    $data['date_start'] = $_POST['date_start'];
    $data['date_end'] = $_POST['date_end'];
    $data['rank'] = $Wxper->math('max','id')+1;
    $data['sh'] = 1;
    break;
  case 'port':
    $data['title'] = $_POST['title'];
    $data['text'] = $_POST['text'];
    $data['sort'] = $_POST['sort'];
    $data['href'] = $_POST['href'];
    $data['sh'] = 1;
    break;
  case 'skills':
    $data['skill'] = $_POST['skill'];
    $data['perc'] = $_POST['perc'];
    $data['sort'] = $_POST['sort'];
    $data['sh'] = 1;
    break;
  case 'image':
    $data['sort'] = $_POST['sort'];
    $data['sh'] = 0;
    break;
  case 'cond':
    $data['time'] = $_POST['time'];
    $data['day'] = $_POST['day'];
    $data['money'] = $_POST['money'];
    $data['area'] = $_POST['area'];
    $data['job'] = $_POST['job'];
    $data['content'] = $_POST['content'];
    $data['nature'] = $_POST['nature'];
    break;
  case 'admin':
    $data['acc'] = $_POST['acc'];
    $data['pw'] = $_POST['pw'];
    break;
  default:
    $data['text'] = $_POST['text'];
}

$db -> save($data);

to("../backend.php?do=" . $_POST['table']);

?>