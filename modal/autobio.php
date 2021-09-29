<?php include_once "../base.php" ?>

<h3 class="cent fw-bold"><?=$as['autobio'];?></h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
  <div class="input-group mb-3" style="height:250px">
    <span class="input-group-text">自傳內容</span>
    <textarea name="text" class="form-control"></textarea>
  </div>
  <div class="text-end">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
    <input type="hidden" name="table" value="autobio">
  </div>
</form>