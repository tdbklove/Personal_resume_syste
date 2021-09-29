<?php include_once "../base.php" ?>

<h3 class="cent fw-bold"><?=$as['wxper'];?></h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
  <div class="input-group mb-3">
    <span class="input-group-text">職稱</span>
    <input type="text" name="name" class="form-control" style="width: 30%;flex-grow: 0;">
    <span class="input-group-text">公司名稱</span>
    <input type="text" name="title" class="form-control">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">開始年</span>
    <input type="text" name="date_start" class="form-control">
    <span class="input-group-text">結束年</span>
    <input type="text" name="date_end" class="form-control">
  </div>
  <div class="input-group mb-3" style="height:250px">
    <span class="input-group-text">工作內容</span>
    <textarea name="text" class="form-control"></textarea>
  </div>
  <div class="text-end">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
    <input type="hidden" name="table" value="wxper">
  </div>
</form>