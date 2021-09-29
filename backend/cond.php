<!-- 求職目標管理 -->
<div>
  <h3 class="fw-bold py-3 m-0"><?=$ts[$do];?></h3>
  <section class="border bg-white p-3 rounded-2 mb-5">
    <form method="post" action="api/edit.php" class="row g-3">
      <?php $rows = $Cond->all(); ?>
      <?php foreach($rows as $key => $value): ?>
      <input type="hidden" name="id[]" value="<?=$value['id'];?>">
      <h5 class="fw-bold">求職條件</h5>
      <div class="col-5">
        <label for="day" class="form-label">可上班日</label>
        <input style="width:100%" type="text" name="day[]" value="<?=$value['day'];?>" class="form-control" id="day">
      </div>
      <div class="col-3">
        <label for="time" class="form-label">上班時段</label>
        <select name="time[]" id="time" class="form-select">
          <option value="1" <?=($value['time'] == 1)?"selected":"";?>>日班</option>
          <option value="2" <?=($value['time'] == 2)?"selected":"";?>>夜班</option>
          <option value="3" <?=($value['time'] == 3)?"selected":"";?>>大夜班</option>
          <option value="4" <?=($value['time'] == 4)?"selected":"";?>>假日班</option>
        </select>
      </div>
      <div class="col-4">
        <label for="money" class="form-label">希望薪資</label>
        <input style="width:100%" type="text" name="money[]" value="<?=$value['money'];?>" class="form-control"
          id="money">
      </div>
      <div class="col-12 mb-4">
        <label for="area" class="form-label">希望地點</label>
        <input style="width:100%" type="text" name="area[]" value="<?=$value['area'];?>" class="form-control" id="area">
      </div>
      <hr>
      <h5 class="fw-bold">工作描述</h5>
      <div class="col-9">
        <label for="job" class="form-label">希望職務</label>
        <input style="width:100%" type="text" name="job[]" value="<?=$value['job'];?>" class="form-control" id="job">
      </div>
      <div class="col-3">
        <label for="nature" class="form-label">工作性質</label>
        <select name="nature[]" id="nature" class="form-select">
          <option value="1" <?=($value['nature'] == 1)?"selected":"";?>>全職</option>
          <option value="2" <?=($value['nature'] == 2)?"selected":"";?>>兼職</option>
          <option value="3" <?=($value['nature'] == 3)?"selected":"";?>>實習</option>
          <option value="4" <?=($value['nature'] == 4)?"selected":"";?>>工讀</option>
        </select>
      </div>
      <div class="col-12">
        <label for="content" class="form-label">工作內容</label>
        <input style="width:100%" type="text" name="content[]" value="<?=$value['content'];?>" class="form-control"
          id="content">
      </div>
      <?php endforeach; ?>
      <?php $add = $Cond->count();?>
      <?php if($add == 0): ?>
      <div class="col-6">
        <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/<?=$do;?>.php&#39;)"
          value="<?=$as[$do];?>">
      </div>
      <?php endif; ?>
      <div class="col text-end">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
        <input type="hidden" name="table" value="<?=$do;?>">
      </div>
    </form>
  </section>
</div>