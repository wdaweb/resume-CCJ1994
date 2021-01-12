<style>
input {
  width: 100px;
}

textarea {
  width: 120px;
  height: 37px;
}
</style>
<?php
$sql="select * from {$do}"; 
$rows=$pdo->query($sql)->fetchAll();
?>
<h2><?=$tstr[$do];?></h2>

<form action="./api/edit.php" method="post">
  <?php
  foreach($rows as $row){

    ?>

  <div style="display:flex;justify-content:space-around;flex-wrap:wrap;">
    <div class="d-flex flex-column align-items-center">
      <div>作品類型</div>
      <div>
        <select name="type[]">
          <option value="1" <?=($row['type']=='1')?'selected':'';?>>網頁設計</option>
          <option value="2" <?=($row['type']=='2')?'selected':'';?>>平面設計</option>
          <option value="3" <?=($row['type']=='3')?'selected':'';?>>攝影</option>
        </select>
      </div>
    </div>
    <div class="d-flex flex-column align-items-center">
      <div>作品</div>
      <div><img src="./image/<?=$row['img'];?>" style="width:100px;height:68px"></div>
    </div>
    <li>描述：
      <textarea name="text" cols="30" rows="5"><?=$row['text'];?></textarea>
    </li>
    <div class="d-flex flex-column align-items-center">
      <div>顯示</div>
      <div><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></div>
    </div>
    <div class="d-flex flex-column align-items-center">
      <div>刪除</div>
      <div><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></div>
    </div>
    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
  </div>
  <?php
  }
  if(!empty($row)){

    ?>
  <input type="submit" value="儲存">
  <?php
  }
  ?>
  <input type="hidden" name="table" value="<?=$do;?>">
</form>