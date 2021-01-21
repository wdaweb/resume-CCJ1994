<?php
$sql="select * from {$do}"; 
$rows=$pdo->query($sql)->fetchAll();
?>
<form action="./api/edit.php" method="post">
  <div class="d-flex justify-content-between pt-3 pb-2 mb-3 border-bottom">
    <h2 class="title"><?=$tstr[$do];?></h2>
  </div>
  <?php if(empty($rows)){ ?>
    <div class="d-flex align-content-center justify-content-center">
      <div class="mx-3 text-muted"><h2>目前無任何資料，請新增</h2></div>
      <div><button id="addbtn" class="btn btn-outline-secondary" type="button"><?=$addstr[$do];?></button></div>
    </div>
  <?php } ?>
  <div class="row g-3 text-muted">
    <?php foreach($rows as $row){ ?>
    <div class="col-md-7">
      <label for="infoEmail" class="form-label">Email</label>
      <input class="form-control" id="infoEmail" type="email" name="email" value="<?=$row['email'];?>">
    </div>
    <div class="col-md-5">
      <label for="infoTel" class="form-label">Phone Number</label>
      <input class="form-control" id="infoTel" type="text" name="tel" value="<?=$row['tel'];?>">
    </div>
    <div class="col-6">
      <label for="infoPosition" class="form-label">Position</label>
      <input class="form-control" id="infoPosition" type="text" name="position" value="<?=$row['position'];?>">
    </div>
    <div class="col-6">
      <label for="infoAddress" class="form-label">Address</label>
      <input class="form-control" id="infoAddress" type="text" name="addr" value="<?=$row['addr'];?>">
    </div>
    <div class="col-md-12">
      <label for="infoIntro" class="form-label">Autobiography</label>
      <textarea type="text" class="form-control" id="infoIntro" name="intro" style="height:150px;"><?=$row['intro'];?></textarea>
      <input type="hidden" name="table" value="<?=$do;?>">
      <input type="hidden" name="id[]" value="<?=$row['id'];?>">
    </div>
    <div class="col-12 d-flex align-items-center justify-content-between">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="infoDel" name="del[]" value="<?=$row['id'];?>">
        <label class="form-check-label" for="infoDel">
          Delete it!
        </label>
      </div>
      <?php  }
      if(!empty($row)){ ?>
    <div>
      <button type="submit" class="btn saveBtn">Save</button>
    </div>
    <?php } ?>
    </div>
  </div>
</form>

