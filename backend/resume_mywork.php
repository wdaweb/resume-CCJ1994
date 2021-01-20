<?php
$all=$pdo->query("select count(*) from {$do}")->fetchColumn();
$div=5;
$pages=ceil($all/$div);
$now=(isset($_GET['p']))?$_GET['p']:1;
$start=($now-1)*$div;
$sql="select * from {$do} limit $start,$div"; 
$rows=$pdo->query($sql)->fetchAll();
?>
<div class="pt-3 pb-2 mb-3 border-bottom">
  <h2 class="title"><?=$tstr[$do];?></h2>
</div>
<form action="./api/edit.php" method="post">
  <div id="works" class="row  row-cols-1 row-cols-md-3 g-3 my-3">
    <?php
  foreach($rows as $row){
  ?>
    <div class="col my-2">
      <div class="card border-0">
        <img src="./image/<?=$row['img'];?>" class="card-img-top" style="height:180px;object-fit:cover;">
        <div class="card-body">
          <div class="card-title form-floating border-bottom">
            <select class="form-select border-0" id="selectWork<?=$row['id'];?>" name="type[]">
              <option value="1" <?=($row['type']=='1')?'selected':'';?>>Web Design</option>
              <option value="2" <?=($row['type']=='2')?'selected':'';?>>Graphic Design</option>
              <option value="3" <?=($row['type']=='3')?'selected':'';?>>Photography</option>
            </select>
            <label for="selectWork<?=$row['id'];?>" style="font-size:12px;">作品類型</label>
          </div>
          <div class="card-text border-bottom my-3">
            <textarea class="form-control border-0" name="text[]" placeholder="Description"
            ><?=$row['text'];?></textarea>
          </div>
          <div class="d-flex justify-content-end">
            <div class="form-check mx-2">
              <input class="form-check-input" type="checkbox" id="workSh<?=$row['id'];?>" name="sh[]"
                value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
              <label class="form-check-label" for="workSh<?=$row['id'];?>">顯示</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="workDel<?=$row['id'];?>" name="del[]"
                value="<?=$row['id'];?>">
              <label class="form-check-label" for="workDel<?=$row['id'];?>">刪除</label>
            </div>
            <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            <input type="hidden" name="table" value="<?=$do;?>">
          </div>
          <div>
            <button class="chgbtn btn btn-secondary" type="button"
              onclick="op('#chgModal','.chgContent','./modal/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>')">更換</button>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <button id="addbtn" class="btn" type="button"><i class="far fa-plus-square fa-2x"></i></button>
  </div>
  <div class="d-flex justify-content-center align-items-center">
    <?php if(($now-1)>0){ ?>
    <div class="me-2">
      <a href="?do=resume_mywork&p=<?=$now-1;?>"><i class="fas fa-caret-left fa-2x" style="color:#273c75;"></i></a>
    </div>
    <?php } ?>
    <div class="btn-toolbar " role="toolbar">
      <div class="btn-group me-2" role="group">
        <?php for($i=1;$i<=$pages;$i++){
            if($i==$now){ ?>
        <a class="btn btn-secondary" href="?do=resume_mywork&p=<?=$i;?>">
          <?=$i;?>
        </a>
        <?php  }else{ ?>
        <a class="btn btn-outline-secondary" href="?do=resume_mywork&p=<?=$i;?>">
          <?=$i;?>
        </a>
        <?php  }
        }?>
      </div>
    </div>
    <?php  if($now+1<=$pages){ ?>
    <div class="ms-2">
      <a href="?do=resume_mywork&p=<?=$now+1;?>"><i class="fas fa-caret-right fa-2x" style="color:#273c75;"></i></a>
    </div>
    <?php } ?>
  </div>
  <?php if(!empty($row)){ ?>
  <div class="text-end">
    <button type="submit" class="btn saveBtn">Save</button>
  </div>
  <?php } ?>
</form>