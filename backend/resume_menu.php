<style>
input {
  width: 100px;
}
</style>
<?php
$sql="select * from {$do} where `parent`=0 "; 
$rows=$pdo->query($sql)->fetchAll();
?>
<h2><?=$tstr[$do];?></h2>

<form action="./api/edit.php" method="post">
  <?php
  foreach($rows as $row){

    ?>

  <div style="display:flex;justify-content:space-around;flex-wrap:wrap;">
    <div class="d-flex flex-column align-items-center">
      <div>選單標題</div>
      <div><input type="text" name="menu[]" value="<?=$row['menu'];?>"></div>
    </div>
    <div class="d-flex flex-column align-items-center">
      <div>選單連結</div>
      <div><input type="text" name="href[]" value="<?=$row['href'];?>"></div>
    </div>
    <div class="d-flex flex-column align-items-center">
      <div>次選單數</div>
      <div>
      <?php
      $sql="select count(*) from $do where `parent`='{$row['id']}'";
      $amount=$pdo->query($sql)->fetchColumn();
      echo $amount;
      ?>
      
      </div>
    </div>
    <div class="d-flex flex-column align-items-center">
      <div>顯示</div>
      <div><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></div>
    </div>
    <div class="d-flex flex-column align-items-center">
      <div>刪除</div>
      <div><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></div>
    </div>
    <div>
      <button class="chgbtn" type="button"
        onclick="op('#chgModal','.chgContent','./modal/submenu.php?table=<?=$do;?>&id=<?=$row['id'];?>')">編輯次選單</button>
    </div>
  </div>
  <input type="hidden" name="id[]" value="<?=$row['id'];?>">

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
<div id="chgModal" style="display:none;">
  <div class="chgModal"></div>
  <div class="chgContent">


  </div>
</div>