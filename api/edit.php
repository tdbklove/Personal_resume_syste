<?php include_once "../base.php";

// $texts = $_POST['text'];
$ids = $_POST['id'];
$table = $_POST['table'];
$db = new DB($table);

foreach($ids as $key => $id){

  // 判斷刪除是否宣告與陣列中是否有相應id
  if(isset($_POST['del']) && in_array($id,$_POST['del'])){
    // 刪除相應id的資料
    $db -> del($id);
  }else{
    // 搜尋資料
    $row = $db -> find($id);
  
    // 修改資料(替代文字)
    // 修改資料(顯示)
    switch($table){
      case 'infor':
        $row['name'] = $_POST['name'][$key];
        $row['en_name'] = $_POST['en_name'][$key];
        $row['brithday'] = $_POST['brithday'][$key];
        $row['years_old'] = $_POST['years_old'][$key];
        $row['mail'] = $_POST['mail'][$key];
        $row['tel'] = $_POST['tel'][$key];
        $row['github'] = $_POST['github'][$key];
        $row['codepen'] = $_POST['codepen'][$key];
        $row['facebook'] = $_POST['facebook'][$key];
        break;
      case 'autobio':
        $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id)?1:0;
        $row['text'] = $_POST['text'][$key];
        break;
      case 'wxper':
        $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh']))?1:0;
        $row['name'] = $_POST['name'][$key];
        $row['title'] = $_POST['title'][$key];
        $row['text'] = $_POST['text'][$key];
        $row['date_start'] = $_POST['date_start'][$key];
        $row['date_end'] = $_POST['date_end'][$key];
        break;
      case 'port':
        $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh']))?1:0;
        $row['title'] = $_POST['title'][$key];
        $row['text'] = $_POST['text'][$key];
        $row['href'] = $_POST['href'][$key];
        $row['sort'] = $_POST['sort'][$key];
        break;
      case 'skills':
        $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh']))?1:0;
        $row['skill'] = $_POST['skill'][$key];
        $row['perc'] = $_POST['perc'][$key];
        $row['sort'] = $_POST['sort'][$key];
        break;
      case 'image':
        if($_POST['sort'][$key] == 1){
          $row['sh'] = (isset($_POST['sh1']) && $_POST['sh1'] == $id)?1:0;
        }else{
          $row['sh'] = (isset($_POST['sh2']) && $_POST['sh2'] == $id)?1:0;
        }
        $row['sort'] = $_POST['sort'][$key];
        break;
      case 'cond':
        $row['time'] = $_POST['time'][$key];
        $row['day'] = $_POST['day'][$key];
        $row['money'] = $_POST['money'][$key];
        $row['area'] = $_POST['area'][$key];
        $row['job'] = $_POST['job'][$key];
        $row['content'] = $_POST['content'][$key];
        $row['nature'] = $_POST['nature'][$key];
        break;
      case 'admin':
        $row['acc'] = $_POST['acc'][$key];
        $row['pwd'] = $_POST['pwd'][$key];
        break;
      case 'sh':
        $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh']))?1:0;
        break;
      default:
        $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh']))?1:0;
        $row['text'] = $_POST['text'][$key];
    }

    // 修改資料(顯示)
    // $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id)?1:0;

    // 修改資料(顯示)
    // if(isset($_POST['sh']) && $_POST['sh'] == $id){
    //   $row['sh'] = 1;
    // }else{
    //   $row['sh'] = 0;
    // }
    
    // 更新修改資料
    $db->save($row);
    // print_r($_POST);
  }

}

to("../backend.php?do=" . $table);


?>