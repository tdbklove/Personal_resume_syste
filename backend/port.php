<!-- 作品集管理 -->
<div>
  <h3 class="fw-bold py-3 m-0"><?=$ts[$do];?></h3>
    <section class="border bg-white p-3 rounded-2 mb-5">
      <form method="post" action="api/edit.php">
        <table class="table table-striped  table-hover text-center">
          <thead>
            <tr class="text-nowrap">
            <th scope="col" width="8%">顯示圖片</th>
              <th scope="col" width="15%">作品名</th>
              <th scope="col">作品介紹</th>
              <th scope="col" width="17%">作品連結</th>
              <th scope="col" width="13%">作品分類</th>
              <th scope="col" width="5%">顯示</th>
              <th scope="col" width="5%">刪除</th>
              <th scope="col" width="8%"></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $count = $Port->count();
              $div = 4;
              $page = ceil($count/$div);
              $now = (isset($_GET['p']))?$_GET['p']:1;
              $start = ($now-1)*$div;
              $rows = $Port->all(" order by id desc limit $start, $div");
            ?>
            <?php foreach($rows as $key => $value): ?>
              <tr style="text-align:center;">
                <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                <td>
                  <img src="img/<?=$value['img'];?>" style="width:133.3px; height:100px; object-fit:cover;">
                </td>
                <td>
                  <input type="text" name="title[]" value="<?=$value['title'];?>" class="form-control" style="transform:translate(0, 80%)">
                </td>
                <td>
                  <textarea name="text[]" style="height:100px" class="form-control"><?=$value['text'];?></textarea>
                </td>
                <td>
                  <input type="text" name="href[]" value="<?=$value['href'];?>" class="form-control" style="transform:translate(0, 80%)">
                </td>
                <td>
                  <select name="sort[]" class="form-select" style="transform:translate(0, 80%)">
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
                <td>
                  <input type="button" value="更換圖片" class="btn btn-secondary"
                  onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/image_update.php?id=<?=$value['id'];?>&title=port&table=port&#39;)" style="transform:translate(0, 80%)">
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
      </table>
      <div class="page">
        <?php if($now-1 > 0): ?>
          <a href="?do=port&p=<?=$now-1?>" class="m-1">
            <i class="fas fa-caret-left"></i>
          </a>
        <?php endif; ?>
        <?php for($i=1; $i <= $page; $i++): ?>
            <a href="?do=port&p=<?=$i?>" class="m-1"><?=$i?></a>
        <?php endfor; ?>
        <?php if($now+1 <= $page): ?>
          <a href="?do=port&p=<?=$now+1?>" class="m-1">
            <i class="fas fa-caret-right"></i>
          </a>
        <?php endif; ?>
      </div>  
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