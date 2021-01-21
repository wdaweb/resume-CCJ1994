<?php
$sql="select * from {$do} where `parent`='0'"; 
$rows=$pdo->query($sql)->fetchAll();
?>
<form action="./api/edit.php" method="post">
  <div class="d-flex justify-content-between pt-3 pb-2 mb-3 border-bottom">
    <h2 class="title"><?=$tstr[$do];?></h2>
    <div><button id="addbtn" class="btn btn-outline-secondary" type="button"><?=$addstr[$do];?></button></div>
  </div>
  <?php if(empty($rows)){ ?>
    <div class="text-center text-muted">
      <h2>目前無任何選單，請新增</h2>
    </div>
  <?php } 
  foreach($rows as $row){ ?>
  <div class="row g-2 mb-3 text-muted align-items-center border-bottom menuTag">
    <div class="col-5 form-floating overflow-hidden">
      <input name="menu[]" type="text" class="form-control" id="meunMenu<?=$row['id'];?>" value="<?=$row['menu'];?>">
      <label for="meunMenu<?=$row['id'];?>">Menu</label>
    </div>
    <div class="col-5 form-floating overflow-hidden">
      <input name="href[]" type="text" class="form-control" id="meunHref<?=$row['id'];?>" value="<?=$row['href'];?>">
      <label for="meunHref<?=$row['id'];?>">Link</label>
    </div>
    <div class="col-2 text-end">
      <button button class="subbtn btn btn-secondary" type="button"
          onclick="op('#chgModal','.chgContent','./modal/submenu.php?table=<?=$do;?>&id=<?=$row['id'];?>')">次選單</button>
    </div>
    <div class="col-12 d-flex justify-content-end align-items-center">
      <div class="form-check me-1">
        <label class="form-check-label" for="menuSh<?=$row['id'];?>">顯示</label>
        <input class="form-check-input" type="checkbox" id="menuSh<?=$row['id'];?>" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
      </div>
      <div class="form-check">
        <label class="form-check-label" for="menuDel<?=$row['id'];?>">刪除</label>
        <input class="form-check-input" type="checkbox" id="menuDel<?=$row['id'];?>" name="del[]" value="<?=$row['id'];?>">
        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
        <input type="hidden" name="table" value="<?=$do;?>">
      </div>
    </div>
  </div>
  <?php  } ?>
  <?php if(!empty($row)){ ?>
      <div class="text-end">
        <button type="submit" class="btn saveBtn">Save</button>
      </div>
  <?php } ?>
</form>
<script>
  let menuNum=$(".menuTag").length;
    if(menuNum <=5){
      $("input[id^='menuDel']").attr('disabled', true);
    }

</script>