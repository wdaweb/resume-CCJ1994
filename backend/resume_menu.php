<?php
$all=$pdo->query("select count(*) from {$do}")->fetchColumn();
$div=5;
$pages=ceil($all/$div);
$now=(isset($_GET['p']))?$_GET['p']:1;
$start=($now-1)*$div;
$sql="select * from {$do} where `parent`='0' limit $start,$div "; 
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
  <div class="row g-2 mb-3 text-muted align-items-center border-bottom">
    <div class="col-5 form-floating overflow-hidden">
      <input name="menu[]" type="text" class="form-control" id="meunMenu" value="<?=$row['menu'];?>">
      <label for="meunMenu">Menu</label>
    </div>
    <div class="col-5 form-floating overflow-hidden">
      <input name="href[]" type="text" class="form-control" id="meunHref" value="<?=$row['href'];?>">
      <label for="meunHref">Link</label>
    </div>
    <div class="col-2 text-end">
      <button button class="subbtn btn btn-secondary" type="button"
          onclick="op('#chgModal','.chgContent','./modal/submenu.php?table=<?=$do;?>&id=<?=$row['id'];?>')">次選單</button>
    </div>
    <div class="col-12 d-flex justify-content-end align-items-center">
      <div class="form-check me-1">
        <label class="form-check-label" for="menuSh">顯示</label>
        <input class="form-check-input" type="checkbox" id="menuSh" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
      </div>
      <div class="form-check">
        <label class="form-check-label" for="menuDel">刪除</label>
        <input class="form-check-input" type="checkbox" id="menuDel" name="del[]" value="<?=$row['id'];?>">
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
  <div class="d-flex justify-content-center align-items-center">
    <?php if(($now-1)>0){ ?>
    <div class="me-2">
      <a href="?do=resume_jobskill&p=<?=$now-1;?>"><i class="fas fa-caret-left fa-2x" style="color:#273c75;"></i></a>
    </div>
    <?php } ?>
    <div class="btn-toolbar " role="toolbar">
      <div class="btn-group me-2" role="group">
        <?php for($i=1;$i<=$pages;$i++){
            if($i==$now){ ?>
        <a class="btn btn-secondary" href="?do=resume_jobskill&p=<?=$i;?>">
          <?=$i;?>
        </a>
        <?php  }else{ ?>
        <a class="btn btn-outline-secondary" href="?do=resume_jobskill&p=<?=$i;?>">
          <?=$i;?>
        </a>
        <?php  }
        }?>
      </div>
    </div>
    <?php  if($now+1<=$pages){ ?>
    <div class="ms-2">
      <a href="?do=resume_jobskill&p=<?=$now+1;?>"><i class="fas fa-caret-right fa-2x" style="color:#273c75;"></i></a>
    </div>
    <?php } ?>
  </div>
</form>