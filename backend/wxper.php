<!-- 學經歷管理 -->
<div>
  <h3 class="fw-bold py-3 m-0"><?=$ts[$do];?></h3>
    <section class="border bg-white p-3 rounded-2 mb-5">
      <form method="post" action="api/edit.php">
        <table class="table table-striped  table-hover text-center">
          <thead>
            <tr class="text-nowrap">
              <th scope="col" width="14%">職稱</th>
              <th scope="col" width="17%">公司名稱</th>
              <th scope="col" width="30%">工作內容</th>
              <th scope="col" width="8%">開始年</th>
              <th scope="col" width="8%">結束年</th>
              <th scope="col" width="15%">排序</th>
              <th scope="col" width="4%">顯示</th>
              <th scope="col" width="4%">刪除</th>
            </tr>
          </thead>
          <tbody>
            <?php $rows = $Wxper->all(" order by rank desc"); ?>
            <?php foreach($rows as $key => $value){

                if($key > 0 && $key < (count($rows)-1)){
                  $up = $value['id'] . "-" . $rows[$key-1]['id'];
                  $down = $value['id'] . "-" . $rows[$key+1]['id'];
                }
                if($key == 0){
                  $up = $value['id'] . "-" . $value['id'];
                  $down = $value['id'] . "-" . $rows[$key+1]['id'];
                }
                if($key == (count($rows)-1)){
                  $up = $value['id'] . "-" . $rows[$key-1]['id'];
                  $down = $value['id'] . "-" . $value['id'];
                }
            ?>
              <tr style="text-align:center;">
                <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                <td>
                  <input style="transform:translate(0, 50%)" type="text" name="name[]" value="<?=$value['name'];?>"  class="form-control">
                </td>
                <td>
                  <input style="transform:translate(0, 50%)" type="text" name="title[]" value="<?=$value['title'];?>"  class="form-control">
                </td>
                <td>
                  <textarea name="text[]" style="height:80px" class="form-control"><?=$value['text'];?></textarea>
                </td>
                <td>
                  <input style="transform:translate(0, 50%)" type="text" name="date_start[]" value="<?=$value['date_start'];?>"  class="form-control">
                </td>
                <td>
                  <input style="transform:translate(0, 50%)" type="text" name="date_end[]" value="<?=$value['date_end'];?>"  class="form-control">
                </td>
                <td>
                  <button id="<?=$up?>" class="sw btn btn-secondary" style="transform:translate(0, 50%)">往上</button>
                  <button id="<?=$down?>" class="sw btn btn-secondary" style="transform:translate(0, 50%)">往下</button>
                </td>
                <td class="position-relative">
                  <input type="checkbox" name="sh[]" value="<?=$value['id'];?>" <?=($value['sh'] == 1)?"checked":"";?> class="position-absolute top-0 bottom-0 start-0 end-0 m-auto">
                </td>
                <td class="position-relative">
                  <input type="checkbox" name="del[]" value="<?=$value['id'];?>" class="position-absolute top-0 bottom-0 start-0 end-0 m-auto">
                </td>
              </tr>
            <?php } ?>
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

<script>
  $(".sw").on("click",function(){
    let id = $(this).attr("id").split("-");
    $.post('api/sw.php',{id,'table':'wxper'},(res)=>{
      location.reload();
    })
  })
</script>