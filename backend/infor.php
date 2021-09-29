<!-- 個人資料管理 -->
<div>
  <h3 class="fw-bold py-3 m-0"><?=$ts[$do];?></h3>
    <section class="border bg-white p-3 rounded-2  mb-5">
      <form method="post" action="api/edit.php" class="row g-3">
        <?php $rows = $Infor->all(); ?>
        <?php foreach($rows as $key => $value): ?>
        <input type="hidden" name="id[]" value="<?=$value['id'];?>">
          <div class="col-3">
            <label for="name" class="form-label">姓名</label>
            <input style="width:100%" type="text" name="name[]" value="<?=$value['name'];?>" class="form-control" id="name">
          </div>
          <div class="col-3">
            <label for="en_name" class="form-label">英文姓名</label>
            <input style="width:100%" type="text" name="en_name[]" value="<?=$value['en_name'];?>" class="form-control" id="en_name">
          </div>
          <div class="col-3">
            <label for="brithday" class="form-label">出生日期</label>
            <input style="width:100%" type="date" name="brithday[]" value="<?=$value['brithday'];?>" class="form-control" id="brithday">
          </div>
          <div class="col-3">
            <label for="number" class="form-label">歲數</label>
            <input style="width:100%" type="number" name="years_old[]" value="<?=$value['years_old'];?>" min="15" max="65" class="form-control" id="number">
          </div>
          <div class="col-6">
            <label for="mail" class="form-label">信箱</label>
            <input style="width:100%" type="mail" name="mail[]" value="<?=$value['mail'];?>" class="form-control" id="mail">
          </div>
          <div class="col-6">
            <label for="tel" class="form-label">電話</label>
            <input style="width:100%" type="tel" name="tel[]" value="<?=$value['tel'];?>" class="form-control" id="tel">
          </div>
          <div class="col-12 input-group mb-3">
            <label for="github" class="form-label">GitHub連結</label>
            <input style="width:100%" type="text" name="github[]" value="<?=$value['github'];?>" class="form-control" id="github">
          </div>
          <div class="col-12">
            <label for="codepen" class="form-label">CodePen連結</label>
            <input style="width:100%" type="text" name="codepen[]" value="<?=$value['codepen'];?>" class="form-control" id="codepen">
          </div>
          <div class="col-12">
            <label for="facebook" class="form-label">Facebook連結</label>
            <input style="width:100%" type="text" name="facebook[]" value="<?=$value['facebook'];?>" class="form-control" id="facebook">
          </div>
        <?php endforeach; ?>
        <?php $add = $Infor->count();?>
          <?php if($add == 0): ?>
            <div class="col-6">
              <input type="button"
              onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/<?=$do;?>.php&#39;)" value="<?=$as[$do];?>">
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