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
      <div>技能/工具</div>
      <div><input type="text" name="skill[]" value="<?=$row['skill'];?>"></div>
    </div>
    <div class="d-flex flex-column align-items-center">
      <div>擅長程度</div>
      <div><input type="text" name="level[]" value="<?=$row['level'];?>">％</div>
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