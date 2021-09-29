<?php include_once "../base.php" ?>

<h3 class="cent fw-bold"><?=$as['cond'];?></h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
  <h5>求職條件</h5>
  <div class="input-group mb-3">
    <span class="input-group-text">可上班日</span>
    <input type="text" name="day" class="form-control">
    <span class="input-group-text">上班時段</span>
    <select name="time" class="form-select">
      <option value="1">日班</option>
      <option value="2">夜班</option>
      <option value="3">大夜班</option>
      <option value="4">假日班</option>
    </select>
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">希望薪資</span>
    <input type="text" name="money" class="form-control">
  </div>
  <div class="input-group mb-4">
    <span class="input-group-text">希望地點</span>
    <input type="text" name="area" class="form-control">
  </div>
  <hr>
  <h5>工作描述</h5>
  <div class="input-group mb-3">
    <span class="input-group-text">希望職務</span>
    <input type="text" name="job" class="form-control">
    <span class="input-group-text">工作性質</span>
    <select name="nature" class="form-select">
      <option value="1">全職</option>
      <option value="2">兼職</option>
      <option value="3">實習</option>
      <option value="4">工讀</option>
    </select>
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">工作內容</span>
    <input type="text" name="content" class="form-control">
  </div>
  <div class="text-end">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
    <input type="hidden" name="table" value="cond">
  </div>
</form>