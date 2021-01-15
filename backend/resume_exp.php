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
      <div>年份</div>
      <div><input type="text" name="year[]" value="<?=$row['year'];?>"></div>
    </div>
    <div class="d-flex flex-column align-items-center">
      <div>月份</div>
      <div><input type="text" name="month[]" value="<?=$row['month'];?>"></div>
    </div>
    <div class="d-flex flex-column align-items-center">
      <div>公司</div>
      <div><input type="text" name="company[]" value="<?=$row['company'];?>"></div>
    </div>
    <div class="d-flex flex-column align-items-center">
      <div>職位</div>
      <div><textarea name="job[]" rows="5"><?=$row['job'];?></textarea></div>
    </div>
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