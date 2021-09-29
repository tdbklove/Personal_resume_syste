<!-- 帳號管理 -->
<div>
  <h3 class="fw-bold py-3 m-0"><?=$ts[$do];?></h3>
    <section class="border bg-white p-3 rounded-2 mb-5">
      <form method="post" action="api/edit.php">
        <table class="table table-striped  table-hover text-center">
          <thead>
            <tr class="text-nowrap">
              <th scope="col">編號</th>
              <th scope="col">帳號</th>
              <th scope="col">密碼</th>
              <th scope="col">刪除</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if($_SESSION['user'] == "admin"){
              $rows = $Admin->all();
            }else{
              $rows = $Admin->all(['acc' => $_SESSION['user']]);
            }
            ?>
            <?php foreach($rows as $key => $value): ?>
              <tr style="text-align:center;">
                <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                <td>
                  <span style="line-height:37px"><?=$key+1?></span>
                </td>
                <td>
                  <input type="text" name="acc[]" value="<?=$value['acc'];?>" class="form-control">
                </td>
                <td>
                  <input type="password" name="pwd[]" value="<?=$value['pwd'];?>" class="form-control">
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