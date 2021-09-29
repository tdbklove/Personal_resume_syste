<?php include_once "../base.php" ?>

<h3 class="cent fw-bold"><?=$ims[$_GET['title']]?></h3>
<hr>
<form action="api/upload.php" method="post" enctype="multipart/form-data">
  <div class="input-group mb-3">
    <span class="input-group-text">更換圖片</span>
    <input type="file" name="img" class="form-control">
  </div>
  <div class="text-end">
    <input type="submit" value="更新">
    <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
  </div>
</form>