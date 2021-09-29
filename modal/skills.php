<?php include_once "../base.php" ?>

<h3 class="cent fw-bold"><?=$as['skills'];?></h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
  <div class="input-group mb-3">
    <span class="input-group-text">專業技能</span>
    <input type="text" name="skill" class="form-control">
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text">熟練度</span>
    <input type="number" name="perc" min="0" max="100" class="form-control" value="0">
    <span class="input-group-text">技能種類</span>
    <select name="sort" class="form-select">
      <option value="1">網頁開發</option>
      <option value="2">影像編修</option>
    </select>
  </div>
  <div class="text-end">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
    <input type="hidden" name="table" value="skills">
  </div>
</form>