<!-- 圖片管理 -->
<div>
  <h3 class="fw-bold py-3 m-0"><?=$ts[$do];?></h3>
    <section class="border bg-white p-3 rounded-2 mb-5">
      <form method="post" action="api/edit.php">
        <table class="table table-striped  table-hover text-center">
          <thead>
            <tr class="text-nowrap">
            <th scope="col" width="">顯示圖片</th>
              <th scope="col" width="">圖片分類</th>
              <th scope="col" width="">顯示</th>
              <th scope="col" width="">刪除</th>
              <th scope="col" width=""></th>
            </tr>
          </thead>
          <tbody>
            <?php $rows = $Image->all(['sort'=>1]," order by sh desc"); ?>
            <?php foreach($rows as $key => $value): ?>
              <tr style="text-align:center;">
                <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                <td>
                  <img src="img/<?=$value['img'];?>" style="width:120px; height:120px; border-radius: 50%; object-fit:cover;">
                </td>
                <td>
                  <select name="sort[]" class="form-select" style="transform:translate(0, 80%)">
                    <option value="1" <?=($value['sort'] == 1)?"selected":"";?>>頭像</option>
                    <option value="2" <?=($value['sort'] == 2)?"selected":"";?>>背景</option>
                  </select>
                </td>
                <td class="position-relative">
                  <input type="radio" name="sh1" value="<?=$value['id'];?>" <?=($value['sh'] == 1)?"checked":"";?> class="position-absolute top-0 bottom-0 start-0 end-0 m-auto">
                </td>
                <td class="position-relative">
                  <input type="checkbox" name="del[]" value="<?=$value['id'];?>" class="position-absolute top-0 bottom-0 start-0 end-0 m-auto">
                </td>
                <td>
                  <input type="button" value="更換圖片" class="btn btn-secondary"
                  onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/image_update.php?id=<?=$value['id'];?>&title=avatar&table=image&#39;)" style="transform:translate(0, 80%)">
                </td>
              </tr>
            <?php endforeach; ?>
            <?php $rows = $Image->all(['sort'=>2]," order by sh desc"); ?>
            <?php foreach($rows as $key => $value): ?>
              <tr style="text-align:center;">
                <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                <td>
                  <img src="img/<?=$value['img'];?>" style="width:250px; height:100px; object-fit:cover;">
                </td>
                <td>
                  <select name="sort[]" class="form-select" style="transform:translate(0, 80%)">
                    <option value="1" <?=($value['sort'] == 1)?"selected":"";?>>頭像</option>
                    <option value="2" <?=($value['sort'] == 2)?"selected":"";?>>背景</option>
                  </select>
                </td>
                <td class="position-relative">
                  <input type="radio" name="sh2" value="<?=$value['id'];?>" <?=($value['sh'] == 1)?"checked":"";?> class="position-absolute top-0 bottom-0 start-0 end-0 m-auto">
                </td>
                <td class="position-relative">
                  <input type="checkbox" name="del[]" value="<?=$value['id'];?>" class="position-absolute top-0 bottom-0 start-0 end-0 m-auto">
                </td>
                <td>
                  <input type="button" value="更換圖片" class="btn btn-secondary"
                  onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/image_update.php?id=<?=$value['id'];?>&title=background&table=image&#39;)" style="transform:translate(0, 80%)">
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