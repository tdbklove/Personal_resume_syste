<!-- 技能管理 -->
<div>
  <h3 class="fw-bold py-3 m-0"><?=$ts[$do];?></h3>
    <section class="border bg-white p-3 rounded-2 mb-5">
      <form method="post" action="api/edit.php">
        <table class="table table-striped  table-hover text-center">
          <thead>
            <tr class="text-nowrap">
              <th scope="col">專業技能</th>
              <th scope="col">熟練度</th>
              <th scope="col">技能種類</th>
              <th scope="col">顯示</th>
              <th scope="col">刪除</th>
            </tr>
          </thead>
          <tbody>
            <?php $rows = $Skills->all(); ?>
            <?php foreach($rows as $key => $value): ?>
              <tr style="text-align:center;">
                <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                <td>
                  <input type="text" name="skill[]" value="<?=$value['skill'];?>" class="form-control">
                </td>
                <td>
                  <input type="number" name="perc[]" value="<?=$value['perc'];?>" min="0" max="100" class="form-control">
                </td>
                <td>
                  <select name="sort[]" class="form-select">
                    <option value="1" <?=($value['sort'] == 1)?"selected":"";?>>網頁開發</option>
                    <option value="2" <?=($value['sort'] == 2)?"selected":"";?>>影像編修</option>
                  </select>
                </td>
                <td class="position-relative">
                  <input type="checkbox" name="sh[]" value="<?=$value['id'];?>" <?=($value['sh'] == 1)?"checked":"";?> class="position-absolute top-0 bottom-0 start-0 end-0 m-auto">
                </td>
                <td class="position-relative">
                  <input type="checkbox" name="del[]" value="<?=$value['id'];?>" class="position-absolute top-0 bottom-0 start-0 end-0 m-auto">
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
      </table>    
      <table class="w-100">
        <tbody>
          <tr class="row">
            <td class="col-6"><input type="button"
              onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/<?=$do;?>.php&#39;)" value="<?=$as[$do];?>">
            </td>
            <td class="col-6 text-end">
              <input type="submit" value="修改">
              <input type="reset" value="重置">
              <input type="hidden" name="table" value="<?=$do;?>">
            </td>
          </tr>
        </tbody>
        </table>
      </form>
  </section>
</div>