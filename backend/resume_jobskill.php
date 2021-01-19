<?php
$all=$pdo->query("select count(*) from {$do}")->fetchColumn();
$div=5;
$pages=ceil($all/$div);
$now=(isset($_GET['p']))?$_GET['p']:1;
$start=($now-1)*$div;
$sql="select * from {$do} limit $start,$div"; 
$rows=$pdo->query($sql)->fetchAll();
?>
<form action="./api/edit.php" method="post">
  <div class="d-flex justify-content-between pt-3 pb-2 mb-3 border-bottom">
    <h2 class="title"><?=$tstr[$do];?></h2>
    <div><button id="addbtn" class="btn btn-outline-secondary" type="button"><?=$addstr[$do];?></button></div>
  </div>
  <?php if(empty($rows)){ ?>
    <div class="text-center text-muted">
      <h2>目前無任何資料，請新增</h2>
    </div>
  <?php } 
  foreach($rows as $row){ ?>
    <div class="row g-3 mb-3 text-muted">
      <div class="col-6 form-floating overflow-hidden">
        <input name="skill[]" type="text" class="form-control" id="jobSkill" value="<?=$row['skill'];?>">
        <label for="jobSkill">Skill</label>
      </div>
      <div class="col-6 form-floating overflow-hidden">
        <input name="level[]" type="text" class="form-control" id="jobLevel" value="<?=$row['level'];?>">
        <label for="jobLevel">Proficient</label>
      </div>
      <div class="col-12 d-flex justify-content-end ">
        <div class="form-check mx-3">
          <label class="form-check-label" for="jobSh">顯示</label>
          <input class="form-check-input" type="checkbox" id="jobSh" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
        </div>
        <div class="form-check">
          <label class="form-check-label" for="jobDel">刪除</label>
          <input class="form-check-input" type="checkbox" id="jobDel" name="del[]" value="<?=$row['id'];?>">
          <input type="hidden" name="id[]" value="<?=$row['id'];?>">
          <input type="hidden" name="table" value="<?=$do;?>">
        </div>
      </div>
    </div>
  <?php } ?>
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

