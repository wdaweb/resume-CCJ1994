<?php
$sql="select * from {$do}"; 
$rows=$pdo->query($sql)->fetchAll();
?>
<div
  class="pt-3 pb-2 mb-3 border-bottom">
  <h2><?=$tstr[$do];?></h2>
</div>
<form action="./api/edit.php" method="post">
<div id="works" class="row  row-cols-1 row-cols-md-3 g-3 my-3">
<?php
  foreach($rows as $row){
  ?>
  <div class="col my-3">
    <div class="card border-0">
    <img src="./image/<?=$row['img'];?>" class="card-img-top" style="height:180px;object-fit:cover;">
      <div class="card-body"> 
        <div class="card-title form-floating border-bottom">
          <select class="form-select border-0" id="selectWork<?=$row['id'];?>" name="type[]">
            <option value="1" <?=($row['type']=='1')?'selected':'';?>>Web Design</option>
            <option value="2" <?=($row['type']=='2')?'selected':'';?>>Graphic Design</option>
            <option value="3" <?=($row['type']=='3')?'selected':'';?>>Photography</option>
          </select>
          <label for="selectWork<?=$row['id'];?>">作品類型</label>
        </div>
        <div class="card-text border-bottom my-3">
          <textarea class="form-control border-0" name="text[]" placeholder="Description" style="height: 80px"><?=$row['text'];?></textarea>
        </div>
          <div class="d-flex justify-content-end">
            <div class="form-check mx-2">
              <input class="form-check-input" type="checkbox" id="workDel" name="del[]" value="<?=$row['id'];?>">
              <label class="form-check-label" for="workDel">刪除</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="btnSh<?=$row['id'];?>" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
              <label class="form-check-label" for="btnSh<?=$row['id'];?>">顯示</label>
            </div>
            <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            <input type="hidden" name="table" value="<?=$do;?>">
          </div>
          <div >
            <button class="chgbtn btn btn-secondary" type="button" onclick="op('#chgModal','.chgContent','./modal/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>')">更換</button>
          </div>
      </div>
    </div>
  </div>
  <?php
  }
  ?>
  <button id="addbtn" class="btn" type="button"><i class="far fa-plus-square fa-2x"></i></button>
</div>
  <?php
  if(!empty($row)){
  ?>
  <div class="text-end">
    <button type="submit" class="btn saveBtn">Save</button>
  </div>
  <?php
  }
  ?>
  </form>
<div id="chgModal" style="display:none;">
  <div class="chgModal"></div>
  <div class="chgContent">
  </div>
</div>