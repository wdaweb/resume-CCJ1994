<?php
$sql="select * from {$do}"; 
$rows=$pdo->query($sql)->fetchAll();
?>
<form action="./api/edit.php" method="post">
  <div class="msgpart container my-4 overflow-hidden">
  <div class="d-flex justify-content-between pt-3 pb-2 mb-3 border-bottom">
    <h2>Message</h2>
    <input class="btn btn-secondary" type="submit" value="儲存">
  </div>
  <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" data-bs-toggle="tab" href="#unread" role="tab">新留言</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" data-bs-toggle="tab" href="#readed" role="tab">已讀</a>
    </li>
  </ul>
  <div class="tab-content " id="myTabContent">
    <div class="tab-pane fade show active p-3" id="unread" role="tabpanel" >
      <?php
      $sql="select * from {$do} where `sh`='0'"; 
      $rows=$pdo->query($sql)->fetchAll();
      if(empty($rows)){
        echo "no Message";
      }else{
      foreach($rows as $row){
      ?>
      <div class="accordion accordion-flush" id="unmsgcontent">
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading<?=$row['id'];?>">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$row['id'];?>">
            <?=substr($row['date'],0,10);?> <?=substr( $row['msg'], 0 , 10 );?>...
            </button>
          </h2>
          <div id="collapse<?=$row['id'];?>" class="accordion-collapse collapse show" data-bs-parent="#unmsgcontent">
            <div class="accordion-body">
              <p>
                from:<?=$row['name'];?><br>
                Email:<?=$row['email'];?><br>
                Tel:<?=$row['tel'];?>
              </p>
                已讀<input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                刪除<input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    <input type="hidden" name="table" value="<?=$do;?>">
                
            </div>
          </div>
        </div>
      </div>
      <?php }
          }  ?>
    </div>
    <div class="tab-pane fade p-3" id="readed" role="tabpanel">
      <?php
      $sql="select * from {$do} where `sh`='1'"; 
      $rows=$pdo->query($sql)->fetchAll();
      if(empty($rows)){
        echo "no Message";
      }else{
      foreach($rows as $row){
      ?>
      <div class="accordion accordion-flush" id="msgcontent">
        <div class="accordion-item">
        <h2 class="accordion-header" id="heading<?=$row['id'];?>">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$row['id'];?>">
          <?=substr($row['date'],0,10);?> <?=substr( $row['msg'], 0 , 10 );?>...
          </button>
        </h2>
        <div id="collapse<?=$row['id'];?>" class="accordion-collapse collapse show" data-bs-parent="#msgcontent">
          <div class="accordion-body">
            <p>
              from:<?=$row['name'];?><br>
              Email:<?=$row['email'];?><br>
              Tel:<?=$row['tel'];?>
            </p>
            已讀<input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
            刪除<input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <input type="hidden" name="table" value="<?=$do;?>">
            
          </div>
        </div>
        </div>
      </div>
      <?php }
          }  ?>
    </div>
    
  </div>
</div>   
</form>