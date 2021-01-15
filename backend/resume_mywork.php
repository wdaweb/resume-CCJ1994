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
          <option value="1" <?=($row['type']=='1')?'selected':'';?>>Web Design</option>
          <option value="2" <?=($row['type']=='2')?'selected':'';?>>Graphic Design</option>
          <option value="3" <?=($row['type']=='3')?'selected':'';?>>Photography</option>
        </select>
      </div>
    </div>
    <div class="d-flex flex-column align-items-center">
      <div>作品</div>
      <div><img src="./image/<?=$row['img'];?>" style="width:100px;height:68px"></div>
    </div>
    <div>
      <div>描述：</div>
      <textarea name="text[]" cols="30" rows="5"><?=$row['text'];?></textarea>
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
      <button class="chgbtn" type="button" onclick="op('#chgModal','.chgContent','./modal/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>')">更換圖片</button>
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