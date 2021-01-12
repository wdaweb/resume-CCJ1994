<style>
input{
  margin:0 10px;
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

  <div style="display:flex;justify-content:space-around;">
    <div>
      <input type="text" name="year[]" value="<?=$row['year'];?>">年
    </div>
    <div>
      <input type="text" name="month[]" value="<?=$row['month'];?>">月
    </div>
    <div>
      <input type="text" name="company[]" value="<?=$row['company'];?>">公司
    </div>
    <div>
      <input type="text" name="job[]" value="<?=$row['job'];?>">職位
    </div>
    <div>
      刪除<input type="checkbox" name="del[]" value="<?=$row['id'];?>">
    </div>
    <div>
      顯示<input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
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