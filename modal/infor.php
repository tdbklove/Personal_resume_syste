<?php include_once "../base.php" ?>

<h3 class="cent fw-bold"><?=$as['infor'];?></h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
  <div class="input-group mb-3">
    <span class="input-group-text">姓名</span>
    <input type="text" name="name" class="form-control">
    <span class="input-group-text">英文姓名</span>
    <input type="text" name="en_name" class="form-control">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">出生日期</span>
    <input type="date" name="brithday" class="form-control">
    <span class="input-group-text">歲數</span>
    <input type="number" name="years_old" min="15" max="65" class="form-control" value="15">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">信箱</span>
    <input type="mail" name="mail" class="form-control">
    <span class="input-group-text">電話</span>
    <input type="tel" name="tel" class="form-control">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">GitHub連結</span>
    <input type="text" name="github" class="form-control">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">CodePen連結</span>
    <input type="text" name="codepen" class="form-control">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">Facebook連結</span>
    <input type="text" name="facebook" class="form-control">
  </div>
  <div class="text-end">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
    <input type="hidden" name="table" value="infor">
  </div>
</form>