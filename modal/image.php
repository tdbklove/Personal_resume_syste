<?php include_once "../base.php" ?>

<h3 class="cent fw-bold"><?=$as['image'];?></h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
  <div class="input-group mb-3">
    <span class="input-group-text">圖片上傳</span>
    <input type="file" name="img" class="form-control" style="width:55%;">
    <span class="input-group-text">圖片分類</span>
    <select name="sort" class="form-select">
      <option value="1">頭像</option>
      <option value="2">背景</option>
    </select>
  </div>
  <div class="text-end">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
    <input type="hidden" name="table" value="image">
  </div>
</form>