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
      <select select name="addr" id="infoAddress" class="form-select">
        <option value="基隆市" <?=($row['addr']=='基隆市')?'selected':'';?>>基隆市</option>
        <option value="新北市" <?=($row['addr']=='新北市')?'selected':'';?>>新北市</option>
        <option value="台北市" <?=($row['addr']=='台北市')?'selected':'';?>>台北市</option>
        <option value="桃園市" <?=($row['addr']=='桃園市')?'selected':'';?>>桃園市</option>
        <option value="新竹市" <?=($row['addr']=='新竹市')?'selected':'';?>>新竹市</option>
        <option value="新竹縣" <?=($row['addr']=='新竹縣')?'selected':'';?>>新竹縣</option>
        <option value="苗栗縣" <?=($row['addr']=='苗栗縣')?'selected':'';?>>苗栗縣</option>
        <option value="彰化縣" <?=($row['addr']=='彰化縣')?'selected':'';?>>彰化縣</option>
        <option value="台中市" <?=($row['addr']=='台中市')?'selected':'';?>>台中市</option>
        <option value="南投縣" <?=($row['addr']=='南投縣')?'selected':'';?>>南投縣</option>
        <option value="雲林縣" <?=($row['addr']=='雲林縣')?'selected':'';?>>雲林縣</option>
        <option value="嘉義市" <?=($row['addr']=='嘉義市')?'selected':'';?>>嘉義市</option>
        <option value="嘉義縣" <?=($row['addr']=='嘉義縣')?'selected':'';?>>嘉義縣</option>
        <option value="台南市" <?=($row['addr']=='台南市')?'selected':'';?>>台南市</option>
        <option value="高雄市" <?=($row['addr']=='高雄市')?'selected':'';?>>高雄市</option>
        <option value="屏東縣" <?=($row['addr']=='屏東縣')?'selected':'';?>>屏東縣</option>
        <option value="宜蘭縣" <?=($row['addr']=='宜蘭縣')?'selected':'';?>>宜蘭縣</option>
        <option value="花蓮縣" <?=($row['addr']=='花蓮縣')?'selected':'';?>>花蓮縣</option>
        <option value="台東縣" <?=($row['addr']=='台東縣')?'selected':'';?>>台東縣</option>
        <option value="澎湖縣" <?=($row['addr']=='澎湖縣')?'selected':'';?>>澎湖縣</option>
        <option value="金門縣" <?=($row['addr']=='金門縣')?'selected':'';?>>金門縣</option>
        <option value="連江縣" <?=($row['addr']=='連江縣')?'selected':'';?>>連江縣</option>
      </select>
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

