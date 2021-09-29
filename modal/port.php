<?php include_once "../base.php" ?>

<h3 class="cent fw-bold"><?=$as['port'];?></h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
  <div class="input-group mb-3">
    <span class="input-group-text">作品名</span>
    <input type="text" name="title" class="form-control">
    <span class="input-group-text">作品分類</span>
    <select name="sort" class="form-select">
      <option value="1">網頁開發</option>
      <option value="2">影像編修</option>
    </select>
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">圖片上傳</span>
    <input type="file" name="img" class="form-control">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">作品連結</span>
    <input type="text" name="href" class="form-control">
  </div>
  <div class="input-group mb-3" style="height:250px">
    <span class="input-group-text">作品內容</span>
    <textarea name="text" style="height:250px" class="form-control"></textarea>
  </div>
  <div class="text-end">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
    <input type="hidden" name="table" value="port">
  </div>
</form>