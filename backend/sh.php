<!-- 顯示項目管理 -->
<div>
  <h3 class="fw-bold py-3 m-0"><?=$ts[$do];?></h3>
    <section class="border bg-white p-3 rounded-2 mb-5">
      <form method="post" action="api/edit.php">
        <table class="table table-striped  table-hover text-center">
          <thead>
            <tr class="text-nowrap">
              <th scope="col" width="20%">編號</th>
              <th scope="col">履歷項目</th>
              <th scope="col">顯示</th>
            </tr>
          </thead>
          <tbody>
            <?php $rows = $Sh->all(); ?>
            <?php foreach($rows as $key => $value): ?>
              <tr style="text-align:center;">
                <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                <td>
                  <span><?=$key+1?></span>
                </td>
                <td>
                  <span><?=$value['section']?></span>
                </td>
                <td class="position-relative">
                  <input type="checkbox" name="sh[]" value="<?=$value['id'];?>" <?=($value['sh'] == 1)?"checked":"";?> class="position-absolute top-0 bottom-0 start-0 end-0 m-auto">
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
      </table>    
      <table class="w-100">
        <tbody>
          <tr class="row">
            <td class="col-12 text-end">
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